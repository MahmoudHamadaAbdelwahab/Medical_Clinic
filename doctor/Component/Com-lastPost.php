<?php
    require_once('../config.php');
    require_once BL.'functions/valid.php';
    require_once BL.'functions/db.php';
    $result = mysqli_query($conn, "SELECT * FROM lastpost");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class='container'>
                <div class='row align-items-center col-sm-12 col-md-12 col-lg-12 '>
                    <div class='d-flex gap-4 flex-wrap mt-2 my-2'>
                        <?php
                            if ($rows = mysqli_fetch_assoc($result) > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    $image_path = $row['lastPost_Image'];
                                    $About = mb_strimwidth($row['lastPost_About'], 0, 25 , "...");
                                    // $writeHere = $row['lastPost_writeHere'];
                                    $writeHere = mb_strimwidth($row['lastPost_writeHere'], 0, 70, "...");
                                    echo "
                                    <div class='card text-center' style='width: 18rem;'>
                                            <img src='../imag/gallery/$image_path' alt='Image' width='100%' height='200'><br>
                                        <div class='text'>
                                            <h5 class='card-title'>$About</h5>    
                                            <p class='card-text'>$writeHere</p>    
                                            <a href='#' class='btn btn-primary'>Read more</a>
                                        </div>
                                    </div>
                                    ";
                                }
                            } else {
                                echo "No last post found.";
                            }
                        ?>
                    </div>
                </div>
            </div>
</body>
</html>