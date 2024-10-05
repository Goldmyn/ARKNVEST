

<?php
// Include config file
require_once "config.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arknvest";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE activation_status SET status='Deactivated', activated_at='0000-00-00 00:00:00' WHERE status='Activated'";
$conn->query($sql);

$conn->close();

?>
