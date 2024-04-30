    <?php
        require_once('../config.php');
        require_once BLA.'inc/nav.php';
        require_once BL.'functions/valid.php';
    ?>

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
    <link rel="stylesheet" href="../admin/assets/css/ourDoctors.css">
  <!-- start style payment  -->
  <style>
        .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        justify-content: center;
        align-items: center;
        }
        .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        }
  </style>
    <!-- end style payment -->
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
                    <div class='SpecialDoc col-sm-9 col-md-9 col-lg-9'>
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
                                            echo "<div class='card'>";
                                            echo '<img src="data:image/jpe/g;base64,'.base64_encode($row['doctorImage']) . '" />';
                                            echo "<h4>{$row['doctorName']}</h4>";
                                            echo "<p>Specialty: {$row['doctorIsSpecialty']}</p>";
                                            echo "<p>Date: {$row['doctorDate']}</p>";
                                            echo "<p>Phone: {$row['doctorPhone']}</p>";
                                            echo "<p>Booking price : {$row['doctorSallary']}</p>";
                                            // Button to open the payment popup
                                            echo '<button onclick="showPaymentPopup()">Booking</button>'; // Booking button
                                            echo "</div>";

;                                             // Payment Popup 
                                            echo'<div id="paymentModal" class="modal">';
                                              echo'<div class="modal-content">';
                                                // Payment form 
                                                echo'<form action="process_payment.php" method="POST">';
                                                  echo'<label for="name">Name:</label>';
                                                  echo'<input type="text" id="name" name="name" required><br><br>';
                                                  echo'<label for="email">Email:</label>';
                                                  echo'<input type="email" id="email" name="email" required><br><br>';
                                                  echo'<label for="cardNumber">Card Number:</label>';
                                                  echo'<input type="text" id="cardNumber" name="cardNumber" required><br><br>';
                                                  echo'<label for="expiry">Expiry Date:</label>';
                                                  echo'<input type="text" id="expiry" name="expiry" placeholder="MM/YY" required><br><br>';
                                                  echo'<label for="cvv">CVV:</label>';
                                                  echo'<input type="text" id="cvv" name="cvv" required><br><br>';
                                                  echo'<button type="submit">Pay Now</button>';
                                                echo'</form>';
                                                // Close button for the popup 
                                                echo'<button onclick="hidePaymentPopup()">Close</button>';
                                             echo'</div>';
                                           echo'</div>';
                                        }
                                    } catch (PDOException $e) {
                                        echo "Error: " . $e->getMessage();
                                    }
                                ?>
                                 <!-- ent this code chat gpt  -->
                        </div>
                    </div>
                    <div class='col-sm-3 col-md-3 col-lg-3'>
                         <?php 
                        include('./SpecialtyDoctors.php');
                        ?> 
                    </div>
                </div>
        </div>
</div>


  <!-- JavaScript for showing/hiding the payment popup -->
  <script>
    function showPaymentPopup() {
      var modal = document.getElementById('paymentModal');
      modal.style.display = 'flex';
    }

    function hidePaymentPopup() {
      var modal = document.getElementById('paymentModal');
      modal.style.display = 'none';
    }
  </script>
    </script>

</body>
</html>












<?php require_once BLA.'inc/footer.php';?>

