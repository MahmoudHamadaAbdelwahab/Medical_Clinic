<?php
require_once('../config.php');
require_once BLA.'inc/nav.php';
require_once BL.'functions/valid.php';

// Fetch opinions from the database
$sql = "SELECT name, phone, address, message, rating FROM opinion";
$result = mysqli_query($conn, $sql);

$opinions = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $opinions[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/appointment.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css"/>
    <style>
        .star {
            font-size: 2em;
            cursor: pointer;
            color: gray;
        }
        .star.selected {
            color: gold;
        }
        .slider {
            width: 400px;
            margin: 20px auto;
        }
        .slide {
            border: 1px solid black;
            padding: 10px;
            background-color: #d1d1d1;
        }
        .stars {
            margin-block: -7px;
            font-size: 1.5em;
        }
    </style>
</head>
<body>
<div class="slider" id="opinions-slider">
    <?php foreach ($opinions as $opinion): ?>
        <div class="slide">
            <div class="d-flex justify-content-center gap-5">
                <h6><?php echo htmlspecialchars($opinion['name']); ?></h6>
                <div class="stars mb-2">
                    <?php
                    for ($i = 0; $i < 5; $i++) {
                        echo $i < $opinion['rating'] ? '★' : '☆';
                    }
                    ?>
                </div>
            </div>
            <div class="d-flex justify-content-center gap-5">
                <p><?php echo htmlspecialchars($opinion['address']); ?></p>
                <p><?php echo htmlspecialchars($opinion['phone']); ?></p>
            </div>
                <p><?php echo htmlspecialchars($opinion['message']); ?></p>
        </div>
    <?php endforeach; ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>

<script>
    $(document).ready(function() {
        $('#opinions-slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true
        });
    });
</script>
</body>
</html>
