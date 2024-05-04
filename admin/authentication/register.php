<?php
require_once('../../config.php');
require_once BLA.'inc/nav.php';
require_once BL."functions/db.php";
require_once BL."functions/messages.php";
require_once BL."functions/valid.php";

// Initialize error flag
$err_s = 0;
$user_error = $email_error = $pass_error = '';

if(isset($_POST['submit'])){
    $username = strtolower($_POST['username']);
    $email = strtolower($_POST['email']);
    $password = $_POST['password'];  // Do not lowercase password

    // Sanitize inputs
    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);

    // Validate userName
    if(empty($username)){
        $user_error = '<p id="error">Please enter a username.</p><br>';
        $err_s = 1;
    } elseif(strlen($username) < 8 ){
        $user_error = '<p id="error">Your username needs to have a minimum of 8 letters.</p><br>';
        $err_s = 1;
    }

    // Check if username already exists
    $check_user = "SELECT * FROM `patient` WHERE patient_name='$username'";
    $check_result = mysqli_query($conn, $check_user);
    $num_rows = mysqli_num_rows($check_result);
    if($num_rows != 0){
        $user_error = '<p id="error">Sorry, username already exists. Please choose another one.</p><br>';
        $err_s = 1;
    }

    // Validate email
    if(empty($email)){
        $email_error = '<p id="error">Please insert an email.</p><br>';
        $err_s = 1;
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_error = '<p id="error">Please enter a valid email.</p><br>';
        $err_s = 1;
    }

    // Validate password
    if(empty($password)){
        $pass_error = '<p id="error">Please insert a password.</p><br>';
        $err_s = 1;
    } elseif(strlen($password) < 8){
        $pass_error = '<p id="error">Your password needs to have a minimum of 8 characters.</p><br>';
        $err_s = 1;
    }

    if($err_s == 0 && $num_rows == 0){
        // Hash password
        $hashed_password = password_hash($password , PASSWORD_DEFAULT);

        // Insert into database
        $sql = "INSERT INTO patient (patient_name, patient_email, patient_password) VALUES ('$username', '$email', '$hashed_password')";
        if(mysqli_query($conn, $sql)){
            include('./login.php');
            echo $success_message = "Registration successful.";
        } else {
            // Handle database insertion error
            echo $error_message = '<p id="error">Error inserting data into the database.</p>';
            include('register.php');
        }
    }
}
?>
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
  .Alink input[type='submit']{
    background-color: #0d6efd;
    color: white;
    text-decoration: none;
  }
</style>
</head>
<body>
<div class="register-container text-center">
   <h2 class="text">Register page</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="input-group">
            <label for="username">Patient name</label>
            <input type="text" id="username" name="username">
            <?php echo $user_error; ?>
        </div>
        <div class="input-group">
            <label for="email">Patient Email</label>
            <input type="email" id="email" name="email">
            <?php echo $email_error; ?>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <?php echo $pass_error; ?>
        </div>
       
        <div class="Alink">
            <input type="submit" name="submit" value="Register">
        </div>
    </form>
</div>
</body>
</html>
<?php require_once BLA.'inc/footer.php';?>
