<?php
    require_once('../config.php');
    require_once BLA.'inc/nav.php';
    require_once BL.'functions/valid.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* start service */
        .service .container{
                margin: 10px;
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
                gap: 15px;
            }
            .service .textCart{
                background-image: url("../imag/services/header.jpg");
                background-size:cover;
                padding: 20px;
                height: 300px;
            }
            .service .textCart h4{
                color: aliceblue;
                font-size: 50px;
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: 100px;
            }
            .service .cartIcon{
                border: 1px solid black;
                padding: 10px;
                width: 400px;
                height : auto;
            }
            .service .cartIcon img{
                width: 170px;
            }
            .service .card .card-title a{
                text-decoration: none;
                font-size: 18px;
                font-weight: bold;
            }
    </style>
</head>
<body>
        <div class='service mt-2 mb-2'>
            <div class='textCart'>
                <h4>Service</h4>
            </div>
            <div class="container text-center">

                <div class="card" style="width: 18rem;">
                    <img src="../imag/services/teeth.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a href="#">Teeth Whitening</a></h5>
                        <p class="card-text">Capitalize on low hanging fruit to identify a ...</p>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <img src="../imag/services/spinal-column_2563692.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a href="#">Spinal Surgery</a></h5>
                        <p class="card-text">Capitalize on low hanging fruit to identify a...</p>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <img src="../imag/services/ray_11505441.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a href="#">X-Ray Imagery</a></h5>
                        <p class="card-text">Leverage agile frameworks to provide a robust synopsis  ...</p>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <img  src="../imag/services/scan_2992104.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a href="#">MRI Check-up</a></h5>
                        <p class="card-text">Capitalize on low hanging fruit to identify a ...</p>
                    </div>
                </div>
            </div>
        </div> 
</body>
</html>

<?php require_once BLA.'inc/footer.php';?>
 