<?php
    require_once('../../config.php');
    require_once BL.'functions/db.php';
    require_once BL.'functions/messages.php';
    require_once BL.'functions/valid.php';
    require_once BLA.'inc/nav.php';

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['Name']);
        $phone = mysqli_real_escape_string($conn, $_POST['Phone']);
        $address = mysqli_real_escape_string($conn, $_POST['Address']);
        $message = mysqli_real_escape_string($conn, $_POST['Message']);
        $rate = intval($_POST['rating']); // Ensuring rating is an integer
        // insert data to database
        $query = "INSERT INTO opinion (name, phone, address , message , rating) VALUES ('$name', '$phone', '$address' , '$message' , '$rate')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class='form_success container'>
                  <h3>You are opinion successfully.</h3><br/>
                  </div>";
        } else {
            echo "<div class='form_error'>
                  <h3>Required fields are missing.</h3><br/>
                  </div>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/appointment.css">
    <style>
        .star{
            font-size: 2em;
            cursor: pointer;
            color: gray;
        }
        .star.selected {
            color: gold;
        }
    </style>
</head>
<body>

<div class='appointment text-center container py-8 mt-5'>
        <h1>Your opinion about the services</h1> 
        <div class='container'>
            <div class='appointCart row'>
                <div class='col-md-8 col-lg-6'>
                    <img src="../../imag/gallery/appointment.png" class="img-fluid"/>
                </div>
                <div class='col-md-4 col-lg-6 z-index-2 mt-5'>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class='row g-3'>
                            <input class='col-md-4' type='text' name="Name" placeholder='Name'/>
                            <input class='col-md-4' type='number' name="Phone" placeholder='Phone' />
                            <input class='col-md-4' type='text' name="Address" placeholder='Address'/>
                            <textarea name="Message" placeholder='Message'></textarea>
                            <div id="rating">
                                <span class="star" data-value="1">&#9733;</span>
                                <span class="star" data-value="2">&#9733;</span>
                                <span class="star" data-value="3">&#9733;</span>
                                <span class="star" data-value="4">&#9733;</span>
                                <span class="star" data-value="5">&#9733;</span>
                                <input type="hidden" name="rating" id="rating-input" required>
                            </div>
                            <button class="btn btn-outline-secondary rounded-pill col-md-12" type="submit" name="submit" fdprocessedid="2znbuu">Send</button>
                    </form>
                </div>
                <ToastContainer/>
            </div>
        </div>
    </div>
    <!-- javascript -->
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const stars = document.querySelectorAll('.star');
            const ratingInput = document.getElementById('rating-input');
            stars.forEach(star => {
                star.addEventListener('click', rateStar);
            });

            function rateStar(event) {
                const selectedStar = event.target;
                const rating = selectedStar.getAttribute('data-value');
                
                stars.forEach(star => {
                    star.classList.remove('selected');
                });

                for (let i = 0; i < rating; i++) {
                    stars[i].classList.add('selected');
                }

                ratingInput.value = rating;
            }
        });
    </script>
</body>
</html>

