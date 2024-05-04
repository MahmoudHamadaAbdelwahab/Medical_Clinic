<?php
    // Include necessary files
    require_once('../../config.php');
    require_once BL.'functions/db.php';
    require_once BL.'functions/messages.php';
    require_once BL.'functions/valid.php';
    require_once BLA.'inc/nav.php';
    
    // Check if user is already logged in, redirect to home page
    if(isset($_SESSION['patient_name'])){
        header('location:'.BL.'page/homePage.php');
        exit(); // Make sure to stop script execution after redirection
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../assets/css/login.css">

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
</style> 
</head>
<body>

<?php
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $pass = $_POST['password'];
        if(checkEmpty($email) && checkEmpty($pass)){
            if(validEmail($email)){
                $check = getRow('patient', 'patient_email', $email);
                if($check){
                    $check_password = password_verify($pass, $check['patient_password']);
                    if($check_password){
                        $_SESSION['patient_name'] = $check['patient_name'];
                        $_SESSION['patient_email'] = $check['patient_email'];
                        $_SESSION['patient_role'] = $check['patient_role'];

                        include('../../page/homePage.php');
                        exit(); // Stop script execution after redirection
                    } else {
                      echo $error_message = "Error in password. Please try again.";
                    }
                } else {
                    echo $error_message = "Account not found.";
                }
            } else {
                echo $error_message = "Please enter a correct email.";
            }
        } else {
            echo $error_message = "Please fill all fields.";
        }
    }
?>

<div class="login-container text-center">
    <h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="input-group">
            <label for="email">Patient Email</label>
            <input type="text" id="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        <div class="Alink">
            <input type="submit" name="login" value="Login">
        </div>
        Don't have an account?
        <a href="<?php echo BURLA.'authentication/register.php'; ?>">Register</a>
    </form>
</div>

<?php require_once BLA.'inc/footer.php'; ?>
</body>
</html>
