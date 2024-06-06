<?php
    require_once('../../config.php');
    require_once BL.'functions/db.php';
    require_once BL.'functions/messages.php';
    require_once BL.'functions/valid.php';
    require_once BLA.'inc/nav.php';

    $id = $_GET['update_id'];
    $update = mysqli_query($conn , "SELECT * FROM department WHERE depart_id = $id");
    $data = mysqli_fetch_array($update);

    // update to database 
    if(isset($_POST['update'])){
        $Id = $_POST['id'];
        $name = $_POST['name'];
        $image = $_FILES['imageDepart'];
        $image_location = $_FILES['imageDepart']['tmp_name']; // it's image and extension 
        $image_name = $_FILES['imageDepart']['name'];
        $image_up = "image1".$image_name; // it's folder upload inside the image

        $update = "UPDATE department SET depart_name='$name' , depart_image = '$image_up' WHERE depart_id =$Id";
        mysqli_query($conn , $update);
        // Make sure the files are uploaded to folder image 
        if(move_uploaded_file($image_location , 'image1'.$image_name)){
            echo'
                <script>
                    alert("it is update successfully")
                </script>
            ';
            header('location:showAllDepart.php');
        }else{
            echo'
            <script>
                alert("it is not update successfully")
            </script>';
            header('location:showAllDoctors.php');
        }
    }
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
            <form action="" method="post" enctype="multipart/form-data">
                <h2>Edit Department</h2>
                <!-- not show this input id style="display:none;" -->
                <input type="text"  name="id" value='<?php echo $data['depart_id']?>' style="display:none;">
                <br>
                <input type="text" name="name" value='<?php echo $data['depart_name']?>'>
                <br>
                <input type="file" id="file" name="imageDepart" style="display: none;">
                <label for="file">Update Image</label>
                <button name="update" type="submit">Update Data</button>
                <br>
                <a class="goToPage" href="showAllDepart.php">Show All Departments</a>
            </form>
        </div>
    </center>
</body>
</html>
  
<?php require_once BLA.'inc/footer.php'; ?>