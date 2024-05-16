<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $expeditionType = $conn->real_escape_string($_POST['expeditionType']);
    $participantName = $conn->real_escape_string($_POST['participantName']);
    $emergencyContact = $conn->real_escape_string($_POST['emergencyContact']);
    $date = $conn->real_escape_string($_POST['date']);
    $transport = $conn->real_escape_string($_POST['transport']);

    $sql = "INSERT INTO Expeditions (expeditionType, participantName, emergencyContact, date, transport)
            VALUES ('$expeditionType', '$participantName', '$emergencyContact', '$date', '$transport')";

    if ($conn->query($sql) === TRUE) {
        echo "New expedition booked successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
