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
    <div class="container text-center">
        <div class="col-sm-12">
            <?php //if(isset($_SESSION['patient_name'])): ?>
            
                <!-- <h3 class="p-3 bg-primary text-white">
                    Welcome <?php //echo $_SESSION['patient_name']; ?> , reservation
                </h3>
                <?php //if(isset($data['doctorName'])): ?>
                    <table class="table table-dark table-bordered">
                        <thead>
                            <tr class="text-center">
                                <td scope="col">doctor name</td>
                                <td scope="col">doctor is specialty</td>
                                <td scope="col">doctor phone</td>
                                <td scope="col">reservation date</td>
                                <td scope="col">reservation price</td>
                                <td scope="col">action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td scope="row"> <?php //echo $data['doctorName']?></td>
                                <td scope="row"><?php //echo $data['doctorIsSpecialty']?></td>
                                <td class="text-center"><?php //echo $data['doctorPhone']?></td>
                                <td class="text-center"><?php //echo $data['doctorDate']?></td>
                                <td class="text-center"><?php //echo $data['doctor_booking_price']?></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-danger ">Cancel</a>
                                    <a href="#" class="btn  btn-info delete" data-field="city_id" data_id="<?php echo $row["city_id"];?>" data-table="city">Booking Now</a>
                                </td>
                            </tr>
                        </tbody>
                    </table> -->
                    <?php //else: ?> 
                        <!-- <h3>There is no repetition that I have done before</h3> -->
                    <?php //endif?>
            
            <?php //else: ?> 
                <!-- <h3>not found any patient</h3> -->
            <?php //endif?>
        </div>
    </div>

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