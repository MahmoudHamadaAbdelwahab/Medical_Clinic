<?php
    require_once('../../config.php');
    require_once BLA.'inc/nav.php';
    require_once BL."functions/db.php";
    require_once BL."functions/messages.php";
    require_once BL."functions/valid.php";

        // Initialize error flag
        $err_s = 0;

        // when the user enters register
        if(isset($_POST['submit'])){
            $username = strtolower($_POST['username']);
            $email = strtolower($_POST['email']);
            $password = strtolower($_POST['password']);
            $hashed_password = password_hash($password , PASSWORD_DEFAULT);

            // Sanitize inputs
            $username = mysqli_real_escape_string($conn, $username);
            $email = mysqli_real_escape_string($conn, $email);
            $password_hashed = mysqli_real_escape_string($conn, $hashed_password);

            // Validate userName
            if(empty($username)){
                $user_error = '<p id="error"> please enter user name </p> <br>';
                $err_s = 1;
            }elseif(strlen($username) < 8 ){
                $user_error = '<p id="error"> your username needs to have a minimum of 8 letters </p> <br>';
                $err_s = 1;
            }

            // Check if username already exists
            $check_user = "select * from `patient` where patient_name='$username'";
            $check_result = mysqli_query($conn, $check_user);
            $num_rows = mysqli_num_rows($check_result);
            if($num_rows != 0){
                $user_error = '<p id="error"> Sorry, username already exists. Please choose another one. </p> <br>';
                $err_s = 1;
            }

            // Validate email
            if(empty($email)){
                $email_error = '<p id="error"> please insert email </p> <br>';
                $err_s = 1;
            } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $email_error = '<p id="error"> please enter a valid email </p> <br>';
                $err_s = 1;
            }

            // Validate password
            if(empty($password_hashed)){
                $pass_error = '<p id="error"> please insert password </p> <br>';
                $err_s = 1;
            } elseif(strlen($password_hashed) < 8){
                $pass_error = '<p id="error"> your password needs to have a minimum of 8 letters </p> <br>';
                $err_s = 1;
            }

            if($err_s == 0 && $num_rows == 0){
                // Insert into database
                $sql = "insert into patient (patient_name, patient_email , patient_password) values ('$username', '$email', '$password_hashed')";
                if(mysqli_query($conn, $sql)){
                    include('./login.php');
                    echo $success_message = "successfuly";
                } else {
                    // Handle database insertion error
                    echo $error_message = '<p id="error">Error inserting data into database.</p>';
                    include('register.php');
                }
            }
        }
    ?>
        <!-- start register -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../assets/css/register.css">
        <style>
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
    <div class="register-container text-center">
       <h2 class="text">Register page</h2>
        <form action="" method="POST">
            <div class="input-group">
                <label for="username">Patient name</label>
                <input type="text" id="username" name="username" >
            </div>
            <div class="input-group">
                <label for="email">Patient Email</label>
                <input type="email" id="email" name="email" >
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
           
            <div class="Alink">
                <a href="<?php echo BURLA.'authentication/login.php';?>" name="submit"> Register</a>
            </div>

        </form>
  </div>

</body>
</html>

<?php require_once BLA.'inc/footer.php';?>