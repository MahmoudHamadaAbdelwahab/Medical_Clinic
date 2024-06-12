<?php
require_once('../../config.php');
require_once BL.'functions/db.php';
require_once BL.'functions/messages.php';
require_once BL.'functions/valid.php';
require_once BLA.'inc/nav.php';

// When form submitted, check and create user session.
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = stripslashes($_REQUEST['username']); // removes backslashes
    $username = mysqli_real_escape_string($conn, $username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    
    // Check user existence in the database
    $query1 = "SELECT * FROM patient WHERE patient_name = '$username' AND patient_password = '$password'";
    $query2 = "SELECT * FROM doctor WHERE doctorName = '$username' AND doctorPassword = '$password'";
    
    $result1 = mysqli_query($conn, $query1);
    $result2 = mysqli_query($conn, $query2);
    
    if (mysqli_num_rows($result1) == 1) {
        $user = mysqli_fetch_assoc($result1);
        
        // Login successful, set session variables for patient
        $_SESSION['PatientId'] = $user['PatientId'];
        $_SESSION['patient_name'] = $user['patient_name'];
        $_SESSION['patient_email'] = $user['patient_email'];
        $_SESSION['patient_role'] = $user['patient_role'];
        
        // $success_message = "<h3>Successfully logged in as patient.</h3>";
        echo '
        <div class="alert alert-info" role="alert">
            Successfully logged in as patient
        </div>        
    ';
    } elseif (mysqli_num_rows($result2) == 1) {
        $user = mysqli_fetch_assoc($result2);
        
        // Login successful, set session variables for doctor
        $_SESSION['doctorId'] = $user['doctorId'];
        $_SESSION['doctorName'] = $user['doctorName'];
        $_SESSION['doctorRole'] = $user['doctorRole'];
        
        // $success_message = "<h3>Successfully logged in as doctor.</h3>";
        echo '
            <div class="alert alert-info" role="alert">
                Successfully logged in as doctor
            </div>        
        ';
    } else {
        $error_message = "<h3>Incorrect Username or password.</h3>";
        echo "<div class='form_error'>$error_message<br/></div>";
        header('Location: login.php');
        exit();
    }
    
    echo "<div class='form_success'>$success_message<br/></div>";
    header('Location: ../../page/homePage.php');
    exit();
} else {
?>

<!-- HTML Form code here -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
<style>
.login{
 height: 590px;
}
.login .container {
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
  button{
    width: 100%;
    padding: 10px;
    background-color: #0d6efd;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .form_success,
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
    a{
        text-decoration: none;
        cursor: pointer; 
    }
</style>

</head>
<body>
    <div class="login">
        <div class="container text-center">
            <h2>Login</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="input-group">
                    <label for="name">User Name</label>
                    <input type="text" id="name" name="username"  placeholder="Username" required>
                </div>
                <div class="input-group">
                    <label for="password">User Password</label>
                    <input type="password" id="password" name="password"  placeholder="Password" required>
                </div>
                <button name="login">Login</button>
                Don't have an account?
                <a href="<?php echo BURLA.'authentication/register.php'; ?>">Register</a>
            </form>
        </div>
    </div>
<?php } ?>

</body>
</html>

<?php require_once BLA.'inc/footer.php'; ?>