<?php
    include('../../config.php');
    require_once BLA.'inc/nav.php';
    require_once BL.'functions/valid.php';
    require_once BL.'functions/db.php';

    $id = $_GET['Read_id'];
    $update = mysqli_query($conn , "SELECT * FROM lastpost WHERE lastPost_Id = $id");
    $data = mysqli_fetch_array($update);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .main{
            width: 50%;
            box-shadow: 1px 1px 10px silver;
            padding: 20px;
            margin: 50px;
            display: flex;
            justify-content: around;
            text-align: center;
        }
        .main .image{
            width: 100%;
        }
        .main .text span{
            color: #0d6efd;
            font-size: 20px;
        }
        .goToPage{
            text-decoration: none;
            font-weight: bold;
            color: #0d6efd;
        }
    </style>
</head>
<body>
    <center>
        <div class="main">
            <div class="image">
                <img src='../<?php echo $data['lastPost_Image']?>' alt='Image' width='100%' height='200'><br>
            </div>
            <div class="text"> 
                <h5>Read the post about <span><?php echo $data['lastPost_About']?></span></h5>
                <br>
                <p><?php echo $data['lastPost_writeHere']?></p>  
                <br>
                <a class="goToPage" href="../lastPostPage.php">Got To Last Post</a>
            </div>
        </div>
    </center>
</body>
</html>
  
<?php require_once BLA.'inc/footer.php'; ?>