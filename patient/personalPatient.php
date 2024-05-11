<?php
    require_once('../config.php');
    require_once BLA.'inc/nav.php';
    require_once BL.'functions/valid.php';
    require_once BL.'functions/db.php';

    $patient = isset($_SESSION['patient_name']) && $_SESSION['patient_role'] == 'patient' ? $_SESSION['patient_name'] : null;
    $doctor = isset($_SESSION['patient_name']) && $_SESSION['patient_role'] == 'doctor' ? $_SESSION['patient_name'] : null;
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
        <?php if(isset($_SESSION['patient_name'])): ?>
        
            <h3 class="p-3 bg-primary text-white">
                Welcome <?php echo $_SESSION['patient_name']; ?> , reservation
            </h3>

            <?php if ($_SESSION['doctorName']): ?>
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
                            <td scope="row"> <?php echo $_SESSION['doctorName']?></td>
                            <td scope="row"><?php echo $_SESSION['doctorIsSpecialty']?></td>
                            <td class="text-center"><?php echo $_SESSION['doctorPhone']?></td>
                            <td class="text-center"><?php echo $_SESSION['doctorDate']?></td>
                            <td class="text-center"><?php echo $_SESSION['doctorSallary']?></td>
                            <td class="text-center">
                                <a href="#" class="btn btn-info">Cancel</a>
                                <a href="#" class="btn btn-danger delete" data-field="city_id" data_id="<?php echo $row["city_id"];?>" data-table="city">Booking Now</a>
                            </td>
                        </tr>
                    </tbody> 
                </table>
                <?php else: ?> 
                    <h3>not found any doctor</h3>
                <?php endif?>
        

        <?php else: ?> 
            <h3>not found any patient</h3>
        <?php endif?>


        </div>
    </div>
</body>
</html>

<?php require_once BLA.'inc/footer.php';?>
