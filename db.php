<?php
// db.php - create an object-oriented mysqli connection and provide a procedural alias for compatibility
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASS = ""; // set your DB password
$DB_NAME = "vaccine_system_db";

// Create object-oriented connection assigned to $mysqli
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
// throw exceptions for errors to make debugging easier
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    if ($mysqli->connect_errno) {
        throw new Exception('DB Connection failed: ' . $mysqli->connect_error);
    }
    $mysqli->set_charset('utf8mb4');
} catch (Exception $e) {
    // In production you might log this instead of echoing
    die('Database connection error: ' . $e->getMessage());
}

// Backwards compatibility: also expose a procedural-style $conn variable
$conn = $mysqli;