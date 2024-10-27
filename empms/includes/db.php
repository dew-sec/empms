<?php
session_start();

// Database configuration
define('DB_HOST', 'localhost'); // Your database host
define('DB_USER', 'root'); // Your database username
define('DB_PASS', ''); // Your database password
define('DB_NAME', 'empms'); // Your database name

// Create database connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>