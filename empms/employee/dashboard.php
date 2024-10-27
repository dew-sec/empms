<?php
session_start();
require_once '../config/config.php';

// Check if user is logged in and is an employee
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'employee') {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Dashboard</title>
    <!-- Add your CSS links here -->
</head>
<body>
    <h1>Welcome, Employee <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
    <!-- Add your employee dashboard content here -->
    <a href="../logout.php">Logout</a>
</body>
</html>