<?php
    require_once('../../config.php');
    require_once BL.'functions/valid.php';
    require_once BLA.'inc/nav.php';
    require_once BL.'functions/messages.php';
    require_once BL.'functions/valid.php';
    require_once BL."functions/db.php";
    // if(isset($_SESSION['patient_name'])){
      // header('location:'.BL.'page/homePage.php');
    // }
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

button[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #0d6efd;
  color: black;
  border: none;
  border-radius: 3px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.Alink{
color: black;
border: none;
border-radius: 3px;
text-decoration: none;
cursor: pointer;
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
                    // Go to the database and make sure that this data exists  
                    $check = getRow('patient','patient_email',$email);
                    // the same word above
                    $check_password = password_verify($pass , $check['patient_password']);
                    if($check_password){
                        $_SESSION['patient_name'] = $check['patient_name'];
                        $_SESSION['patient_email'] = $check['patient_email'];
                        $_SESSION['patientId'] = $check['patientId'];
                        $_SESSION['patient_role'] = $check['patient_role'];

                        // include('../../page/homePage.php');
                        header('location:'.BL.'page/homePge.php');
                        echo $success_message = "success login go to home page";
                    }else{
                        echo $error_message = "error in password please tye agin";
                    }
                }else{
                    $error_message = "please type correct email";
                }
            }else{
                $error_message = "please fill all felids";
            }
        }

    ?>

  <div class="login-container">
    <h2>Login</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <div class="input-group">
        <label for="email">Patient Email</label>
        <input type="text" id="email" name="email" required>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
      </div>
       <button type="submit" name="login"> Login </button> 

        Don't have an account ?
      <a style="cursor: pointer;text-decoration: none;"
        href="<?php echo BURLA.'authentication/register.php';?>">Register</a>
      </div>
    </form>
  </div>

</body>
</html>

<?php
    require_once BLA.'inc/footer.php';
?>