<?php
$servername = "localhost"; // or use the server's IP address if necessary
$username = "jorgehp";  // your database username
$password = "3n4HY7m3";  // your database password
$dbname = "S224DB_jorgehp";  // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
