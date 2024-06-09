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
        echo "<h2 class='text-center'>Show All Opinions</h2>";
        $query = "SELECT * FROM opinion";
        $result = mysqli_query($conn , $query);
     ?>   
    <div class="container">
        <?php
            while($row = mysqli_fetch_array($result)){
                $name = htmlspecialchars($row['name']);
                $address = htmlspecialchars($row['address']);
                $message = htmlspecialchars($row['message']);
                echo "
                <div class='card' style='width: 18rem; height: auto;'>
                        <div class='d-flex justify-content-around'>
                            <h6 class='card-title'>$name</h6>    
                            <h6 class='card-title'>$address</h6>  
                        </div>
                        <div class='card-body'>
                            <p class='card-text'>$message</p>
                            <a href='deleteOpinion.php? id=$row[id]' class='btn btn-danger'>Delete</a>
                        </div>
                    </div>
                ";
            }
        ?>
    </div>
</body>
</html>
<?php require_once BLA.'inc/footer.php'; ?>

