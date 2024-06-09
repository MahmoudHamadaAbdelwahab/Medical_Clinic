<?php
require_once('../config.php');
require_once BLA.'inc/nav.php';
require_once BL.'functions/valid.php';

// Fetch opinions from the database
$sql = "SELECT name, phone, address, message, rating FROM opinion";
$result = mysqli_query($conn, $sql);

$opinions = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $opinions[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($opinions);
?>
