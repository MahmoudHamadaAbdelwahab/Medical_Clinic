<?php
    require_once('../config.php');
    require_once BLA.'inc/nav.php';
    require_once BL.'functions/valid.php';
    require_once BL.'functions/db.php';
    ?>

<?php
    if(!$conn){
        dir('Error' . mysqli_connect_error());
    }

    $sql = "SELECT * FROM patient";
    $query = mysqli_query($conn , $sql);
    $result = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <nav>
        <ul>
            <li>Welcome, <?php echo $result['patient_name']; ?></li>
            <li><a href="personal_page.php">Personal Page</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Welcome, <?php echo $result['patient_name']; ?>!</h1>
        <!-- Your personalized content here -->
    </div>
</body>
</html>

<?php require_once BLA.'inc/footer.php';?>
