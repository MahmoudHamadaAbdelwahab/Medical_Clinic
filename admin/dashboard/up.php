<?php
    // connection database 
    require_once('../../config.php');
    require_once BL.'functions/db.php';
    require_once BL.'functions/messages.php';
    require_once BL.'functions/valid.php';
    require_once BLA.'inc/nav.php';
    
    if(isset($_POST['update'])){
        $Id = $_POST['id'];
        $name = $_POST['name'];
        $specialty = $_POST['specialty'];
        $Phone = $_POST['Phone'];
        $date = $_POST['date'];
        $price = $_POST['price'];
        $image = $_FILES['image'];
        $image_location = $_FILES['image']['tmp_name']; // it's image and extension 
        $image_name = $_FILES['image']['name'];
        $image_up = "image".$image_name; // it's folder upload inside the image

        $update = "UPDATE doctor SET doctorName='$name' , doctorIsSpecialty ='$specialty', doctorPhone='$Phone', doctorDate='$date' , doctorImage='$image_up', doctor_booking_price='$price' WHERE doctorId=$Id";
        mysqli_query($conn , $update);
        // Make sure the files are uploaded to folder image 
        if(move_uploaded_file($image_location , 'image'.$image_name)){
            echo'
                <script>
                    alert("it is update successfully")
                </script>
            ';
            header('location:showAllDoctors.php');
        }else{
            echo'
            <script>
                alert("it is not update successfully")
            </script>';
            header('location:showAllDoctors.php');
        }
    }
?>
<?php require_once BLA.'inc/footer.php'; ?>