<?php
    require_once('../../config.php');
    require_once BL.'functions/db.php';
    require_once BL.'functions/messages.php';
    require_once BL.'functions/valid.php';
    require_once BLA.'inc/nav.php';
    // write inside get the database 
    $id = $_GET['delete_id'];
    mysqli_query($conn , "DELETE FROM department WHERE depart_id = $id");
    echo'
    <script>
        alert("The partition has been successfully deleted")
    </script>
    '; 
    header('location:showAllDepart.php');
?>
<?php require_once BLA.'inc/footer.php'; ?>