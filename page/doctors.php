<!DOCTYPE html>
<html>
<head>
    <title>Doctors</title>
</head>
<body>
    <h1>Doctors</h1>
    <ul>
        <?php
        require_once('../config.php');
        require_once BL.'functions/db.php';
        require_once BL.'functions/messages.php';
        require_once BL.'functions/valid.php';
        // Fetch doctors from the database
        echo $department_id = $_GET['department_id'];

        $sql = "SELECT doctorName FROM doctor WHERE depart_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $department_id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row['doctorName'] . "</li>";
        }
        $stmt->close();
        $conn->close();
        ?>
    </ul>
</body>
</html>
