<?php
    require_once('../config.php');
    require_once BL.'functions/db.php';
    require_once BL.'functions/messages.php';
    require_once BL.'functions/valid.php';
    require_once BLA.'inc/nav.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>department doctors</title>
    <style>
        .container{
            text-align: center;
        }
        .doctors {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
            <h1>Doctors</h1>
            <div class="doctors">
                <?php
                require_once('../config.php');
                require_once BL.'functions/db.php';
                require_once BL.'functions/messages.php';
                require_once BL.'functions/valid.php';
                // Fetch doctors from the database
                $department_id = $_GET['department_id'];

                $sql = "SELECT * FROM doctor WHERE depart_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $department_id);
                $stmt->execute();
                $result = $stmt->get_result();
                
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <div class='card' style='width: 18rem;'>
                        <img src='../admin/dashboard/$row[doctorImage]' class='card-img-top'>
                        <div class='card-body'>
                            <h5 class='card-title'>$row[doctorName]</h5>
                            <p class='card-text'>$row[doctorPhone]</p>
                            <p class='card-text'>$row[doctorDate]</p>
                            <p class='card-text'>$row[doctor_booking_price]</p>
                        </div>
                    </div>
                    ";
                }
                ?>
            </div>
    </div>
</body>
</html>
<?php require_once BLA.'inc/footer.php'; ?>
