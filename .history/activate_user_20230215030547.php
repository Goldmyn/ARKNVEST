<?php
// Start the session (if it hasn't already been started)
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
  // Get the user ID from the session
  $user_id = $_SESSION['user_id'];

  // Connect to the database (replace these values with your own)
  $host = 'localhost';
  $username = 'your_database_username';
  $password = 'your_database_password';
  $database = 'your_database_name';
  $conn = new mysqli($host, $username, $password, $database);

  // Check if the connection was successful
  if ($conn->connect_error) {
    die('Error: ' . $conn->connect_error);
  }

  // Retrieve the activation and deactivation times from the users table
  $sql = "SELECT activation_time, deactivation_time FROM users WHERE id=$user_id";
  $result = $conn->query($sql);

  // Check if a row was returned
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $activation_time = $row['activation_time'];
    $deactivation_time = $row['deactivation_time'];

    // Check if the user is activated
    if ($activation_time != null && $deactivation_time != null && strtotime($deactivation_time) > time()) {
      $button_text = 'Activated';

      // Calculate the remaining time (in seconds)
      $remaining_time = strtotime($deactivation_time) - time();

      // Convert the remaining time to days, hours, minutes, and seconds
      $days = floor($remaining_time / (60 * 60 * 24));
      $hours = floor(($remaining_time % (60 * 60 * 24)) / (60 * 60));
      $minutes = floor(($remaining_time % (60 * 60)) / 60);
      $seconds = $remaining_time % 60;

      // Format the remaining time as a string
      $remaining_time_string = sprintf('%d days, %d hours, %d minutes, %d seconds', $days, $hours, $minutes, $seconds);
    } else {
      $button_text = 'Inactive';
      $remaining_time_string = '';
    }
  } else {
    $button_text = 'Inactive';
    $remaining_time_string = '';
  }

  // Close the database connection
  $conn->close();

} else {
  // Redirect the user to the deposit page (if they're not logged in)
  header('Location: deposit.php');
  exit;
}
?>

<form method="post" action="activate_user.php">
  <button type="submit" name="activate" <?php if ($button_text == 'Activated') {echo 'class="active"';} else {echo 'class="inactive" onclick="window.location.href=\'deposit.php\'"';} ?>>
    <?php echo $button_text; ?>
    <?php if ($button_text == 'Activated') {echo '(' . $remaining_time_string . ' remaining)';} ?>
  </button>
</form>

