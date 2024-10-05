<?php


// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
  // Get the user ID from the session
  $user_id = $_SESSION['user_id'];

  // Check if the user has enough credit to activate
  if ($_SESSION['portfolio'] >= 100) {
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
    $sql = "SELECT activation_time, deactivation_time FROM users WHERE user_id=$user_id";
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
    // Set a flag to indicate that the user needs to deposit before activating
    $deposit_required = true;
  }

} else {
  // Set a flag to indicate that the user needs to log in before activating
  $login_required = true;
}

if (isset($_POST['activate']) && $deposit_required) {
  // Redirect the user to the deposit page (if they don't have enough credit to activate)
  header('Location: deposit.php');
  exit;
}
?>




