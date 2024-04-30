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
    <style>
      /* start navbar */
      .navbar ul{
          list-style-type:none;
          display: flex;
          justify-content: center;
          gap: 10px;
      }
      /* end navbar */
    </style>
</head>
<body>
  <?php
      $conn = mysqli_connect('localhost','root','','medical_clinic');
      if(!$conn){
          dir('Error' . mysqli_connect_error());
      }

    $sql = "SELECT * FROM patient";
    $query = mysqli_query($conn , $sql);
    $result = mysqli_fetch_assoc($query);

  ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo BURL_PAGE.'homePage.php';?>">Medical Clinic</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
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
                    <a class="nav-link" href="<?php echo BURL.'blogPost/blogPostPage.php';?>">Recent BlogPost</a>
                </li>
                <!-- <li class=" dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Select Here</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo BURLA.'admins/aboutUs.php';?>">About Us</a></li>
                        <li><a class="dropdown-item" href="<?php echo BURLA.'admins/contactUs.php';?>">Contact Us</a></li>
                    </ul>
                </li> -->
                <select>
                  <option>Select Here</option>
                  <option>
                     <a class="dropdown-item" href="<?php echo BURLA.'admins/aboutUs.php';?>">About Us</a>
                  </option>
                  <option>
                     <a class="dropdown-item" href="<?php echo BURLA.'admins/contactUs.php';?>">Contact Us</a>
                  </option>
                </select>
            </ul>
            <?php if ($result): ?>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $result["patient_name"]; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownUser">
                            <li><a class="dropdown-item" href="../../patient/personalPatient.php">Personal Patient</a></li>
                            <li><a class="dropdown-item" href="../authentication/logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            <?php else: ?>
                <a class="btn btn-primary ms-lg-3" href="../authentication/login.php">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
              
    <!-- start footer -->

    <div class="container-fluid mt-5 mb-5">
    <div class="row">

