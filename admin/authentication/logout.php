<?php
    require_once('../../config.php');
    // if(isset($_SESSION['patient_name'])){
    //     session_destroy();
    //     header('location:'.BURLA.'authentication/login.php');
    // }else{
    //     header('location:'.BURL.'page/homePage.php');
    //     exit; // Make sure to exit after redirection
    // }
  
    // Start the session (if not already started)
    session_start();

    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or any other desired page
    header('location:'.BURL.'page/homePage.php');
    exit; // Make sure to exit after redirection

?>
<?php
    require_once BLA.'inc/footer.php';
?>