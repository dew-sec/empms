<?php
session_start();
require_once '../config/config.php';

// Check if user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header(" Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <!-- Add your CSS links here -->
</head>
<body>
    <h1>Welcome, Admin <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
    <!-- Add your admin dashboard content here -->
    <a href="../logout.php">Logout</a>
</body>
</html>