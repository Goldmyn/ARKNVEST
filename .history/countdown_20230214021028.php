<?php

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

// Get the status of the activation from the database
$sql = "SELECT status, activated_at FROM activation_status";
$result = $conn->query($sql);

$status = "";
$activated_at = "";

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $status = $row["status"];
        $activated_at = $row["activated_at"];
    }
} else {
    // Insert default status into the database
    $sql = "INSERT INTO activation_status (status, activated_at)
    VALUES ('Deactivated', '0000-00-00 00:00:00')";
    $conn->query($sql);
}

$conn->close();

// Calculate the time remaining for the activation to expire
$time_remaining = strtotime("+30 days", strtotime($activated_at)) - time();

// Calculate the number of days, hours, and seconds remaining
$days_remaining = floor($time_remaining / 86400);
$hours_remaining = floor(($time_remaining % 86400) / 3600);
$seconds_remaining = floor(($time_remaining % 3600) / 60);

?>

<!DOCTYPE html>
<html>
<head>
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha384-K+ctZQ+LL8q6tP7I94W+qzQsfRV2a+AfHIi9k8z8l9ggpc8X+Ytst4yBo/hH+8Fk"
      crossorigin="anonymous"
    ></script>
    <script>
        function activate() {
            var result = confirm("Are you sure you want to activate?");
            if (result) {
                $.ajax({
                    type: "POST",
                    url: "activate.php",
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        }

        function deactivate() {
            var result = confirm("Are you sure you want to deactivate?");
            if (result) {
                $.ajax({
                    type: "POST",
                    url: "deactivate.php",
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        }
    </script>
</head>
<body>
    <div>
        <?php if ($status == "Activated") { ?>
            <p>Status: <b>Activated
            </b></p>
            <p>Time remaining: <b><?php echo $days_remaining; ?> days, <?php echo $hours_remaining; ?> hours, and <?php echo $seconds_remaining; ?> seconds</b></p>
            <button onclick="deactivate()">Deactivate</button>
        <?php } else { ?>
            <p>Status: <b>Deactivated</b></p>
            <button onclick="activate()">Activate</button>
        <?php } ?>
    </div>
</body>
</html>
