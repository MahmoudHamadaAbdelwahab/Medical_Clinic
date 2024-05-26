<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
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
    .form_success{
        display: flex;
        justify-content: center;
        flex-direction: column;
        width: 30%;
        text-align: center;
    }
    .form_success .link a{
        text-decoration: none;
        cursor: pointer;
    }
    .form_error{
        background-color: red;
        text-align: center;
    }
    </style>
</head>
<body>
<?php
    require_once('../../config.php');
    require_once BLA.'inc/nav.php';
    require_once BL."functions/db.php";
    require_once BL."functions/messages.php";
    require_once BL."functions/valid.php";

    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($conn, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($conn, $email);
        $roles    = stripslashes($_REQUEST['role']);
        $roles    = mysqli_real_escape_string($conn,$roles);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // $create_datetime = date("Y-m-d H:i:s");
        $query = "INSERT INTO patient (patient_name, patient_email, patient_password , patient_role) VALUES ('$username', '$email', '$password' , '$roles')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class='form_success container'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form_error'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <div class="register-container text-center">
   <h2 class="text">Register page</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="input-group">
            <label for="username">User name</label>
            <input type="text" id="username" name="username" placeholder="Username" required />
        </div>
        <div class="input-group">
            <label for="email">User Email</label>
            <input type="email" id="email" name="email" placeholder="Email Address" required>
        </div>
        <!-- <div class="input-group"> -->
            <!-- <label aria-label="Default select example" for="role">Choose:</label> -->
            <!-- <select id="role" name="role" required style="margin: 3px;">
                <option value="" style="display: none;">Choose Here</option>
                <option value="doctor">Doctor</option>
                <option value="patient">Patient</option>
            </select> -->
        <!-- </div> -->

        <div class="input-group">
            <label for="password">User Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required>
        </div>
        <div class="input-group" style="display: none;">
            <input type="text" id="role" name="role" value="patient">
        </div>
        <div class="Alink">
            <input type="submit" name="submit" value="Register">
        </div>
    </form>
</div>
<?php
    }
?>
</body>
</html>

<?php require_once BLA.'inc/footer.php';?>