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
        <link rel="stylesheet" href="../admin/assets/css/homePage.css">
        <style>
            .container{
                text-align: center;
            }
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

            /* start department */
             .department{
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
                gap: 15px;
            }
            /* end department */

            /* start all doctor */
            .allDoctors{
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
            }
            .allDoctors .card img{
            width: 100%;
            height: 200px;
            padding: 10px;
            }
            /* end all doctor */
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
                        <p class="slider-text">There is a huge discount of up to 50% off bookings</p>
                        <button class="click">
                            <a href="../admin/admins/contactUs.php">Get in Touch</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
                <!-- start department page -->
                    <h1>Department</h1>
                    <div class="allDoctors">
                        <?php
                            require_once BL.'functions/db.php';
                            require_once BL.'functions/messages.php';
                            require_once BL.'functions/valid.php';
                            $query = "SELECT * FROM department";
                            $result = mysqli_query($conn , $query);
                            while($row = mysqli_fetch_array($result)){
                                echo "<div class='justify-content-center col-sm-2 col-md-2 col-lg-2'>";
                                echo "<img src='../admin/dashboard/$row[depart_image]') style='width:70px'/>";
                                echo"<h5><a href='doctors.php?department_id=" . $row['depart_id'] . "' style='text-decoration:none;'>" . $row['depart_name'] . "</a> </h5>";
                                echo "</div>";
                            }
                        ?>
                    </div>
                <!-- end department page -->

                <!-- start show all doctor -->
                <div>
                    <!-- Doctors page -->
                    <h1>Doctors</h1>
                    <div class="allDoctors text-center">
                        <?php
                            require_once BL.'functions/db.php';
                            require_once BL.'functions/messages.php';
                            require_once BL.'functions/valid.php';
                            $query = "SELECT * FROM doctor";
                            $result = mysqli_query($conn , $query);
                            while($row = mysqli_fetch_array($result)){
                                // show the department name
                                $depart_Id = $row['depart_id'];
                                $query_depart = "SELECT * FROM department WHERE depart_id = '$depart_Id'";
                                $result_depart = mysqli_query($conn , $query_depart);
                                $row_depart = mysqli_fetch_array($result_depart);

                                echo "
                                <div>
                                    <div class='card' style='width: 18rem;'>
                                        <img src='../admin/dashboard/$row[doctorImage]' class='card-img-top'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$row[doctorName]</h5>
                                            <p class='card-text'>$row_depart[depart_name]</p>
                                            <p class='card-text'>$row[doctorPhone]</p>
                                            <p class='card-text'>$row[doctorDate]</p>
                                            <p class='card-text'>$row[doctor_booking_price]</p>
                                        </div>
                                    </div>
                                </div>
                                ";
                            }
                        ?>
                        </div>
                </div>
                <!-- end show all doctor -->

                <!-- start last post -->
                <div>
                    <!-- last post -->
                    <h1>last post</h1>
                    <div class="allDoctors">
                        <?php
                            require_once BL.'functions/db.php';
                            require_once BL.'functions/messages.php';
                            require_once BL.'functions/valid.php';
                            $query = "SELECT * FROM lastpost";
                            $result = mysqli_query($conn , $query);
                            while($row = mysqli_fetch_array($result)){
                                $image_path = $row['lastPost_Image'];
                                $About = mb_strimwidth($row['lastPost_About'], 0, 25 , "...");
                                $writeHere = mb_strimwidth($row['lastPost_writeHere'], 0, 70, "...");
                                
                                // Call the doctor to have his name appear
                                $doctor_id = $row['doctor_Id'];
                                $query_doc = "SELECT * FROM doctor WHERE doctorId = '$doctor_id'";
                                $result_doc = mysqli_query($conn,$query_doc);
                                $row_doc = mysqli_fetch_array($result_doc);

                                // Show the department of the doctor
                                $depart_id = $row_doc['depart_id'];
                                $query_depart = "SELECT * FROM department WHERE depart_id = '$depart_id'";
                                $result_depart = mysqli_query($conn,$query_depart);
                                $row_depart = mysqli_fetch_array($result_depart);
                                
                                echo "
                                <div>
                                    <div class='card' style='width: 18rem;'>
                                        <img src='../doctor/$image_path' class='card-img-top'>
                                        <div class='d-flex justify-content-around'>
                                            <p class='card-title'> $row_doc[doctorName]</p>    
                                            <p class='card-title'> $row_depart[depart_name]</p>  
                                        </div>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$About</h5>
                                            <p class='card-text'>$writeHere</p>
                                        </div>
                                    </div>
                                </div>
                                ";
                            }
                        ?>
                        </div>
                </div>
                <!-- ent last post -->

                <!-- start links Medical page -->
                <!-- <h1>Links</h1> -->
                <?php //include('../admin/admins/linksMedical.php')?>
                <!-- end links Medical page -->

                <!-- start Customer opinion -->
                <h1>Customer opinion</h1>  
                <!--  end Customer opinion   -->

                <!-- start map  -->
                <h1>The location</h1>  
                <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13813.242694188517!2d31.340407351171343!3d30.05662807107523!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583e5d94c66301%3A0xddddf100de42206c!2z2YXYr9mK2YbZhyDZhti12LHYjCDYp9mE2YXZhti32YLYqSDYp9mE2KPZiNmE2YnYjCDZhdiv2YrZhtipINmG2LXYsdiMINmF2K3Yp9mB2LjYqSDYp9mE2YLYp9mH2LHYqeKArCA0NDUwMTEz!5e0!3m2!1sar!2seg!4v1717591853676!5m2!1sar!2seg" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
                <!-- end map  -->
        </div>
    </body>
</html>

<!-- footer -->
<?php require_once BLA.'inc/footer.php';?>
