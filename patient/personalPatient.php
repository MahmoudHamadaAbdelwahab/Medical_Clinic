<?php
    require_once('../config.php');
    require_once BLA.'inc/nav.php';
    require_once BL.'functions/valid.php';
    require_once BL.'functions/db.php';

    $patient = isset($_SESSION['patient_name']) && ($_SESSION['patient_role'] == 'patient'
    || $_SESSION['patient_role'] == '') ? $_SESSION['patient_name'] : null;

    if(isset($_POST['Booking'])){
        $id = $_GET['id'];
        // echo $name  =  $_POST['name'];
        // echo $specialty  =  $_POST['specialty'];
        // echo $phone  =  $_POST['phone'];
        // echo $date  =   $_POST['date'];
        // echo $price  =  $_POST['price'];
        // echo $id_doctor  =  $_POST['id_doctor'];
        // echo $id_Patient  = $_POST['id_Patient'];
        // echo $email_Patient  = $_POST['email_Patient'];
  
        // $query = "INSERT INTO  reservation (reservation_price ,reservation_patient_id , reservation_patient_email , reservation_doctor_date , reservation_doctor  ) VALUE ('$price' , '$id_Patient' , '$email_Patient' ,'$date' ,'$id_doctor' )";
        // $result   = mysqli_query($conn, $query);
        // if ($result) {
        //     echo "<div class='form_success container'>
        //               <h3>successfully booking a doctor</h3><br/>
        //           </div>";
        // } else {
        //     echo "<div class='form_error'>
        //               <h3>not booking a doctor</h3><br/>
        //           </div>";
        // }
        echo "<div class='form_success container'>
        <h3>successfully booking a doctor</h3><br/>
        </div>";
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- while loop -->
    <div class="container text-center">
        <div class="col-sm-12">
            <?php if(isset($_SESSION['patient_name'])): ?>
                 <h3 class="p-3 bg-primary text-white">
                    Welcome <?php echo $_SESSION['patient_name']; ?> , reservation
                </h3>
                <?php
                if(isset($_POST['Booking']) && isset($_GET['id'])){
                    $id_doctor = $_GET['id'];
                    $id_Patient = $_GET['id_Patient'];
                    $update = mysqli_query($conn , "SELECT * FROM reservation WHERE doctorId = $id_doctor AND ");
                    while($data = mysqli_fetch_array($update)){
                        echo "
                        <table class='table table-dark table-bordered'>
                            <thead>
                                <tr class'text-center'>
                                    <td scope='col'>doctor name</td>
                                    <td scope='col'>doctor is specialty</td>
                                    <td scope='col'>doctor phone</td>
                                    <td scope='col'>reservation date</td>
                                    <td scope='col'>reservation price</td>
                                    <td scope='col'>action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class='text-center'>
                                    <td scope='row'> {$data['doctorName']}</td>
                                    <td scope='row'> {$data['doctorIsSpecialty']}</td>
                                    <td class='text-center'>{$data['doctorPhone']}</td>
                                    <td class='text-center'>{$data['doctorDate']}</td>
                                    <td class='text-center'>{$data['doctor_booking_price']}</td>
                                    <td class='text-center'>
                                        <a href='#' class='btn btn-danger '>Cancel</a>
                                        <a href='#' class='btn  btn-info delete' data-field='city_i' data_id='{$row['city_id']}' data-table='city'>Booking Now</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>"; 
                    }
                }
                ?>
            <?php else: ?> 
                <h3>not found any patient</h3>
            <?php endif?>
        </div>
    </div>
</body>
</html>

<?php require_once BLA.'inc/footer.php';?>