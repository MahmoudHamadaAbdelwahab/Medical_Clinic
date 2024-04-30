<?php
    require_once('../config.php');
    require_once BL.'functions/valid.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
    <body>
        <div class='specialtyDoc'>
            <ul>
                <li class="nav-item dropdown" style="margin-top: 7px;">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Specialty Doctors
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?php include('specialtyDoc/specialtyCardiacCar.php');?>">Cardiac Care</a></li>
                    <li><a class="dropdown-item" href="<?php echo BURL.'admins/aboutUs.php';?>">Ent</a></li>
                    <li><a class="dropdown-item" href="<?php echo BURL.'admins/contactUs.php';?>">Eye</a></li>
                    <li><a class="dropdown-item" href="<?php echo BURL.'admins/aboutUs.php';?>">Heart Care</a></li>
                    <li><a class="dropdown-item" href="<?php echo BURL.'admins/aboutUs.php';?>">Neurology</a></li>
                    <li><a class="dropdown-item" href="<?php echo BURL.'admins/contactUs.php';?>">Osteoporosis</a></li>
                </ul>
                </li>
            </ul>
        </div>
    </body>
    </html>
