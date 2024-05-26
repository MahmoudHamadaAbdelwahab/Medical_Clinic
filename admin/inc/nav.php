<?php
// Set $patient and $doctor variables based on session data
$patient = isset($_SESSION['patient_name']) && ($_SESSION['patient_role'] == 'patient' 
|| $_SESSION['patient_role'] == '') ? $_SESSION['patient_name'] : null;
// $doctor = isset($_SESSION['patient_name']) && $_SESSION['patient_role'] == 'doctor' ? $_SESSION['patient_name'] : null;
$doctor = isset($_SESSION['doctorName']) && $_SESSION['doctorRole'] == 'doctor' ? $_SESSION['doctorName'] : null;
$admin = isset($_SESSION['patient_name']) && $_SESSION['patient_role'] == 'admin' ? $_SESSION['patient_name'] : null;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--  bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Medical Clinic</title>

</head>
<body>
  <nav class="navbar navbar-expand-lg sticky-top" style="background-color:#fff;">
    <div class="container">
        <a class="navbar-brand" href="<?php echo BURL_PAGE.'homePage.php';?>">Medical Clinic</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="fas fa-navicon" style="color:#0d6efd; font-size:28px;"></i>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BURL_PAGE.'homePage.php';?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BURL.'services/servicePage.php';?>">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BURL.'doctor/OurDoctors.php';?>">Find A Doctor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BURL.'doctor/lastPostPage.php';?>">Last Post</a>
                </li>
                    <li class="nav-item dropdown dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Select Here</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo BURLA.'admins/aboutUs.php';?>">About Us</a></li>
                            <li><a class="dropdown-item" href="<?php echo BURLA.'admins/contactUs.php';?>">Contact Us</a></li>
                        </ul>
                    </li>
            </ul>
            <?php if ($patient): ?> 
                <!-- patient -->
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $patient; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownUser">
                            <li><a class="dropdown-item" href="<?php echo BURL.'patient/personalPatient.php';?>">Personal patient</a></li>
                            <li><a class="dropdown-item" href="<?php echo BURLA.'authentication/logout.php';?>">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            <?php elseif($doctor): ?>
                 <!-- doctor -->
                  <ul class="navbar-nav"> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $doctor; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownUser">
                            <li><a class="dropdown-item" href="<?php echo BURL.'doctor/personalDoctor.php';?>">Personal doctor</a></li>
                            <li><a class="dropdown-item" href="<?php echo BURLA.'authentication/logout.php';?>">Logout</a></li>
                        </ul>
                    </li>
                </ul> 
            <!-- admin dashboard -->
            <?php elseif($admin): ?>
                  <ul class="navbar-nav"> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $admin; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownUser">
                            <li><a class="dropdown-item" href="<?php echo BURLA.'dashboard/dashboard.php';?>">Dashboard Admin</a></li>
                            <li><a class="dropdown-item" href="<?php echo BURLA.'authentication/logout.php';?>">Logout</a></li>
                        </ul>
                    </li>
                </ul> 
            <?php else: ?> 
                <a class="btn btn-primary ms-lg-3" href="<?php echo BURLA.'authentication/login.php';?>">Login</a>
            </div>
            <?php endif?>
    </div>
</nav>
              
    <!-- start footer -->
    <div class="container-fluid mt-5 mb-5 sticky-button">
    <div class="row">