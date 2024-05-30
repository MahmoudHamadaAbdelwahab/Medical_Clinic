<?php
    require_once('../config.php');
    require_once BLA.'inc/nav.php';
    require_once BL.'functions/valid.php';
    require_once BL.'functions/db.php';

    $patient = isset($_SESSION['patient_name']) && ($_SESSION['patient_role'] == 'patient'
    || $_SESSION['patient_role'] == '') ? $_SESSION['patient_name'] : null;

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
    
                <table class="table table-dark table-bordered">
                    <thead>
                        <tr class="text-center">
                            <td scope="col">doctor name</td>
                            <td scope="col">doctor specialty</td>
                            <td scope="col">price</td>
                            <td scope="col">reservation date</td>
                            <td scope="col">cancel reservation</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $patient_id = $_SESSION['PatientId'];
                        $query = "SELECT * FROM reservation WHERE reservation_patient_id = '$patient_id' ";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_array($result);
                        $doctor_id = $row['reservation_doctor_id'];
                        $queryGetDoctor = "SELECT * FROM doctor WHERE doctorId = '$doctor_id' ";
                        $resultGetDoctor = mysqli_query($conn, $queryGetDoctor);

                        while($rowGetDoctor = mysqli_fetch_array($resultGetDoctor)){
                            echo "
                            <tr class='text-center'>
                            <td scope='row'>$rowGetDoctor[doctorName]</td>
                            <td class='text-center'>$rowGetDoctor[doctorIsSpecialty]</td>
                            <td class='text-center'>$row[reservation_price]</td>
                            <td class='text-center'>$row[reservation_doctor_date]</td>
                            <td class='text-center'>
                                <a href='#' class='btn btn-info'>ok</a>
                                <a href='#' class='btn btn-danger delete' data-field='city_id' data_id='$row[reservation_id]' data-table='city'>Delete</a>
                            </td>
                        </tr>
                            ";
                        }
                    ?>
                    </tbody> 
    
                </table>
            <?php else: ?> 
                <h3>not found any patient</h3>
            <?php endif?>
        </div>
    </div>
</body>
</html>

<?php require_once BLA.'inc/footer.php';?>