<?php
    require_once('../../config.php');
    require_once BLA.'inc/header.php';

    if(isset($_SESSION['admin_name'])){
        session_destroy();
        header('location:'.BURL_AUTH.'login.php');
    }else{
        header('location:'.BURL_AUTH);
    }
?>

<?php
    echo 'logout php';
?>

<?php
    require_once BLA.'inc/footer.php';
?>


<!-- Logout Script (logout.php)  -->
 <?php
// session_start(); // Start PHP session

// // Unset all session variables
// $_SESSION = array();

// // Destroy the session
// session_destroy();

// // Redirect to login page
// header("Location: homePage.php");
// exit();
?> 



