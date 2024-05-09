
<?php
    require_once('../../config.php');
    require_once BL.'functions/db.php';
    require_once BL.'functions/messages.php';
    require_once BL.'functions/valid.php';
    require_once BLA.'inc/nav.php';

    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);// removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        
        // Check user is exist in the database
        $query = "SELECT * FROM patient WHERE patient_name = '$username' AND patient_password = '$password'";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
                $user = mysqli_fetch_assoc($result);
                // Login successful, set session variables
                $_SESSION['PatientId'] = $user['PatientId'];
                $_SESSION['patient_name'] = $user['patient_name'];
                $_SESSION['patient_role'] = $user['patient_role'];

                $delay = 1;  // Delay in seconds before refreshing the page
                header("Refresh: $delay"); // Redirect to the current page after the specified delay
                echo "<div class='form_success'>
                         <h3> successfully login </h3><br/>
                     </div>";
        } else {
            echo "<div class='form_error'>
                    <h3>Incorrect Username or password.</h3><br/>
                 </div>";
                }
    }else{
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>

<style>
.login-container {
    max-width: 400px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

.input-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
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
  .Alink input{
    background-color: #0d6efd;
    color: white;
  }

  .form_success ,
   .form_error{
        display: flex;
        justify-content: center;
        flex-direction: column;
        width: 30%;
        text-align: center;
    }
    
    .form_success .link a,
    .form_error .link a{
        text-decoration: none;
        cursor: pointer;
    }
</style>

</head>
<body>

  <div class="login-container text-center">
    <h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="input-group">
            <label for="name">Patient Name</label>
            <input type="text" id="name" name="username"  placeholder="Username" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password"  placeholder="Password" required>
        </div>
        <div class="Alink">
            <input type="submit" name="login" value="Login">
        </div>
        Don't have an account?
        <a href="<?php echo BURLA.'authentication/register.php'; ?>">Register</a>
    </form>
</div>

<?php } ?>

</body>
</html>

<?php require_once BLA.'inc/footer.php'; ?>