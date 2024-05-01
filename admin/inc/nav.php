<?php
      $conn = mysqli_connect('localhost','root','','medical_clinic');
      if(!$conn){
          dir('Error' . mysqli_connect_error());
      }

    $sql = "SELECT * FROM patient";
    $query = mysqli_query($conn , $sql);
    $result = mysqli_fetch_assoc($query);
  ?>
    <!-- Differentiating between a patient and a doctor during login is typically handled by the roles or types associated with the user account -->
    <?php
    // Assume $username and $password are obtained from the login form

    // Perform authentication and retrieve user data from the database
    // $query = "SELECT patient_name, role FROM patient WHERE patient_name = ? AND patient_password = ?";
     // Execute the query and fetch user data

    // if ($user_data) {
    //     session_start();
    //     $_SESSION['patient_name'] = $user_data['patient_name'];
    //     $_SESSION['patient_role'] = $user_data['patient_role'];

         // Redirect to appropriate page after login
    //     if ($user_data['patient_role'] === '') {
           
            
    //     } elseif ($user_data['patient_role'] === 'doctor') {
            
            
    //     }
    // } else {
         // Handle login failure
    // }

    // session_start();
    // if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
    //     $username = $_SESSION['username'];
    //     $role = $_SESSION['role'];

    //     // Display different navbar items based on user role
    //     if ($role === 'patient') {
    //         // Display patient-specific navbar items
    //         echo '<a class="nav-link" href="patient_profile.php">My Profile</a>';
    //         echo '<a class="nav-link" href="appointments.php">Appointments</a>';
    //     } elseif ($role === 'doctor') {
    //         // Display doctor-specific navbar items
    //         echo '<a class="nav-link" href="doctor_profile.php">My Profile</a>';
    //         echo '<a class="nav-link" href="patients_list.php">Patients</a>';
    //     }
    // }
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
    <style>
      /* start navbar */
      /* .navbar{
        background-color: #0d6efd;
        color: black;
      } */
      /* end navbar */
    </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg sticky-top" style="background-color:white;">
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
                    <li class="nav-item dropdown dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Select Here</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo BURLA.'admins/aboutUs.php';?>">About Us</a></li>
                            <li><a class="dropdown-item" href="<?php echo BURLA.'admins/contactUs.php';?>">Contact Us</a></li>
                        </ul>
                    </li>
            </ul>

             <?php if ($result): ?>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $result["patient_name"]; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownUser">
                            <li><a class="dropdown-item" href="<?php echo BURL.'patient/personalPatient.php';?>">Personal Patient</a></li>
                            <li><a class="dropdown-item" href="<?php echo BURLA.'authentication/logout.php';?>">Logout</a></li>
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

