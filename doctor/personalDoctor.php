<?php
    require_once('../config.php');
    require_once BLA.'inc/nav.php';
    require_once BL.'functions/valid.php';
    require_once BL.'functions/messages.php';
    require_once BL.'functions/db.php';

    if(!$conn){
        dir('Error' . mysqli_connect_error());
    }

    $doctor = isset($_SESSION['doctorName']) && $_SESSION['doctorRole'] == 'doctor' ? $_SESSION['doctorName'] : null;

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
    $error_message = '';
    $success_message = '';
    $doctor_id = $_SESSION['doctorId'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['submit'])){
            $writeOverview = $_POST['writeOverview'];
            $writeHere = $_POST['writeHere'];
            $id = $_POST['doctor_id'];
            $image = $_FILES['image'];
            $image_location = $_FILES['image']['tmp_name']; // it's image and extension 
            $image_name = $_FILES['image']['name'];
            $image_up = "image/".$image_name; // it's folder upload inside the image
        
            // insert data to database
            $insert = "INSERT INTO lastpost (lastPost_Image, lastPost_About, lastPost_writeHere , doctor_Id ) VALUES ('$image_up', '$writeOverview', '$writeHere' , '$id')";
            mysqli_query($conn , $insert);
            // Make sure the files are uploaded to folder image 
            if(move_uploaded_file($image_location , 'image/'.$image_name)){
                echo $success_message = "
                <div class='go_lastPost'>
                    <h3>New post created successfully</h3>
                    <p> go to page <a href='./lastPostPage.php'>last post</a></p>
                </div>";
            }else{
                echo $error_message = "No file uploaded it's the error.";
            }
        }
    }
?>
      <div class="container text-center">
        <div class="col-sm-12">
            <h3 class="p-3 bg-primary text-white">
            Welcome <?php echo $_SESSION['doctorName']; ?> , reservation
            </h3>
                    <?php
                        $doctor_id = $_SESSION['doctorId'];
                        $query = "SELECT * FROM reservation WHERE reservation_doctor_id = '$doctor_id' ";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_array($result);
                        if($row = mysqli_fetch_array($result) > 1){
                            echo '
                            <table class="table table-dark table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <td scope="col">patient name</td>
                                    <td scope="col">patient email</td>
                                    <td scope="col">price</td>
                                    <td scope="col">reservation date</td>
                                    <td scope="col">cancel reservation</td>
                                </tr>
                            </thead>
                            <tbody>
                            ';

                            $patient_id = $row['reservation_patient_id'];
                            $queryGetPatient = "SELECT * FROM patient WHERE PatientId = '$patient_id' ";
                            $resultGetPatient = mysqli_query($conn, $queryGetPatient);
    
                            while($rowGetPatient = mysqli_fetch_array($resultGetPatient)){
                                echo "
                                <tr class='text-center'>
                                <td scope='row'>$rowGetPatient[patient_name]</td>
                                <td class='text-center'>$rowGetPatient[patient_email]</td>
                                <td class='text-center'>$row[reservation_price]</td>
                                <td class='text-center'>$row[reservation_doctor_date]</td>
                                <td class='text-center'>
                                    <a href='#' class='btn btn-info'>ok</a>
                                    <a href='#' class='btn btn-danger delete' data-field='city_id' data_id='$row[reservation_id]' data-table='city'>Delete</a>
                                </td>
                            </tr>
                                ";
                            }
                        }else{
                            echo "
                                <h5>There are no reservations for you yet</h5>
                            ";
                        }
            
                    ?>
                    </tbody> 
            </table>
        </div>

        <!-- create new post  -->
        <div class="newPost">
            <h3>Create new post</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                <div class="input-group">
                  <input type="file" id="file" name="image" style="display: none;">
                  <label for="file" style="cursor: pointer; color:#0d6efd; font-weight:bold;">Choose Image Post</label>
                </div>
                <div class="input-group">
                    <label for="AboutLecture">Writing an overview of the post</label>
                    <input type="text" id="AboutLecture" name="writeOverview" >
                </div>
                <div class="input-group">
                    <label for="writeHere">Write here</label>
                    <input type="textarea" id="writeHere" name="writeHere">
                </div>
                <div class="input-group">
                    <a href="posted_I_Created.php" style="text-decoration: none; color:#0d6efd; font-weight:bold;">Posts i created</a>
                    <input type="text" name="doctor_id" value="<?php echo $doctor_id?>" style="display: none;">
                </div>
                <br>
                <button class="Alink" name="submit">New post</button>
            </form>
        </div>
    </div>
</body>
</html>
<?php require_once BLA.'inc/footer.php';?>
