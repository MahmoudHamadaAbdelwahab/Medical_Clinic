<?php 
    require_once('../../config.php');
    require_once BLA.'inc/nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/countactUS.css">
    <style>
    .cartItem{
        margin: 10px;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 15px;
        text-align: center;
    }
    </style>
</style>
</head>
<body>
<div class="ContactUS">
    <div class="textCart">
        <h4>Contact US</h4>
    </div>

    <!-- BookingDates -->
    <div class='bookingDates'>
        <div class='cartItem'>

            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header d-flex justify-content-around gap-2">
                    <i class="fa-solid fa-phone-volume m-1"></i>
                    <h5 class="card-title">phone</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">book an appointment</p>
                </div>
            </div>


            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header d-flex justify-content-around gap-2">
                    <i class="fa-solid fa-location-dot m-1"></i>
                    <h5 class="card-title">How to find us</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">ADCB Building - Sharjah</p>
                </div>
            </div>

            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header d-flex justify-content-around gap-2">
                    <i class="fa-solid fa-clock m-1"></i>
                    <h5 class="card-title">Opening hours</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">openingHour</p>
                </div>
            </div>

            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header d-flex justify-content-around gap-2">
                    <i class="fa-solid fa-hospital-user m-1"></i>
                    <h5 class="card-title">Find a doctor</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Multi-lingual specialists</p>
                </div>
            </div>
        </div>
    </div>

    <!-- appointment -->
    <?php include('./appointment.php');?>

</div>
    </body>
</html>

<?php require_once BLA.'inc/footer.php'; ?>
