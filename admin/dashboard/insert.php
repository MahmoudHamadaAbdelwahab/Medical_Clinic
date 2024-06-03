<?php
    // connection database 
    require_once('../../config.php');
    require_once BL.'functions/db.php';
    require_once BL.'functions/messages.php';
    require_once BL.'functions/valid.php';
    require_once BLA.'inc/nav.php';
    
    if(isset($_POST['upload'])){
        $name = $_POST['name'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $department = $_POST['department'];
        $Phone = $_POST['Phone'];
        $input_date=$_POST['date'];
        $date=date("Y-m-d H:i:s",strtotime($input_date));
        $price = $_POST['price'];
        $image = $_FILES['image'];
        $image_location = $_FILES['image']['tmp_name']; // it's image and extension 
        $image_name = $_FILES['image']['name'];
        $image_up = "image/".$image_name; // it's folder upload inside the image
        // insert data to database
        $insert = "INSERT INTO doctor (doctorName , doctorPassword , doctorRole , doctorPhone , doctorDate , doctorImage , doctor_booking_price , depart_id ) VALUES ('$name','$password','$role','$Phone' ,'$date','$image_up','$price','$department')";
        mysqli_query($conn , $insert);
        // Make sure the files are uploaded to folder image 
        if(move_uploaded_file($image_location , 'image/'.$image_name)){
            echo'
                <script>
                    alert("it is upload successfully")
                </script>
            ';
            header('location:dashboard.php');
        }else{
            echo'
            <script>
                alert("it is found error not upload ")
            </script>
        ';
        }
    }

    // add the department 
    if(isset($_POST['uploadDepart'])){
        $name = $_POST['depart_name'];
        $image = $_FILES['imageDepart'];
        $image_location = $_FILES['imageDepart']['tmp_name']; // it's image and extension 
        $image_name = $_FILES['imageDepart']['name'];
        $image_up = "image1/".$image_name; // it's folder upload inside the image
        // insert data to database
        $insertDepart = "INSERT INTO department (depart_name , depart_image ) VALUES ('$name' , '$image_up')";
        mysqli_query($conn , $insertDepart);
        // Make sure the files are uploaded to folder image 
        if(move_uploaded_file($image_location , 'image1/'.$image_name)){
            echo'
                <script>
                    alert("it is upload department successfully")
                </script>
            ';
            header('location:dashboard.php');
        }else{
            echo'
            <script>
                alert("it is found error not upload the department")
            </script>
        ';
        }
    }
?>
<?php require_once BLA.'inc/footer.php'; ?>
