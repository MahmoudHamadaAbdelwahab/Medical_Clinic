<?php
    require_once('../config.php');
    require_once BLA.'inc/nav.php';
    require_once BL.'functions/valid.php';
    require_once BL.'functions/messages.php';
    require_once BL.'functions/db.php';
    // write inside get the database 
    $id = $_GET['id'];
    mysqli_query($conn , "DELETE FROM lastpost WHERE lastPost_Id = $id");
    echo'
    <script>
         alert("The post has been successfully deleted");
    </script>
    '; 
    header('location:posted_I_Created.php');
?>