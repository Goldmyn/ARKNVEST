

<?php
// Start the session (if it hasn't already been started)
session_start();

// Check if the form was submitted
if (isset($_POST['activate'])) {

  // Check if the user is logged in
  if (isset($_SESSION['user_id'])) {
    
    // Get the user ID from the session
    $user_id = $_SESSION['user_id'];
    
    // Update the activation time and expiration time in the database
    $activation_time = date('Y-m-d H:i:s');
    $deactivation_time = date('Y-m-d H:i:s', strtotime('+30 days'));
    
    // Connect to the database (replace these values with your own)
    $user_id = $_SESSION['user_id'];
  $db_host = 'localhost'; // Replace with your database host
  $db_user = 'root'; // Replace with your database username
  $db_pass = ''; // Replace with your database password
  $db_name = 'arknvest'; // Replace with your database name
    $host = 'localhost';
    $username = 'your_database_username';
    $password = 'your_database_password';
    $database = 'your_database_name';
    $conn = new mysqli($host, $username, $password, $database);
    
    // Check if the connection was successful
    if ($conn->connect_error) {
      die('Error: ' . $conn->connect_error);
    }
    
    // Update the activation and expiration times in the users table
    $sql = "UPDATE users SET activation_time='$activation_time', deactivation_time='$deactivation_time' WHERE id=$user_id";
    if ($conn->query($sql) === TRUE) {
      // Redirect the user to the homepage
      header('Location: index.php');
      exit;
    } else {
      // Display an error message
      echo 'Error updating record: ' . $conn->error;
    }
    
    // Close the database connection
    $conn->close();
    
  } else {
    // Redirect the user to the deposit page (if they're not logged in)
    header('Location: deposit.php');
    exit;
  }
  
} else {
  // Redirect the user to the homepage (if the form wasn't submitted)
  header('Location: index.php');
  exit;
}
?>
