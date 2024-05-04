<?php
    require_once('../config.php');
    require_once BLA.'inc/nav.php';
    require_once BL.'functions/valid.php';
    require_once BL.'functions/db.php';

    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database_name = 'medical_clinic';

    try {
        $pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
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

            <div class='container'>
                <div class='row align-items-center col-sm-12 col-md-12 col-lg-12 '>
                    <div class='d-flex gap-4 flex-wrap mt-2 my-2'>
                        <?php
                            // Assuming $pdo is your PDO connection object
                            // class= "cart col-sm-6 col-md-3 col-lg-3"
                            try {
                                $stmt = $pdo->query("SELECT * FROM lastpost");
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<div class='card>";
                                    echo '<img src="data:image/jpe/g;base64,'.base64_encode($row['lastPost_Image']) . '"
                                    style="width:300px;"/>';
                                    echo "<h4>{$row['lastPost_About']}</h4>";
                                    echo "<p>{$row['lastPost_writeHere']}</p>";
                                echo "</div>";
                            }
                            } catch (PDOException $e) {
                                // echo "Error: " . $e->getMessage();
                                echo "<h3>not found any blog post</h3>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
<?php  require_once BLA.'inc/footer.php';?>
