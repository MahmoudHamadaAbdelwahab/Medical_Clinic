<?php
    require_once('../config.php');
    require_once BLA.'inc/nav.php';
    require_once BL.'functions/valid.php';
    require_once BL.'functions/messages.php';
    require_once BL.'functions/db.php';

    if(!$conn){
        die('Error: ' . mysqli_connect_error());
    }

    $doctor = isset($_SESSION['doctorName']) && $_SESSION['doctorRole'] == 'doctor' ? $_SESSION['doctorName'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" href="path/to/your/css/file.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .text { text-align: center; }
        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="file"], input[type="textarea"], input[type="date"], button {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        #error { padding: 5px; color: red; }
        .Alink {
            width: 100%;
            padding: 10px;
            background-color: #0d6efd;
            border: none;
            border-radius: 3px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .go_lastPost a { text-decoration: none; }
    </style>
</head>
<body>
<?php
    $error_message = '';
    $success_message = '';
    $doctor_id = $_SESSION['doctorId'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $writeOverview = $_POST['writeOverview'];
        $writeHere = $_POST['writeHere'];
        $id = $_POST['doctor_id'];
        $input_date = $_POST['date'];
        $date = date("Y-m-d", strtotime($input_date));
        $image = $_FILES['image'];
        $image_location = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $image_up = "image/" . $image_name;

        $insert = "INSERT INTO lastpost (lastPost_Image, lastPost_About, lastPost_writeHere, doctor_Id, lastPost_date) VALUES ('$image_up', '$writeOverview', '$writeHere', '$id', '$date')";
        mysqli_query($conn, $insert);

        if (move_uploaded_file($image_location, 'image/' . $image_name)) {
            $success_message = "
            <div class='go_lastPost'>
                <h3>New post created successfully</h3>
                <p> Go to page <a href='./lastPostPage.php'>last post</a></p>
            </div>";
        } else {
            $error_message = "No file uploaded. It's an error.";
        }
    }
?>
    <div class="container text-center">
        <div class="col-sm-12">
            <h3 class="p-3 bg-primary text-white">
                Welcome <?php echo $_SESSION['doctorName']; ?>, reservation
            </h3>
            <?php
                $doctor_id = $_SESSION['doctorId'];
                $query = "SELECT * FROM reservation WHERE reservation_doctor_id = '$doctor_id'";
                $result = mysqli_query($conn, $query);
                $total_reservation_price = 0; // Initialize total reservation price

                if (mysqli_num_rows($result) > 0) {
                    echo '
                    <table class="table table-dark table-bordered">
                        <thead>
                            <tr class="text-center">
                                <td scope="col">Patient Name</td>
                                <td scope="col">Patient Email</td>
                                <td scope="col">Price</td>
                                <td scope="col">Reservation Date</td>
                                <td scope="col">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                    ';

                    while ($row = mysqli_fetch_array($result)) {
                        $patient_id = $row['reservation_patient_id'];
                        $queryGetPatient = "SELECT * FROM patient WHERE PatientId = '$patient_id'";
                        $resultGetPatient = mysqli_query($conn, $queryGetPatient);
                        $rowGetPatient = mysqli_fetch_array($resultGetPatient);

                        $total_reservation_price += $row['reservation_price']; // Add reservation price to total

                        echo "
                        <tr class='text-center'>
                            <td scope='row'>{$rowGetPatient['patient_name']}</td>
                            <td class='text-center'>{$rowGetPatient['patient_email']}</td>
                            <td class='text-center'>{$row['reservation_price']}</td>
                            <td class='text-center'>{$row['reservation_doctor_date']}</td>
                            <td class='text-center'>
                                <button class='btn btn-danger delete' data-id='{$row['reservation_id']}'>Delete</button>
                            </td>
                        </tr>";
                    }
                    echo "
                    <tr class='text-center'>
                        <td colspan='2'><strong>Total Reservation Price</strong></td>
                        <td class='text-center'><strong>{$total_reservation_price}</strong></td>
                        <td colspan='2'></td>
                    </tr>
                    </tbody></table>";
                } else {
                    echo '<h5>There are no reservations for you yet</h5>';
                }
            ?>
        </div>

        <!-- create new post -->
        <div class="newPost">
            <h3>Create new post</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                <div class="input-group">
                    <input type="file" id="file" name="image" style="display: none;">
                    <label for="file" style="cursor: pointer; color:#0d6efd; font-weight:bold;">Choose Image Post</label>
                </div>
                <div class="input-group">
                    <label for="AboutLecture">Writing an overview of the post</label>
                    <input type="text" id="AboutLecture" name="writeOverview">
                </div>
                <div class="input-group">
                    <label for="writeHere">Write here</label>
                    <input type="textarea" id="writeHere" name="writeHere">
                </div>
                <div class="input-group">
                    <input type="date" name="date">
                </div>
                <div class="input-group">
                    <a href="posted_I_Created.php" style="text-decoration: none; color:#0d6efd; font-weight:bold;">Posts I created</a>
                    <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>">
                </div>
                <br>
                <button class="Alink" name="submit">New post</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('.delete').on('click', function(){
                var reservationId = $(this).data('id');
                var row = $(this).closest('tr');

                if (confirm('Are you sure you want to delete this reservation?')) {
                    $.ajax({
                        url: 'delete_reservation.php',
                        type: 'POST',
                        data: { reservation_id: reservationId },
                        success: function(response){
                            if(response == 'success'){
                                row.remove();
                                location.reload(); // Reload the page to update the total reservation price
                            } else {
                                alert('Failed to delete the reservation.');
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>

<?php require_once BLA.'inc/footer.php'; ?>
