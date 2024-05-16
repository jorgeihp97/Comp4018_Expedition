<?php
include 'db_connect.php';

$sql = "SELECT * FROM Expeditions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Expedition Type</th><th>Participant Name</th><th>Emergency Contact</th><th>Date</th><th>Transport</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["expeditionType"]. "</td><td>" . $row["participantName"]. "</td><td>" . $row["emergencyContact"]. "</td><td>" . $row["date"]. "</td><td>" . $row["transport"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
