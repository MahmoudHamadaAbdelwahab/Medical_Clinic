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