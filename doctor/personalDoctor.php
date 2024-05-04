<?php
    require_once('../config.php');
    require_once BLA.'inc/nav.php';
    require_once BL.'functions/valid.php';
    require_once BL.'functions/db.php';

    if(!$conn){
        dir('Error' . mysqli_connect_error());
    }

    $patient = isset($_SESSION['patient_name']) && $_SESSION['patient_role'] == 'patient' ? $_SESSION['patient_name'] : null;
    $doctor = isset($_SESSION['patient_name']) && $_SESSION['patient_role'] == 'doctor' ? $_SESSION['patient_name'] : null;

    $err_s = 0;

    if(isset($_POST['submit'])){
        $image = $_POST['image'];
        $writeOverview = $_POST['writeOverview'];
        $writeHere = $_POST['writeHere'];

        if(empty($image)){
            $user_error = '<p id="error">Please enter image.</p><br>';
            $err_s = 1;
        } elseif(empty($writeOverview)){
            $user_error = '<p id="error">Please enter write overview.</p><br>';
            $err_s = 1;
        } elseif(empty($writeHere)){
            $user_error = '<p id="error">Please enter write here.</p><br>';
            $err_s = 1;
        } elseif(strlen($writeHere) > 255 ){
            $user_error = '<p id="error">Please keep the character length less than 255.</p><br>';
            $err_s = 1;
        }

        if($err_s == 0){ // Removed $num_rows check for username existence since it's not relevant here
            $sql = "INSERT INTO lastpost (lastPost_Image, lastPost_About, lastPost_writeHere) VALUES ('$image', '$writeOverview', '$writeHere')";

            if(mysqli_query($conn, $sql)){
                // Redirect to a success page or show a success message
                header('Location: success.php');
                exit();
            } else {
                // Handle database insertion error
                echo $error_message = '<p id="error">Error inserting data into database.</p>';
            }
        }
    }
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
  .Alink a{
    color: white;
    text-decoration: none;
  }
</style>

</head>
<body>
    <div class="container text-center">
             <!-- Display error or success message if set -->
             <?php if(isset($error_message)) echo $error_message; ?>
             <?php if(isset($success_message)) echo $success_message; ?>

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
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <div class="input-group">
                    <label for="image">Choose image</label>
                    <input type="file" id="image" name="image" accept="image/*">
                </div>
                <div class="input-group">
                    <label for="AboutLecture">Writing an overview of the post</label>
                    <input type="text" id="AboutLecture" name="writeOverview" >
                </div>
                <div class="input-group">
                    <label for="writeHere">Write here</label>
                    <input type="textarea" id="writeHere" name="writeHere">
                </div>
                <div class="Alink">
                <a
                href="<?php echo BURL.'doctor/lastPostPage.php';?>"
                name="submit"
                >
                New post</a>
                </div>
            </form>
        </div>

    </div>
</body>
</html>
<?php require_once BLA.'inc/footer.php';?>
