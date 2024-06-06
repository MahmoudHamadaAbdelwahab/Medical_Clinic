<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .LiveDoc{
        background-image: url('../../imag/gallery/about-bg.png');
        background-size: cover;
        cursor:pointer;
    }
    .LiveDoc h3{
        color:#0d6efd;
    }
    .LiveDoc .LiveDocCart{
        display: flex;
        flex-direction: column;
    }
    .LiveDoc .LiveDocCart h5{
        font-size: 16px;
    }
    </style>
</head>
<body>
<div class='LiveDoc text-center mt-3'>
        <div class='container'>
            <div class='row d-flex justify-content-around text-center p-5'>
                <div class='col-sm-3 col-md-5 col-lg-3 text-md-start '>
                    <h3>liveDoc</h3>
                    <h5>The world's most trusted telehealth company</h5>
                </div>
                <div class='d-flex justify-content-around gap-2 flex-wrap col-sm-9 col-md-8 col-lg-9'>
                    <div class='LiveDocCart col-sm-3 col-md-3 col-lg-3'>
                        <h3>Departments</h3>
                        <!-- <div>
                            <h5>Eye care</h5>
                            <h5>Cardiac are</h5>
                            <h5>Heart care</h5>
                        </div> -->
                        <?php
                            require_once BL.'functions/db.php';
                            require_once BL.'functions/messages.php';
                            require_once BL.'functions/valid.php';
                            $query = "SELECT * FROM department";
                            $result = mysqli_query($conn , $query);
                            while($row = mysqli_fetch_array($result)){
                                echo "<div class='justify-content-center col-sm-2 col-md-2 col-lg-2'>";
                                    echo"<h5><a href='../../page/doctors.php?department_id=" . $row['depart_id'] . "' style='text-decoration:none;'>" . $row['depart_name'] . "</a> </h5>";
                                echo "</div>";
                            }
                        ?>
                    </div>
                    <div class='LiveDocCart col-sm-3 col-md-3 col-lg-3'>
                        <h3>Membership</h3>
                        <div>
                            <h5>Free trial</h5>
                            <h5>Silver</h5>
                            <h5>Premium</h5>
                        </div>
                    </div>
                    <div class='LiveDocCart col-sm-3 col-md-3 col-lg-3'>
                        <h3>Customer Care</h3>
                        <div>
                            <h5>About Us</h5>
                            <h5>Contact US</h5>
                            <h5>Get Update</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>