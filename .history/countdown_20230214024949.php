<?php
session_start();

//connect to the database
$conn = mysqli_connect("localhost", "user", "password", "database_name");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$status = "";

if (isset($_POST['activate'])) {
    $status = "Activated";
    $_SESSION['status'] = $status;
    $end_time = time() + (30 * 24 * 60 * 60);
    $_SESSION['end_time'] = $end_time;

    //update status in the database
    $sql = "UPDATE table_name SET status='$status', end_time='$end_time' WHERE id=1";
    mysqli_query($conn, $sql);
}

if (isset($_POST['deactivate'])) {
    $status = "Deactivated";
    $_SESSION['status'] = $status;
    unset($_SESSION['end_time']);

    //update status in the database
    $sql = "UPDATE table_name SET status='$status', end_time=NULL WHERE id=1";
    mysqli_query($conn, $sql);
}

if (isset($_SESSION['status'])) {
    $status = $_SESSION['status'];
}

if (isset($_SESSION['end_time'])) {
    $remaining = $_SESSION['end_time'] - time();
    if ($remaining <= 0) {
        $status = "Deactivated";
        unset($_SESSION['end_time']);

        //update status in the database
        $sql = "UPDATE table_name SET status='$status', end_time=NULL WHERE id=1";
        mysqli_query($conn, $sql);
    }
}

if ($status == "Activated") {
    $days = floor($remaining / 86400);
    $hours = floor(($remaining % 86400) / 3600);
    $minutes = floor(($remaining % 3600) / 60);
    $seconds = ($remaining % 60);
    $countdown = "$days days, $hours hours, $minutes minutes, $seconds seconds";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Activate/Deactivate</title>
</head>
<body>
    <h1>Status: <?php echo $status; ?></h1>
    <?php if ($status == "Activated"): ?>
        <h2>Time remaining: <?php echo $countdown; ?></h2>
        <form action="" method="post">
            <input type="submit" name="deactivate" value="Deactivate" onclick="return confirm('Are you sure about this?')">
        </form>
    <?php else: ?>
        <form action="" method="post">
            <input type="submit" name="activate" value="Activate" onclick="return confirm('Are you sure about this?')">
        </form>
    <?php endif; ?>
    </div>
</body>
</html>