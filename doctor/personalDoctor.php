<?php
    require_once('../config.php');
    require_once BLA.'inc/nav.php';
    require_once BL.'functions/valid.php';
    require_once BL.'functions/messages.php';
    require_once BL.'functions/db.php';

    if(!$conn){
        dir('Error' . mysqli_connect_error());
    }

    $patient = isset($_SESSION['patient_name']) && $_SESSION['patient_role'] == 'patient' ? $_SESSION['patient_name'] : null;
    $doctor = isset($_SESSION['patient_name']) && $_SESSION['patient_role'] == 'doctor' ? $_SESSION['patient_name'] : null;

    // $err_s = 0;

    // if(isset($_POST['submit'])){
    //     $filename = $_FILES["choosefile"]["name"];
    //     $tempname = $_FILES["choosefile"]["tmp_name"];  
    //     $folder = "../imag/gallery/".$filename;   
        
    //     $writeOverview = $_POST['writeOverview'];
    //     $writeHere = $_POST['writeHere'];

    //     if(empty($filename)){
    //         $user_error = '<p id="error">Please enter image.</p><br>';
    //         $err_s = 1;
    //     } elseif(empty($writeOverview)){
    //         $user_error = '<p id="error">Please enter write overview.</p><br>';
    //         $err_s = 1;
    //     } elseif(empty($writeHere)){
    //         $user_error = '<p id="error">Please enter write here.</p><br>';
    //         $err_s = 1;
    //     } elseif(strlen($writeHere) > 255 ){
    //         $user_error = '<p id="error">Please keep the character length less than 255.</p><br>';
    //         $err_s = 1;
    //     }

    //     if($err_s == 0){ // Removed $num_rows check for username existence since it's not relevant here
    //         $sql = "INSERT INTO lastpost (lastPost_Image, lastPost_About, lastPost_writeHere) VALUES ('$filename', '$writeOverview', '$writeHere')";
            
    //         mysqli_query($conn, $sql);
    //         // Add the image to the "image" folder"
    //         if (move_uploaded_file($tempname, $folder)) {
    //             echo "Image uploaded successfully";
    //         }else{
    //             echo "Failed to upload image";
    //         }

    //         if(mysqli_query($conn, $sql)){
     
    //             // Redirect to a success page or show a success message
    //             header('Location: success.php');
    //             exit();
    //         } else {
    //             // Handle database insertion error
    //             echo $error_message = '<p id="error">Error inserting data into database.</p>';
    //         }
    //     }
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
  .text{
    text-align:center ;
  }
  form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
  }
  
  label {
    display: block;
    margin-bottom: 5px;
  }
  
  input[type="text"],
  input[type="file"],
  input[type="textarea"],
  button {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box; /* Ensure padding and border are included in width */
  }
  
  #error{
    padding:5px;
    color:red;
  }
  .Alink{
    width: 100%;
    padding: 10px;
    background-color: #0d6efd;
    border: none;
    border-radius: 3px;
    text-decoration: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  .Alink{
    width: 100%;
    padding: 10px;
    background-color: #0d6efd;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .go_lastPost a{
    text-decoration: none;
  }
</style>

</head>
<body>
<?php
// code chat gpt 
$error_message = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form is submitted for creating a new post
    if (isset($_POST['submit'])) {
        $writeOverview = $_POST['writeOverview'];
        $writeHere = $_POST['writeHere'];

        // Check if file is uploaded
        if (isset($_FILES['choosefile']) && $_FILES['choosefile']['error'] === UPLOAD_ERR_OK) {
            $filename = $_FILES["choosefile"]["name"];
            $tempname = $_FILES["choosefile"]["tmp_name"];
            $folder = "../imag/gallery".$filename;

            // Move the uploaded file to the specified folder
            if (move_uploaded_file($tempname, $folder)) {
                // File upload successful, now insert post data into the database
             $sql = "INSERT INTO lastpost (lastPost_Image, lastPost_About, lastPost_writeHere) VALUES ('$filename', '$writeOverview', '$writeHere')";
                if (mysqli_query($conn, $sql)) {
                    echo $success_message = "
                    <div class='go_lastPost'>
                    <h3>New post created successfully</h3>
                    <p> go to page <a href='./lastPostPage.php'>last post</a></p>
                    </div>";
                    } else {
                        echo $error_message = "Error creating new post: " . mysqli_error($conn);
                    }
            } else {
                echo $error_message = "Failed to upload image.";
            }
        } else {
            echo $error_message = "No file uploaded.";
        }
    }
}
?>
    <div class="container text-center">
             <!-- Display error or success message if set -->
             <?php //if(isset($error_message)) echo $error_message; ?>
             <?php //if(isset($success_message)) echo $success_message; ?>

        <div class="col-sm-12">

            <h3 class="p-3 bg-primary text-white">
            Welcome <?php echo $_SESSION['patient_name']; ?> , reservation
            </h3>

            <table class="table table-dark table-bordered">
                <thead>
                    <tr class="text-center">
                        <td scope="col">patient name</td>
                        <td scope="col">patient email</td>
                        <td scope="col">reservation date</td>
                        <td scope="col">payment</td>
                        <td scope="col">cancel reservation</td>
                    </tr>
                </thead>
                <tbody>
                        <tr class="text-center">
                            <td scope="row">amr kamal</td>
                            <td class="text-center">amrkamal191@gmail.com</td>
                            <td class="text-center">friday from 10am to 4pm</td>
                            <td class="text-center">success online</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-info">ok</a>
                                <a href="#" class="btn btn-danger delete" data-field="city_id" data_id="<?php echo $row['city_id'];?>" data-table="city">Delete</a>
                            </td>
                        </tr>
                </tbody> 

            </table>
        </div>

        <!-- create new post  -->
        <div class="newPost">
            <h3>Create new post</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                <div class="input-group">
                <label for="AboutLecture">Choose Image</label>
                <input type="file" name="choosefile" value="" />
                </div>
                <div class="input-group">
                    <label for="AboutLecture">Writing an overview of the post</label>
                    <input type="text" id="AboutLecture" name="writeOverview" >
                </div>
                <div class="input-group">
                    <label for="writeHere">Write here</label>
                    <input type="textarea" id="writeHere" name="writeHere">
                </div>
                <button class="Alink" name="submit">New post</button>
            </form>
        </div>
    </div>
</body>
</html>
<?php require_once BLA.'inc/footer.php';?>
