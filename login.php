<?php
session_start();
// End any existing session to ensure a clean login
session_unset();
session_destroy();
session_start();

// Show errors during development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include DB connection (expects $conn)
if (file_exists(__DIR__ . '/db.php')) {
    require_once __DIR__ . '/db.php';
} else if (file_exists(__DIR__ . '/db_connect.php')) {
    require_once __DIR__ . '/db_connect.php';
} else {
    die('Database connection file not found!');
}

// Check if connection was successful
if (!isset($conn)) {
    die('Database connection variable $conn not found!');
}

$login_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = $_POST['password'] ?? '';
    $role = isset($_POST['role']) ? trim($_POST['role']) : '';
    
    // Map UI role "hospital" to DB role "staff"
    $roleForQuery = ($role === 'hospital') ? 'staff' : $role;

    if ($email === '' || $password === '' || $role === '') {
        $login_error = 'Please fill in all fields.';
    } else {
        // Query database for user
        $stmt = mysqli_prepare($conn, "SELECT user_id, password, role, full_name FROM users WHERE email=? AND role=?");
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'ss', $email, $roleForQuery);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result && mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);

                // Support both hashed passwords and legacy plain-text
                $passwordMatch = false;
                if (!empty($user['password']) && password_verify($password, $user['password'])) {
                    // Password is hashed and matches
                    $passwordMatch = true;
                } elseif ($password === $user['password']) {
                    // Plain text password matches (legacy support)
                    $passwordMatch = true;
                }

                if ($passwordMatch) {
                    // Upgrade plain password to hashed version if necessary
                    if ($password === $user['password']) {
                        $newHash = password_hash($password, PASSWORD_DEFAULT);
                        $upd = mysqli_prepare($conn, "UPDATE users SET password=? WHERE user_id=?");
                        if ($upd) {
                            mysqli_stmt_bind_param($upd, 'si', $newHash, $user['user_id']);
                            mysqli_stmt_execute($upd);
                            mysqli_stmt_close($upd);
                        }
                    }

                    // Regenerate session ID for security
                    session_regenerate_id(true);

                    // Set session variables
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['username'] = $user['full_name'] ?? '';
                    $_SESSION['logged_in'] = true;
                    $_SESSION['email'] = $email;

                    // Redirect based on actual database role
                    if ($user['role'] === 'admin') {
                        header('Location: admin/dashboard.php');
                        exit;
                    } else if ($user['role'] === 'parent') {
                        header('Location: parent_dashboard2.php\parentdashboard.php');
                        exit;
                    } else if ($user['role'] === 'staff') {
                        // Hospital users go here
                        header('Location: hospital/dashboard.php');
                        exit;
                    } else {
                        $login_error = "Unknown role. Cannot redirect.";
                    }
                } else {
                    $login_error = 'Invalid email or password.';
                }
            } else {
                $login_error = 'No account found with that email and role.';
            }
            mysqli_stmt_close($stmt);
        } else {
            $login_error = 'Database error: ' . mysqli_error($conn);
            error_log('Login prepare failed: ' . mysqli_error($conn));
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - VaxTracker</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="stylee.css/login.css">
</head>
<body>
    
   <?php include "nav2.php"; ?>
    <div class="container">
        <div class="login-logo">
            <div class="login-logo-icon">
                <i class="fas fa-syringe"></i>
            </div>
            <h1>Welcome Back</h1>
            <p class="subtitle">Sign in to continue to VaxTracker</p>
        </div>

        <?php if ($login_error !== ''): ?>
            <div class="error">
                <i class="fas fa-exclamation-circle"></i>
                <span><?= htmlspecialchars($login_error) ?></span>
            </div>
        <?php endif; ?>

        <form action="" method="post">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email Address" required value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
            </div>

            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="input-group">
                <i class="fas fa-user-tag"></i>
                <select name="role" required>
                    <option value="">Select User Type</option>
                    <option value="admin" <?= (isset($_POST['role']) && $_POST['role'] === 'admin') ? 'selected' : '' ?>>Admin</option>
                    <option value="parent" <?= (isset($_POST['role']) && $_POST['role'] === 'parent') ? 'selected' : '' ?>>Parent</option>
                    <option value="hospital" <?= (isset($_POST['role']) && $_POST['role'] === 'hospital') ? 'selected' : '' ?>>Hospital</option>
                </select>
            </div>

            <button type="submit" name="action" value="login">
                Sign In
                <i class="fas fa-arrow-right"></i>
            </button>
        </form>

        <div class="divider">
            <span>or</span>
        </div>

        <div class="register-link">
            Don't have an account? <a href="register.php">Create Account</a>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>