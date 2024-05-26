<?php
    require_once('../../config.php');

    if(isset($_SESSION['patient_name']) || isset($_SESSION['doctorName'])){
        session_destroy();
        header('location:'.BURLA.'authentication/login.php');
    }else{
        header('location:'.BURL.'page/homePage.php');
    }
    ?>

<?php
    require_once BLA.'inc/footer.php';
?>