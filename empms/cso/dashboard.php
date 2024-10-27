<?php
session_start();
require_once '../config/config.php';

// Check if user is logged in and is a CSO
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'cso') {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CSO Dashboard</title>
    <!-- Add your CSS links here -->
</head>
<body>
    <h1>Welcome, CSO <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
    <!-- Add your CSO dashboard content here -->
    <a href="../logout.php">Logout</a>
</body>
</html>