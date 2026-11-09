<?php
session_start();
// show errors during development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// include DB connection
if (file_exists(__DIR__ . '/db.php')) {
    include __DIR__ . '/db.php';
} else if (file_exists(__DIR__ . '/db_connect.php')) {
    include __DIR__ . '/db_connect.php';
}

$register_error = '';
$register_success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'register') {
    $firstname = isset($_POST['firstname']) ? trim($_POST['firstname']) : '';
    $lastname = isset($_POST['lastname']) ? trim($_POST['lastname']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = $_POST['password'] ?? '';
    $role = isset($_POST['role']) ? trim($_POST['role']) : '';

    if ($firstname === '' || $lastname === '' || $email === '' || $password === '' || $role === '') {
        $register_error = 'Please fill in all required fields.';
    } else {
        // check duplicate email
        $check = mysqli_prepare($conn, "SELECT user_id FROM users WHERE email=?");
        if ($check) {
            mysqli_stmt_bind_param($check, 's', $email);
            mysqli_stmt_execute($check);
            mysqli_stmt_store_result($check);
            if (mysqli_stmt_num_rows($check) > 0) {
                $register_error = 'An account with that email already exists.';
            } else {
                $hashed = password_hash($password, PASSWORD_DEFAULT);

                // Detect users table schema: prefer (first_name, last_name) but fall back to full_name if present
                $has_first_last = false;
                $has_full = false;
                $colCheck = mysqli_query($conn, "SHOW COLUMNS FROM users LIKE 'first_name'");
                if ($colCheck && mysqli_num_rows($colCheck) > 0) {
                    $has_first_last = true;
                } else {
                    $colCheck2 = mysqli_query($conn, "SHOW COLUMNS FROM users LIKE 'full_name'");
                    if ($colCheck2 && mysqli_num_rows($colCheck2) > 0) {
                        $has_full = true;
                    }
                }

                if ($has_first_last) {
                    $stmt = mysqli_prepare($conn, "INSERT INTO users (first_name, last_name, email, password, role) VALUES (?, ?, ?, ?, ?)");
                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, 'sssss', $firstname, $lastname, $email, $hashed, $role);
                        if (mysqli_stmt_execute($stmt)) {
                            $register_success = 'Account created successfully. You can now <a href="login.php">sign in</a>.';
                        } else {
                            $register_error = 'Database error creating account: ' . mysqli_error($conn);
                            error_log('[register.php] insert failed (first/last): ' . mysqli_error($conn));
                        }
                        mysqli_stmt_close($stmt);
                    } else {
                        $register_error = 'Database error preparing insert statement: ' . mysqli_error($conn);
                        error_log('[register.php] prepare insert (first/last) failed: ' . mysqli_error($conn));
                    }
                } elseif ($has_full) {
                    $fullname = trim($firstname . ' ' . $lastname);
                    $stmt = mysqli_prepare($conn, "INSERT INTO users (full_name, email, password, role) VALUES (?, ?, ?, ?)");
                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, 'ssss', $fullname, $email, $hashed, $role);
                        if (mysqli_stmt_execute($stmt)) {
                            $register_success = 'Account created successfully. You can now <a href="login.php">sign in</a>.';
                        } else {
                            $register_error = 'Database error creating account: ' . mysqli_error($conn);
                            error_log('[register.php] insert failed (full_name): ' . mysqli_error($conn));
                        }
                        mysqli_stmt_close($stmt);
                    } else {
                        $register_error = 'Database error preparing insert statement: ' . mysqli_error($conn);
                        error_log('[register.php] prepare insert (full_name) failed: ' . mysqli_error($conn));
                    }
                } else {
                    $register_error = 'Users table schema mismatch: neither first_name/last_name nor full_name columns were found.';
                    error_log('[register.php] users table schema mismatch: expected first_name/last_name or full_name');
                }
            }
            mysqli_stmt_close($check);
        } else {
            $register_error = 'Database error preparing check statement: ' . mysqli_error($conn);
            error_log('[register.php] prepare check failed: ' . mysqli_error($conn));
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - VaxTracker</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="stylee.css\register.css">
</head>
<body>
    <?php include "nav2.php"; ?>
    <div class="container">
        <div class="logo2">
            <div class="logo-icon2">
                <i class="fas fa-user-plus"></i>
            </div>
            <h1>Create Account</h1>
        </div>
         <h4 class="subtitle">Join VaxTracker to manage vaccination records</h4>
        <?php if (!empty($register_success)): ?>
            <div class="success">
                <i class="fas fa-check-circle"></i>
                <span><?= $register_success ?></span>
            </div>
        <?php endif; ?>

        <?php if (!empty($register_error)): ?>
            <div class="error">
        
                <i class="fas fa-exclamation-circle"></i>
                <span><?= htmlspecialchars($register_error) ?></span>
            </div>
        <?php endif; ?>
        
    <div class="form-wrapper">
    <form action="" method="post">
            <div class="form-row">
                <div class="input-group">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" id="firstname" placeholder="John" required>
                    <i class="fas fa-user"></i>
                </div>
                
                <div class="input-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Doe" required>
                    <i class="fas fa-user"></i>
                </div>
            </div>

            <div class="input-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" placeholder="john.doe@example.com" required>
                <i class="fas fa-envelope"></i>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter strong password" required>
                <i class="fas fa-lock"></i>
            </div>

            <div class="input-group">
                <label for="role">User Type</label>
                <select name="role" id="role" required>
                    <option value="">Select User Type</option>
                    <option value="admin">Admin</option>
                    <option value="parent">Parent</option>
                        <!-- role 'staff' maps to hospital staff in DB (enum: admin,parent,staff) -->
                    <option value="staff">Hospital</option>
                </select>
                <i class="fas fa-user-tag"></i>
            </div>

            <button type="submit" name="action" value="register">
                Create Account
                <i class="fas fa-arrow-right"></i>
            </button>
    </form>
    </div>

        <div class="divider">
            <span>or</span>
        </div>

        <div class="login-link">
            Already have an account? <a href="login.php">Sign In</a>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>