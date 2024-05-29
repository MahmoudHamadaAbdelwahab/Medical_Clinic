<?php
     require_once('../config.php');
     require_once BLA.'inc/nav.php';
     require_once BL.'functions/valid.php';
     require_once BL.'functions/messages.php';
     require_once BL.'functions/db.php';
        $id = $_GET['id'];
        $update = mysqli_query($conn , "SELECT * FROM lastpost WHERE lastPost_Id  = $id");
        $data = mysqli_fetch_array($update);

        // update the post then sent data to table lastpost in database
        if(isset($_POST['update'])){
            $Id = $_POST['id'];
            $image = $_POST['image'];
            $about = $_POST['about'];
            $writeHere = $_POST['writeHere'];
            // $image = $_FILES['image'];
            // $image_location = $_FILES['image']['tmp_name']; // it's image and extension 
            // $image_name = $_FILES['image']['name'];
            // $image_up = "image".$image_name; // it's folder upload inside the image
            
            // insert data to database
            $update = "UPDATE lastpost SET lastPost_Image='$image' , lastPost_About='$about' , lastPost_writeHere='$writeHere' WHERE lastPost_Id=$Id";
            mysqli_query($conn , $update);
            // Make sure the files are uploaded to folder image 
            if(move_uploaded_file($image_location , 'image'.$image_name)){
                echo'
                    <script>
                        alert("The post has been updated successfully")ك
                    </script>
                ';
                header('location:lastPostPage.php');
            }else{
                echo'
                <script>
                    alert("There was a problem, the post was not updated");
                </script>
            ';
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .main{
        width :50%;
        box-shadow: 1px 1px 10px silver;
        margin-top: 40px;
        padding: 10px;
    }
    .main h2{
        font-family:'Cairo', sans-serif;
    }
    .main input{
        margin-bottom: 5px;
        width: 60%;
        font-family:'Cairo', sans-serif;
        font-size: 15px;
    }
    .main button{
        border: none;
        padding: 10px;
        width: 40%;
        font-weight: bold;
        font-size: 15px;
        background-color: green;
        font-family:'Cairo', sans-serif;
        cursor : pointer;
    }
    .main label{
        padding: 10px;
        width: 40%;
        font-weight: bold;
        font-size: 15px;
        background-color: #1F87CF;
        font-family:'Cairo', sans-serif;
        color: white;
        cursor : pointer;

    }
    .main a{
        text-decoration: none;
        font-weight: bold;
        font-size: 20px;
        font-family:'Cairo', sans-serif;
        color: red;
        cursor : pointer;
    }
    </style>
</head>
<body>
    <center>
        <div class="main">
           <!-- this code special upload image enctype="multipart/form-data" -->
            <form action="" method="post" enctype="multipart/form-data">
                <h2>Update The Post</h2>
                <!-- not show this input id style="display:none;" -->
                <input type="text"  name="id" value='<?php echo $data['lastPost_Id']?>' style="display:none;">
                <br>
                <input type="text"  name="about" value='<?php echo $data['lastPost_About']?>'>
                <br>
                <input type="text"  name="writeHere" value='<?php echo $data['lastPost_writeHere']?>'>
                <br>
                <input type="file" id="file" name="image" style="display: none;">
                <label for="file">Upload Image Post</label>
                <button name="update" type="submit">Update</button>
                <br>
                <a href="posted_I_Created.php">Posts i created</a>
            </form>
        </div>
    </center>
</body>
</html>