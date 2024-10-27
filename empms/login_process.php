<?php
session_start();
require_once 'config/config.php';

// Assuming you're using a database connection (update this to match your DB setup)
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to get user data
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the user row
        $user = $result->fetch_assoc();

        // Verify the password (assuming it's hashed)
        if (password_verify($password, $user['password'])) {
            // Set session variables for logged-in user
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            
            // Redirect based on role
            switch ($_SESSION['role']) {
                case 'admin':
                    header("Location: admin/dashboard.php");
                    exit();
                case 'employee':
                    header("Location: employee/dashboard.php");
                    exit();
                case 'cso':
                    header("Location: cso/dashboard.php");
                    exit();
            }
        } else {
            // Invalid password
            $_SESSION['error'] = 'Invalid username or password.';
            header("Location: index.php"); // Redirect back to login page
            exit();
        }
    } else {
        // Invalid username
        $_SESSION['error'] = 'Invalid username or password.';
        header("Location: index.php"); // Redirect back to login page
        exit();
    }
}