    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?php require_once(BURL_PAGE.'homepage.php');?>">Medical Clinic</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main" aria-controls="main" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
              <a class="nav-link active p-lg-3" aria-current="page" href="<?php require_once(BURL_PAGE.'homepage.php');?>">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active p-lg-3" aria-current="page" href="<?php ?>">Services</a>
          </li>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Cities
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li>
                  <a class="dropdown-item" href="
                  <!-- error -->
                  <?php echo BURL.'cities/addCities.php'?>
                  ">Add</a>
                  </li>
                  <li>
                  <a class="dropdown-item" href="
                  <!-- error -->
                    <?php echo BURL.'cities/viewAllCities.php'?> 
                  ">View All</a>
                  </li>
                </ul>
            </div>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Admin
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <!-- error  -->
                <li><a class="dropdown-item" href="<?php echo BURL.'admins/add.php'; ?>">Add</a></li>
                <li><a class="dropdown-item" href="#">View All</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="
                <!-- error -->
                <?php echo BURL.'logout.php';?>
              ">logout</a>
            </li>

          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav> 
<!-- php navbar show the username  -->

<?php
            if ($result) {
                echo('
                <li class="nav-item dropdown" style="margin-top: 7px;">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php $result["patient_name"];?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="../../patient/personalPatient.php">personal patient</a></li>
                  <li><a class="dropdown-item" href="#">logout</a></li>
                </ul>
              </li>
                ');
            } else {
                // Display a login button if $result is not available
                echo '<a class="btn btn-primary p-1" href="../authentication/login.php">';
                echo '<p style="color:white;">Login</p>';
                echo '</a>';
            }
            ?>