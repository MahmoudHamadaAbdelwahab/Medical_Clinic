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
        require_once('../../config.php');
        require_once BL.'functions/db.php';
        require_once BL.'functions/messages.php';
        require_once BL.'functions/valid.php';
      $query = "SELECT * FROM doctor";
        $result = mysqli_query($conn , $query);
        while($row = mysqli_fetch_array($result)){
            echo "
            <center>
                <main>
                    <div class='card' style='width: 18rem;'>
                        <img src='$row[doctorImage]' class='card-img-top'>
                        <div class='card-body'>
                            <h5 class='card-title'>$row[doctorName]</h5>
                            <p class='card-text'>$row[doctorIsSpecialty]</p>
                            <p class='card-text'>$row[doctorPhone]</p>
                            <p class='card-text'>$row[doctorDate]</p>
                            <p class='card-text'>$row[doctor_booking_price]</p>
                            <a href='booking.php? id=$row[doctorId]' class='btn btn-primary'>Booking Now</a>
                        </div>
                    </div>
                </main'
            </center>
            ";
        }
    ?>
</body>
</html>
