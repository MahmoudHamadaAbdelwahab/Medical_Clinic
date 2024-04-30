<?php 
    require_once('../../config.php');
    require_once BLA.'inc/nav.php';
?>
    <link rel="stylesheet" href="../admin/assets/css/service.css">
    <!-- Your HTML content goes here -->
    <div class='about text-center mt-5' >
            <h3>About Us</h3>
        <div class='container'> 
            <div class='row'>
                 <div class='col-lg-7'>
                    <img src="<?php echo BURL.'imag/gallery/health-care.png'?>" class="img-fluid mb-2"/>
                </div>
                <div class='text col-lg-5 mt-2'>
                    <h3 class='text'>We are developing a healthcare system around you</h3>
                    <p class='text-black'>
                        We think that everyone should have easy access to excellent
                        healthcare. Our aim is to make the procedure as simple as
                        possible for our patients and to offer treatment no matter
                        where they are — in person or at their convenience.
                    </p>
                    <button>learn more</button>
                </div>
            </div>
        </div>
    </div>

<?php
    require_once BLA.'inc/footer.php';
?>
