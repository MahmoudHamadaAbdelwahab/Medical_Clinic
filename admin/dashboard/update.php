<?php
    require_once('../../config.php');
    require_once BL.'functions/db.php';
    require_once BL.'functions/messages.php';
    require_once BL.'functions/valid.php';
    require_once BLA.'inc/nav.php';

    $id = $_GET['id'];
    $update = mysqli_query($conn , "SELECT * FROM doctor WHERE doctorId = $id");
    $data = mysqli_fetch_array($update);
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
            <form action="up.php" method="post" enctype="multipart/form-data">
                <h2>Edit Doctor</h2>
                <!-- not show this input id style="display:none;" -->
                <input type="text"  name="id" value='<?php echo $data['doctorId']?>' style="display:none;">
                <br>
                <input type="text" name="name" value='<?php echo $data['doctorName']?>'>
                <br>
                <input type="text"  name="specialty" value='<?php echo $data['doctorIsSpecialty']?>'>
                <br>
                <br>
                <input type="text"  name="Phone" value='<?php echo $data['doctorPhone']?>'>
                <br>
                <br>
                <input type="date"  name="date" value='<?php echo $data['doctorDate']?>'>
                <br>
                <br>
                <input type="text"  name="price" value='<?php echo $data['doctor_booking_price']?>'>
                <br>
                <input type="file" id="file" name="image" style="display: none;">
                <label for="file">Update Image</label>
                <button name="update" type="submit">Update Data</button>
                <br>
                <a class="goToPage" href="showAllDoctors.php">Show All Doctors</a>
            </form>
        </div>
    </center>
</body>
</html>
  
<?php require_once BLA.'inc/footer.php'; ?>