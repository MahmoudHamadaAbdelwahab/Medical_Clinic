<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <style>
        .card{
            float: right;
            margin: 15px;
        }
        .card img{
            width: 100%;
            height: 200px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php
    require_once('../config.php');
    require_once BLA.'inc/nav.php';
    require_once BL.'functions/valid.php';
    require_once BL.'functions/messages.php';
    require_once BL.'functions/db.php';
    $id = $_SESSION['doctorId'];
    
      echo "<h2 class='text-center'>Posted i created</h2>";
      $query = "SELECT * FROM lastpost WHERE doctor_Id = '$id'";
        $result = mysqli_query($conn , $query);
        while($row = mysqli_fetch_array($result)){
            echo "
            <center>
                <main>
                    <div class='card' style='width: 18rem;'>
                        <img src='$row[lastPost_Image]' class='card-img-top'>
                        <div class='card-body'>
                            <h5 class='card-title'>$row[lastPost_About]</h5>
                            <p class='card-text'>$row[lastPost_writeHere]</p>
                            <p class='card-text'>$row[lastPost_date]</p>
                            <a href='delete.php? id=$row[lastPost_Id]' class='btn btn-danger'>Delete</a>
                            <a href='update.php? id=$row[lastPost_Id]' class='btn btn-primary'>Edit</a>
                        </div>
                    </div>
                </main'
            </center>
            ";
        }
    ?>
</body>
</html>
<?php //require_once BLA.'inc/footer.php'; ?>