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

</style>
</head>
<body>
<div class="ContactUS">
    <div class="textCart">
        <h4>Contact US</h4>
    </div>

    <!-- BookingDates -->
    <div class='bookingDates'>
        <div class='cartItem d-flex justify-content-center gap-2'>
            <div class='parent d-flex justify-content-center gap-2'>
                <i class="fa-solid fa-phone-volume"></i>
                <div class='child'>
                    <h4>{phone}</h4>
                    <p>book an appointment</p>
                </div>
            </div>
            <div class='parent d-flex justify-content-center gap-2'>
                <i class="fa-solid fa-location-dot"></i>
                <div class='child'>
                    <h4>How to find us</h4>
                    <p>ADCB Building - Sharjah</p>
                </div>
            </div>
            <div class='parent d-flex justify-content-center gap-2'>
                <i class="fa-solid fa-clock"></i>
                <div class='child'>
                    <h4>Opening hours</h4>
                    <p>{openingHour}</p> 
                </div>
            </div>
            <div class='parent d-flex justify-content-center gap-2'>
            <i class="fa-solid fa-hospital-user"></i>
                <div class='child'>
                    <h4>Find a doctor</h4>
                    <p>Multi-lingual specialists</p>
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
