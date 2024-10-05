<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE activation_status SET status='Activated', activated_at=CURRENT_TIMESTAMP WHERE status='Deactivated'";
$conn->query($sql);

$conn->close();

?>
