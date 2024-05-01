<?php
    require_once('../../config.php');
    require_once BL.'functions/valid.php';
    require_once BLA.'inc/nav.php';
    require_once BL.'functions/messages.php';
    require_once BL."functions/db.php";

    // Check if user is already logged in, redirect to personal page if so
    // session_start(); // Start PHP session
    // if(isset($_SESSION['patient_name'])){
    //     header('Location:../../page/homePage.php');
    //     exit();
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
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
  background-color: #45a049;
}
</style> 

</head>
<body>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM patient WHERE patient_email='$email' AND patient_password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
           echo $success_message ="Login successfuly";
        //    header("Location:".BURL."page/homePage.php");

        } else {
            echo $error_message = "Something error! Check your username or password.";
        }
        $conn->close();
    }
    ?>

  <div class="login-container">
    <h2>Login</h2>
    <form action="" method="post">
      <div class="input-group">
        <label for="email">Patient Email</label>
        <input type="text" id="email" name="email" required>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
      </div>
      <button type="submit" name="login">Login</button>
      <div>
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