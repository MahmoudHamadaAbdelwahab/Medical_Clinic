<?php 
    require_once('../../config.php');
    require_once BLA.'inc/nav.php';
?>
    <!-- <link rel="stylesheet" href="../admin/assets/css/about.css"> -->
    <!-- Your HTML content goes here -->

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/aboutUs.css">
    </head>
    <body>

    <div class='about' >
        <div class="textCart">
            <h4>About Us</h4>
        </div>
        <div class='container mt-2'> 
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

    </body>
    </html>

 <?php require_once BLA.'inc/footer.php';?>
