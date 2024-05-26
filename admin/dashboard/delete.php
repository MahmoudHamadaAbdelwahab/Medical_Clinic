<?php
    require_once('../../config.php');
    require_once BL.'functions/db.php';
    require_once BL.'functions/messages.php';
    require_once BL.'functions/valid.php';
    require_once BLA.'inc/nav.php';
    // write inside get the database 
    $id = $_GET['id'];
    mysqli_query($conn , "DELETE FROM doctor WHERE doctorId = $id");
    echo'
    <script>
        alert("تم حذف المنتج بنجاح")
    </script>
    '; 
    header('location:showAllDoctors.php');
?>
<?php require_once BLA.'inc/footer.php'; ?>