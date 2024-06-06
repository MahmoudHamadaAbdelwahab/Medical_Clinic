<?php
    require_once('../config.php');
    require_once BLA.'inc/nav.php';
    require_once BL.'functions/valid.php';
    require_once BL.'functions/db.php';
    $result = mysqli_query($conn, "SELECT * FROM lastpost");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/assets/css/latestPublishedPosts.css">

</head>
<body>
    <div class='BlogPost text-center'>

            <div class='textBlogPost'>
                 <h4>Latest Published Posts</h4>
            </div>

            <?php include('Component/Com-lastPost.php') ?>
         
</body>
</html>
<?php  require_once BLA.'inc/footer.php';?>
