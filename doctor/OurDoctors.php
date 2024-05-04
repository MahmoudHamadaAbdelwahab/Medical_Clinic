    <?php
    require_once('../config.php');
    require_once BLA.'inc/nav.php';
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
    <link rel="stylesheet" href="../admin/assets/css/ourDoctors.css">
</head>
<body>
    
<div class="OurDoctors mb-3">
        <div class='textOurDoc'>
            <h4 class="text-center">Our Doctors</h4>
        </div>
        <div class="container mt-5 mb-5">
                <div class='CartText mt-2 mb-2'>
                    <h3 class='mt-2'>Best doctors from Dcotors Medical Center</h3>
                    <p>Doctors Medical Center is overseen by a team of highly experienced healthcare experts from the Amina Healthcare Group. These professionals have meticulously selected each hospital and clinic in their portfolio based on rigorous quality benchmarks. Our commitment to clinical excellence and the delivery of ethical, high-quality healthcare is underscored by our adherence to stringent quality assurance standards. Regardless of whether you’re an outpatient or a day case patient, you can have complete confidence in the care provided by our skilled clinical team. They are devoted to ensuring that you receive optimal treatment and achieve a swift recovery.</p>
                </div>
                <div class='d-flex justify-content-center gap-5'>
                        <!-- get data from backend api --> 
                    <div class='SpecialDoc col-sm-12 col-md-12 col-lg-12'>
                        <div class='text-SpecialDoc'>
                            <h3>Our new doctors</h3>
                        </div>
                        <div class='d-flex gap-4 flex-wrap mt-2 my-2'>
                                 <!-- start this code chat gpt  -->
                                <?php
                                    // Assuming $pdo is your PDO connection object
                                    try {
                                        $stmt = $pdo->query("SELECT * FROM doctor");
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            // Display each row as a card
                                                echo "<div class='card'";
                                                    echo '<img src="data:image/jpe/g;base64,'.base64_encode($row['doctorImage']) . '" />';
                                                    echo "<h4>{$row['doctorName']}</h4>";
                                                    echo "<p>Specialty: {$row['doctorIsSpecialty']}</p>";
                                                    echo "<p>Date: {$row['doctorDate']}</p>";
                                                    echo "<p>Phone: {$row['doctorPhone']}</p>";
                                                    echo "<p>Booking price : {$row['doctorSallary']}</p>";
                                                    // echo '<form action="" method="POST">';
                                                    // echo '<input type="hidden" name="docId" value="'.$row['doctorId'].'">';
                                                    // echo '<button type="submit" name="booking" onClick=(getData())>Booking</button>';
                                                    // echo '</form>';
                                                    echo '<form action="" method="GET">'; // Using GET method to pass data via URL
                                                        echo '<input type="hidden" name="docId" value="'.$row['doctorId'].'">';
                                                        echo '<button type="submit" name="booking">Booking</button>';
                                                    echo '</form>';
                                                echo "</div>";
                                        }
                                    } catch (PDOException $e) {
                                        echo "Error: " . $e->getMessage();
                                    }
                                ?>
                                 <!-- ent this code chat gpt  -->
                        </div>
                    </div>
                </div>
        </div>
</div>
    <!-- code js -->
    <script>
    </script>
</body>
</html>
<?php require_once BLA.'inc/footer.php';?>