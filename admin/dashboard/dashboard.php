<?php
    require_once('../../config.php');
    require_once BL.'functions/db.php';
    require_once BL.'functions/messages.php';
    require_once BL.'functions/valid.php';
    require_once BLA.'inc/nav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <center>
        <div class="main">
            <!-- this code special upload image enctype="multipart/form-data" -->
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <h2>Dashboard Admin</h2>
                <img src="logo.png" alt="logo" width="400px" style="margin: 10px;">
                <input type="text" id="name" name="name" placeholder="Writing  doctor's name">
                <br>
                <input type="text" id="password" name="password" placeholder="Writing  doctor's password">
                <br>
                <input type="text" id="role" name="role" value="doctor" style="display: none;">
                <!-- <br> -->
                <input type="text" id="specialty" name="specialty" placeholder="Writing doctor's specialty">
                <br>
                <input type="text" id="Phone" name="Phone" placeholder="Writing doctor's phone">
                <br>
                <input type="date" id="date" name="date" placeholder="Writing doctor's appointments">
                <br>
                <input type="text" id="price" name="price" placeholder="Writing doctor's booking price">
                <br>
                <input type="file" id="file" name="image" style="display: none;">
                <label for="file">Choose Image Doctor</label>
                <button name="upload">Upload Doctor New</button>
                <br>
                <a class="goToPage" href="showAllDoctors.php">Show All Doctors</a>
                <br>
                <a class="goToPage" href="../../page/homePage.php">Go To HomePage</a>
            </form>
        </div>
    </center>
</body>
</html>

<?php require_once BLA.'inc/footer.php'; ?>