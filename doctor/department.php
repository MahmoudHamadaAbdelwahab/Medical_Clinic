<?php
    require_once('../config.php');
    // require_once BLA.'inc/nav.php';
    require_once BL.'functions/valid.php';
    require_once BL.'functions/db.php';
?>
    <!-- show doctor data -->
    <?php
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
    <style>
        .department{
        display: flex;
        flex-wrap: wrap;
        }
        .department .cart h4{
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class='department text-center mt-3 mb-3'>
        <div class="container">
        <h1>Medical departments</h1>
            <div class='row'>
                <div class='cart d-flex flex-direction-row mt-2'>
            <?php
                // Assuming $pdo is your PDO connection object
                try {
                $stmt = $pdo->query("SELECT * FROM medicaldepartments");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<div class='justify-content-center col-sm-2 col-md-2 col-lg-2'>";
                        echo '<img src="data:image/jpe/g;base64,'.base64_encode($row['depart_imag']) . '" />';
                        // echo "<img src='$row[lastPost_Image]' class='card-img-top'>"
                        echo "<h4>{$row['depart_name']}</h4>";
                        echo "</div>";
                        }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
