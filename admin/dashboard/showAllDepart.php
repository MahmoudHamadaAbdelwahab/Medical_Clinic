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
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }
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
      echo "<h2 class='text-center'>Show All Departments</h2>";
      $query = "SELECT * FROM department";
       $result = mysqli_query($conn , $query);
    ?>
    <div class="container">
        <?php
            while($row = mysqli_fetch_array($result)){
                echo "
                <div class='d-flex justify-content-center col-sm-2 col-md-2 col-lg-2'>
                    <div class='card' style='width: 16rem;'>
                        <img src='$row[depart_image]' class='card-img-top'>
                        <div class='card-body'>
                                <h5 class='card-title'>$row[depart_name]</h5>
                                <a href='delete_depart.php? delete_id=$row[depart_id]' class='btn btn-danger'>Delete</a>
                                <a href='update_depart.php? update_id=$row[depart_id]' class='btn btn-primary'>Edit</a>
                        </div>
                    </div>
                </div>'
            ";
            }
        ?>
    </div>    

</body>
</html>
<?php require_once BLA.'inc/footer.php'; ?>
