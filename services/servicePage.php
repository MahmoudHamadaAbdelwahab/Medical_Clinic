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
        /* start service */
        .service .container {
            display: flex;
            justify-content:center;
            gap:10px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            }
            .textCart{
                background-image: url("../imag/services/header.jpg");
                background-size:cover;
                padding: 20px;
                height: 300px;
            }
            .textCart h4{
                color: aliceblue;
                font-size: 50px;
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: 100px;
            }
            .cartIcon{
                border: 1px solid black;
                padding: 10px;
                width: 400px;
                height : auto;
            }
            .cartIcon img{
                width: 170px;
            }
    </style>
</head>
<body>
         <div class='service mt-2 mb-2'>
            <div class='textCart'>
                <h4>Service</h4>
            </div>
            <div class="container">
                <div class='cartIcon'>
                    <img decoding="async" src="../imag/services/teeth.png"/>
                    <div class="pull-left vc_col-md-12 shop_feature_description_v3">
                        <h3 class="shop_feature_heading_v3"><a href="https://clinika.modeltheme.com/service/teeth-whitening/">Teeth Whitening</a></h3>
                        <p class="shop_feature_subheading_v3">Capitalize on low hanging fruit to identify a ...</p>
                    </div>
                </div>
                <div class='cartIcon'>
                    <img decoding="async" src="../imag/services/spinal-column_2563692.png" alt=""/>
                    <div class="pull-left vc_col-md-12 shop_feature_description_v3">
                        <h3 class="shop_feature_heading_v3"><a href="">Spinal Surgery</a></h3>
                        <p class="shop_feature_subheading_v3">Capitalize on low hanging fruit to identify a...</p>
                    </div>
                </div>
                <div class='cartIcon'>
                    <img decoding="async" src="../imag/services/ray_11505441.png" alt=""/>
                    <div class="pull-left vc_col-md-12 shop_feature_description_v3">
                        <h3 class="shop_feature_heading_v3"><a href="">X-Ray Imagery</a></h3>
                        <p class="shop_feature_subheading_v3">Leverage agile frameworks to provide a robust synopsis  ...</p>
                    </div>
                </div>
                <div class='cartIcon'>
                    <img decoding="async" src="../imag/services/scan_2992104.png" alt=""/>
                    <div class="pull-left vc_col-md-12 shop_feature_description_v3">
                        <h3 class="shop_feature_heading_v3"><a href="">MRI Check-up</a></h3>
                        <p class="shop_feature_subheading_v3">Capitalize on low hanging fruit to identify a ...</p>
                    </div>
                </div>
            </div>
        </div> 

</body>
</html>

<?php require_once BLA.'inc/footer.php';?>
 