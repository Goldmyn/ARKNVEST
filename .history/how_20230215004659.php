<?php
// Start the session
session_start();

// Check if the button has been clicked and the balance is greater than 100
if (isset($_POST['activate']) && $_SESSION['portfolio'] > 100) {
  // Set the activation time to the current time
  $activation_time = time();

  // Calculate the expiration time (30 days from activation time)
  $expiration_time = $activation_time + (30 * 24 * 60 * 60);

  // Update the user's activation time and expiration time in the database
  $user_id = $_SESSION['user_id'];
  $db_host = 'your_db_host'; // Replace with your database host
  $db_user = 'your_db_username'; // Replace with your database username
  $db_pass = 'your_db_password'; // Replace with your database password
  $db_name = 'your_db_name'; // Replace with your database name

  // Connect to the database
  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

  // Check if the connection was successful
  if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
  }

  // Update the user's activation and expiration times in the database
  $sql = "UPDATE users SET activation_time = '$activation_time', expiration_time = '$expiration_time' WHERE id = '$user_id'";
  if (mysqli_query($conn, $sql)) {
    // If the update was successful, set the button text to "Activated"
    $button_text = "Activated";
  } else {
    // If the update failed, set the button text to "Inactive" and display an error message
    $button_text = "Inactive";
    echo "Error updating record: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
} else {
  // If the button has not been clicked or the balance is less than or equal to 100, set the button text to "Inactive"
  $button_text = "Inactive";
}
?>

<button <?php if ($button_text == 'Activated') {echo 'class="active"';} else {echo 'class="inactive" onclick="window.location.href=\'deposit.php\'"';} ?>>
  <?php echo $button_text; ?>
</button>
