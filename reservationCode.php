    <!-- insert data when user booking -->
    <?php
        if(isset($_POST['booking'])){
            $resPrice = $_POST['docSallary'];
            $resPatientId = $_SESSION['PatientId'];
            $resPatientEmail = $_SESSION['patient_email'];
            $resDoctorDate = $_POST['docDate'];
            $resDoctorId = $_POST['docId'];
           
            $sql = "INSERT INTO reservation (reservation_patient_email) VALUES ('$resPatientEmail')";
            echo $success_message = db_insert($sql);
           
            // show message
            require BL.'functions/messages.php';
        }
    ?>

    <!-- login page -->

    
<?php
    require_once('../../config.php');
    require_once BL.'functions/db.php';
    require_once BL.'functions/messages.php';
    require_once BL.'functions/valid.php';
    require_once BLA.'inc/nav.php';

    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);// removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        
        // Check user is exist in the database
        $query = "SELECT * FROM patient WHERE patient_name = '$username' AND patient_password = '$password'";
        $query2 = "SELECT * FROM doctor WHERE doctorName = '$username' AND doctorPassword = '$password'";
        
        if($query){
            $result = mysqli_query($conn, $query);
        }else{
            $result = mysqli_query($conn, $query2);
        }
        
        // $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
                $user = mysqli_fetch_assoc($result);

                if( ($user['patient_role'] == 'patient' 
                || $user['patient_role'] == '')){
                // Login successful, set session variables
                $_SESSION['PatientId'] = $user['PatientId'];
                $_SESSION['patient_name'] = $user['patient_name'];
                $_SESSION['patient_role'] = $user['patient_role'];
                }else{
                    // Login successful, set session variables
                    $_SESSION['doctorId'] = $user['doctorId'];
                    $_SESSION['doctorName'] = $user['doctorName'];
                    $_SESSION['doctorRole'] = $user['doctorRole'];
                }

                $delay = 2;  // Delay in seconds before refreshing the page
                header("Refresh: $delay"); // Redirect to the current page after the specified delay
                echo $success_message = "<h3>successfully login</h3>";
                echo "<div class='form_success'>
                         <h3> successfully login </h3><br/>
                     </div>";
                header('location:../../page/homePage.php');
        } else {
            echo $error_message = "<h3>Incorrect Username or password.</h3>";
            echo "<div class='form_error'>
                    <h3>Incorrect Username or password.</h3><br/>
                 </div>";
            header('location:login.php');
            }
    }else{
?>
<!-- HTML Form code here -->
<?php } ?>



<!-- our doctor -->
<?php
    require_once('../config.php');
    require_once BLA.'inc/nav.php';
    require_once BL.'functions/valid.php';
    require_once BL.'functions/db.php';
    // sent data to table reservation in database
    if(isset($_POST['Booking'])){
        echo $name  =  $_POST['name'];
        echo $specialty  =  $_POST['specialty'];
        echo $phone  =  $_POST['phone'];
        echo $date  =   $_POST['date'];
        echo $price  =  $_POST['price'];
        echo $id_doctor  =  $_POST['id_doctor'];
        echo $id_Patient  = $_POST['id_Patient'];
        echo $email_Patient  = $_POST['email_Patient'];

        $query = "INSERT INTO  reservation (reservation_price ,reservation_patient_id , reservation_patient_email , reservation_doctor_date , reservation_doctor_id  ) VALUE ('$price' , '$id_Patient' , '$email_Patient' ,'$date' ,'$id_doctor' )";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class='form_success container'>
                      <h3>successfully booking a doctor</h3><br/>
                  </div>";
        } else {
            echo "<div class='form_error'>
                      <h3>not booking a doctor</h3><br/>
                  </div>";
        }
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/assets/css/ourDoctors.css">
    <style>
        .patientEmail{
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
                        <div class="allDoctors m-2">
                            <form action="" method="POST">
                                <?php
                                    // when login the patient , how the delete error when login the doctor because the session id result id doctor not patient
                                    if(isset($_SESSION['PatientId']) && isset($_SESSION['patient_email']) ){
                                        $patientId = $_SESSION['PatientId'];
                                        $patientEmail = $_SESSION['patient_email'];
                                    }
                                    else{
                                        $patientId = 0;
                                        $patientEmail = "";
                                    }
                                    // show all doctor
                                    $query = "SELECT * FROM doctor";
                                    $result = mysqli_query($conn , $query);
                                    
                                    while($row = mysqli_fetch_array($result)){
                                        echo "
                                            <div class='card' style='width: 18rem;'>
                                                <img src='../admin/dashboard/$row[doctorImage]' class='card-img-top'>
                                                <div class='card-body'>
                                                    <h5 class='card-title' name='name'>$row[doctorName]</h5>
                                                    <p class='card-text' name='specialty' >$row[doctorIsSpecialty]</p>
                                                    <p class='card-text' name='phone' >$row[doctorPhone]</p>
                                                    <p class='card-text' name='date' >$row[doctorDate]</p>
                                                    <p class='card-text' name='price' >$row[doctor_booking_price]</p>
                                                    <input class='patientEmail' type='text' name='email_Patient' value=$patientEmail/>
                                                    <input type='text' name='id_doctor' value=$row[doctorId] style='display:none;'/>
                                                    <input type='text' name='id_Patient' value=$patientId style='display:none;' />
                                                    <a href='#' name='Booking' class='btn btn-primary'>Booking Now</a>
                                                </div>
                                            </div>
                                        ";
                                    }
                                ?>
                            </form>
                         </div>
                         <!-- <a href='reservConfirmation.php? id=$row[doctorId]' name='Booking' class='btn btn-primary'>Booking Now</a>  -->
                         <!-- <a href='../patient/personalPatient.php? id_doctor=$row[doctorId]' name='Booking' class='btn btn-primary'>Booking Now</a> -->
                         <!-- reservation confirmation  -->
                    </div>
                </div>
        </div>
</div>

</body>
</html>
<?php require_once BLA.'inc/footer.php';?>