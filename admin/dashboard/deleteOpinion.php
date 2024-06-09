<?php
    require_once('../../config.php');
    require_once BL.'functions/db.php';
    require_once BL.'functions/messages.php';
    require_once BL.'functions/valid.php';
    require_once BLA.'inc/nav.php';
    // write inside get the database 
    echo $id = $_GET['id'];
    mysqli_query($conn , "DELETE FROM opinion WHERE id = $id");
    echo'
    <script>
        alert("The partition has been successfully deleted")
    </script>
    '; 
    header('location:showAllOpinion.php');
?>
<?php require_once BLA.'inc/footer.php'; ?>