<?php
    require_once('../config.php');
    require_once BL.'functions/valid.php';
    require_once BL.'functions/db.php';
    // show doctor data 
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
    // Include your database connection or any necessary files here
    // Assuming $pdo is your PDO connection object

    if (isset($_GET['docId'])) {
        $doctorId = $_GET['docId'];

        // Query to fetch doctor's data based on doctorId
        $stmt = $pdo->prepare("SELECT * FROM doctor WHERE doctorId = ?");
        $stmt->execute([$doctorId]);
        $doctorData = $stmt->fetch(PDO::FETCH_ASSOC);
        // Display the doctor's data
        if ($doctorData) {
            $_SESSION['doctorName'] = $doctorData['doctorName'];
            $_SESSION['doctorIsSpecialty'] = $doctorData['doctorIsSpecialty'];
            $_SESSION['doctorDate'] = $doctorData['doctorDate'];
            $_SESSION['doctorPhone'] = $doctorData['doctorPhone'];
            $_SESSION['doctorSallary'] = $doctorData['doctorSallary'];
        } else {
            echo "Doctor not found.";
        }
    } else {
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <div class='d-flex gap-4 flex-wrap mt-2 my-2'>
                <!-- start this code chat gpt  -->
            <?php
                // Assuming $pdo is your PDO connection object
                try {
                    $stmt = $pdo->query("SELECT * FROM doctor");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        
                        // Display each row as a card
                            echo "<div class='card'";
                                echo "<img src='../../admin/dashboard/{$row['doctorImage']}'/>";
                                echo "<h4>{$row['doctorName']}</h4>";
                                echo "<p>Specialty: {$row['doctorIsSpecialty']}</p>";
                                echo "<p>Date: {$row['doctorDate']}</p>";
                                echo "<p>Phone: {$row['doctorPhone']}</p>";
                                echo "<p>Booking price : {$row['doctor_booking_price']}</p>";
                                //echo '<form action="" method="GET">'; // Using GET method to pass data via URL
                                    echo '<input type="hidden" name="docId" value="'.$row['doctorId'].'">';
                                    echo '<button type="submit" name="booking">Booking</button>';
                                //echo '</form>';
                            echo "</div>";
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            ?>
                <!-- ent this code chat gpt  -->
    </div>
</body>
</html>