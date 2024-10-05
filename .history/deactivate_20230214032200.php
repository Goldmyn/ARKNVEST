

<?php
// Include config file
require_once "config.php";


$sql = "UPDATE users SET status='Deactivated', activated_at='0000-00-00 00:00:00' WHERE status='Activated'";
$link->query($sql);

$link->close();

?>
