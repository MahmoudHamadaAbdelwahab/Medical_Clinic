<?php
    include('../config.php');
    require_once BL.'functions/valid.php';
    require_once BL.'functions/db.php';
    $id = $_GET['Read_id'];
    $update = mysqli_query($conn , "SELECT * FROM lastpost WHERE lastPost_Id = $id");
    $data = mysqli_fetch_array($update);
    echo $data['lastPost_Image']
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
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
            <img src='<?php echo $data['lastPost_Image']?>' alt='Image' width='100%' height='200'><br>
            <div> 
                <h2>Read the post about <?php echo $data['lastPost_About']?></h2>
                <br>
                <p><?php echo $data['lastPost_writeHere']?></p>  
            </div>
            <a class="goToPage" href="../lastPostPage.php">Got To Last Post</a>
        </div>
    </center>
</body>
</html>
  
<?php require_once BLA.'inc/footer.php'; ?>