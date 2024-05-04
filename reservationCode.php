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