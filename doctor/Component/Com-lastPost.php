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
                            while ($row = mysqli_fetch_array($result)){
                                $image_path = $row['lastPost_Image'];
                                $date = $row['lastPost_date'];
                                $About = mb_strimwidth($row['lastPost_About'], 0, 25 , "...");
                                $writeHere = mb_strimwidth($row['lastPost_writeHere'], 0, 70, "...");
                                $lastPost_id = $row['lastPost_Id'];
                                // Call the doctor to have his name appear
                                $doctor_id = $row['doctor_Id'];
                                $query_doc = "SELECT * FROM doctor WHERE doctorId = '$doctor_id'";
                                $result_doc = mysqli_query($conn,$query_doc);
                                $row_doc = mysqli_fetch_array($result_doc);

                                // Show the department of the doctor
                                $depart_id = $row_doc['depart_id'];
                                $query_depart = "SELECT * FROM department WHERE depart_id = '$depart_id'";
                                $result_depart = mysqli_query($conn,$query_depart);
                                $row_depart = mysqli_fetch_array($result_depart);

                                echo "
                                <div class='card text-center' style='width: 20rem;'>
                                    <img src='$image_path' alt='Image' width='100%' height='200'><br>
                                    <div class='d-flex justify-content-around'>
                                        <p class='card-title'> $row_doc[doctorName]</p>    
                                        <p class='card-title'> $row_depart[depart_name]</p>  
                                    </div>
                                    <div class='d-flex justify-content-center gap-3'>
                                        <i class='fa-solid fa-calendar-days mt-1'></i>
                                        <p class='card-title'>$date</p>    
                                    </div>
                                    <div class='text'>
                                        <h5 class='card-title'>$About</h5>    
                                        <p class='card-text'>$writeHere</p>    
                                        <a href='../doctor/Component/readMore.php? Read_id=$lastPost_id' class='btn btn-primary'>Read more</a>
                                    </div>
                                </div>
                                ";
                            }
                        ?>
                    </div>
                </div>
            </div>
</body>
</html>