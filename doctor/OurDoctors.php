<?php
    require_once('../config.php');
    require_once BLA.'inc/nav.php';
    require_once BL.'functions/valid.php';
    require_once BL.'functions/db.php';


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
                        <!-- show all doctors -->
                        <div class="allDoctors text-center">
                            <?php
                                $query = "SELECT * FROM doctor";
                                $result = mysqli_query($conn , $query);
                                while($row = mysqli_fetch_array($result)){
                                    echo "
                                    <form action='' method='post'>
                                        <div>
                                            <div class='card' style='width: 18rem;'>
                                                <img src='../admin/dashboard/$row[doctorImage]' class='card-img-top'>
                                                <div class='card-body'>
                                                    <h5 class='card-title'>$row[doctorName]</h5>
                                                    <p class='card-text'>$row[doctorIsSpecialty]</p>
                                                    <p class='card-text'>$row[doctorPhone]</p>
                                                    <p class='card-text'>$row[doctorDate]</p>
                                                    <p class='card-text'>$row[doctor_booking_price]</p>
                                                    <input type='text' id_Patient=$_SESSION[PatientId] style='display:none;'>
                                                    <input type='text' id_doctor=$row[doctorId] style='display:none;'>
                                                    <a href='../patient/personalPatient.php? id_doctor=$row[doctorId]' name='Booking' class='btn btn-primary'>Booking Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </from>    
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
<?php require_once BLA.'inc/footer.php';?>