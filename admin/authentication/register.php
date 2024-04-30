<?php
    require_once('../../config.php');
    require_once BLA.'inc/nav.php';

    // if(isset($_SESSION['admin_name'])){
    //     session_destroy();
    //     header('location:'.BURL_AUTH.'login.php');
    // }else{
    //     header('location:'.BURL_AUTH);
    // }
?>

    <?php
        require_once BL."functions/db.php";
        // Initialize error flag
        $err_s = 0;

        // when the user enters register
        if(isset($_POST['submit'])){
            $username = strtolower($_POST['username']);
            $email = strtolower($_POST['email']);
            $password = strtolower($_POST['password']);
            // $email = $_POST['email'];
            // $password = $_POST['password'];

            // Sanitize inputs
            $username = mysqli_real_escape_string($conn, $username);
            $email = mysqli_real_escape_string($conn, $email);
            $password = mysqli_real_escape_string($conn, $password);

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
            if(empty($password)){
                $pass_error = '<p id="error"> please insert password </p> <br>';
                $err_s = 1;
            } elseif(strlen($password) < 8){
                $pass_error = '<p id="error"> your password needs to have a minimum of 8 letters </p> <br>';
                $err_s = 1;
            }

            if($err_s == 0 && $num_rows == 0){
                // Insert into database
                $sql = "insert into patient (patient_name, patient_email , patient_password) values ('$username', '$email', '$password')";
                if(mysqli_query($conn, $sql)){
                    // Redirect to login page after successful insertion
                    header('Location:login.php');
                    exit(); // Stop script execution after redirect
                } else {
                    // Handle database insertion error
                    echo '<p id="error">Error inserting data into database.</p>';
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


</head>
<body>

    <!-- <div class="register_container">
        <form action="" method="POST">
            <label class="title-register">Create an Account</label>
            <input
                value=""
                placeholder="Full Name"
                type="text"
                class="user-input"
                required
            />
            <input
                value=""
                placeholder="Email Address"
                type="email"
                class="user-input"
                required
            />
            <input
                value=""
                placeholder="Password"
                type="password"
                class="user-input"
                required
            />
            <input
                value=""
                placeholder="Confirm Password"
                type="password"
                class="user-input"
                required
            />
            <button type="submit" class="btn-register">Register</button>
            <div class="form-links">
                <label>
                    Already have an account?
                    <a href="/login">Login here</a>
                </label>
            </div>
        </form>
    </div> -->
    <div class="register-container">
       <h2 class="text">Register page</h2>
        <form action="" method="POST">
            <?php
                if(isset($user_error)){
                echo $user_error;
                }
            ?>
            <div class="input-group">
                <label for="username">Patient User</label>
                <input type="text" id="username" name="username" required>
            </div>
            <?php
                if(isset($email_error)){
                echo $email_error;
                }
            ?>
            <div class="input-group">
                <label for="email">Patient Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <?php
                if(isset($pass_error)){
                echo $pass_error;
                }
            ?>  
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" id="submit" name="submit" value="Register">
        </form>
  </div>

</body>
</html>

        <!-- end register -->

<?php
    require_once BLA.'inc/footer.php';
?>