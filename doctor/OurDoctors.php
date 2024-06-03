<?php
require_once('../config.php');
require_once BLA.'inc/nav.php';
require_once BL.'functions/valid.php';
require_once BL.'functions/db.php';

if(isset($_POST['Booking'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $price = $_POST['price'];
    $id_doctor = $_POST['id_doctor'];
    $id_Patient = $_POST['id_Patient'];
    $email_Patient = $_POST['email_Patient'];

    $query = "INSERT INTO reservation (reservation_price, reservation_patient_id, reservation_patient_email, reservation_doctor_date, reservation_doctor_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('disss', $price, $id_Patient, $email_Patient, $date, $id_doctor);
    if ($stmt->execute()) {
        echo "<div class='form_success container'>
                <h3>Successfully booked a doctor</h3><br/>
              </div>";
    } else {
        echo "<div class='form_error'>
                <h3>Failed to book a doctor</h3><br/>
              </div>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/assets/css/ourDoctors.css">
    <style>
        .patientEmail {
            display: none;
        }
    </style>
</head>
<body>
    
<div class="OurDoctors mb-3">
    <div class='textOurDoc'>
        <h4 class="text-center">Our Doctors</h4>
    </div>
    <div class="container mt-5 mb-5">
        <div class='CartText mt-2 mb-2'>
            <h3 class='mt-2'>Best doctors from Doctors Medical Center</h3>
            <p>Doctors Medical Center is overseen by a team of highly experienced healthcare experts...</p>
        </div>
        <div class='d-flex justify-content-center gap-5'>
            <div class='SpecialDoc col-sm-12 col-md-12 col-lg-12'>
                <div class='text-SpecialDoc'>
                    <h3>Our new doctors</h3>
                </div>
                <div class="allDoctors m-2">
                    <?php
                    if(isset($_SESSION['PatientId']) && isset($_SESSION['patient_email'])){
                        $patientId = $_SESSION['PatientId'];
                        $patientEmail = $_SESSION['patient_email'];
                    } else {
                        $patientId = 0;
                        $patientEmail = "";
                    }
                    $query = "SELECT * FROM doctor";
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result)){
                        // show the department name
                        $depart_Id = $row['depart_id'];
                        $query_depart = "SELECT * FROM department WHERE depart_id = '$depart_Id'";
                        $result_depart = mysqli_query($conn , $query_depart);
                        $row_depart = mysqli_fetch_array($result_depart);

                        echo "
                        <div class='card' style='width: 18rem;'>
                            <img src='../admin/dashboard/$row[doctorImage]' class='card-img-top'>
                            <div class='card-body'>
                                <h5 class='card-title'>$row[doctorName]</h5>
                                <p class='card-text'>$row_depart[depart_name]</p>
                                <p class='card-text'>$row[doctorPhone]</p>
                                <p class='card-text'>$row[doctorDate]</p>
                                <p class='card-text'>$row[doctor_booking_price]</p>
                                <form action='' method='POST'>
                                    <input type='hidden' name='name' value='$row[doctorName]'>
                                    <input type='hidden' name='phone' value='$row[doctorPhone]'>
                                    <input type='hidden' name='date' value='$row[doctorDate]'>
                                    <input type='hidden' name='price' value='$row[doctor_booking_price]'>
                                    <input type='hidden' name='id_doctor' value='$row[doctorId]'>
                                    <input type='hidden' name='id_Patient' value='$patientId'>
                                    <input type='hidden' name='email_Patient' value='$patientEmail'>
                                    <button type='submit' name='Booking' class='btn btn-primary'>Book Now</button>
                                </form>
                            </div>
                        </div>
                        ";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php require_once BLA.'inc/footer.php'; ?>
