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
                /* start slider */
                .slider{
                    background-image: url('../imag/gallery/hero-bg.png');
                    background-size: cover;
                    height: 100%;
                    text-align: center;
                }

                .slider .slider-title{
                    color: #0d6efd;
                    font-weight: bold;
                    font-size: 30px;
                };
                .slider .slider-text{
                    font-size: 16px;
                }
                .slider .cart .click a{
                    text-decoration: none;
                    font-size: 20px;
                    font-weight:bold; 
                    color: black
                };
                /* end slider */
            </style>
        </head>
        <body>
            <div class="slider text-center">
                <div class="container">
                    <div class="row d-flex justify-content-center align-items-center text-center">
                        <div class="col-sm-5 col-lg-6">
                            <img
                            class="img_doc pt-7 pt-md-0 img-fluid"
                            src="../imag/gallery/teamDoc3.png"
                            alt="First slide"
                            />
                        </div>
                        <div class="cart col-sm-7 col-lg-6">
                            <h3 class="slider-title">We're determined for your better life.</h3>
                            <p class="slider-text"> There is a big discount Up to 50% discount on your purchase</p>
                            <button class="click">
                                <a href="../admin/admins/contactUs.php">make an appointment</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>
    <!-- department page -->
    <?php include('../doctor/department.php')?>
    <!-- links Medical page -->
    <?php include('../admin/admins/linksMedical.php')?>
    <!-- footer -->
    <?php require_once BLA.'inc/footer.php';?>