<?php
require_once('../config.php');
session_start(); // Start PHP session

// Check if user is not logged in, redirect to login page
// if (!isset($_SESSION['patient_user'])) {
//     header("Location:".BURLA."authentication/login.php");
//     exit();
// }

// Get the username from the session
$username = $_SESSION['patient_user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Include your CSS file -->
</head>
<body>
    <nav>
        <ul>
            <li>Welcome, <?php echo $username; ?></li>
            <li><a href="personal_page.php">Personal Page</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Welcome, <?php echo $username; ?>!</h1>
        <!-- Your personalized content here -->
    </div>
</body>
</html>
