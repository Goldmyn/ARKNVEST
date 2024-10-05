



function change_status() {
    // Start session and connect to database
    session_start();
    $conn = new mysqli($host, $username, $password, $dbname);
  
    // Check if the activate button was clicked
    if (isset($_POST['activate'])) {
      // Get current time and add 30 days
      $time = time();
      $expire_time = strtotime("+30 days", $time);
  
      // Update user database with new status and expiration time
      $username = $_SESSION['username'];
      $sql = "UPDATE users SET status='Activated', expire_time='$expire_time' WHERE username='$username'";
      $conn->query($sql);
  
      // Disable activate button and display status
      echo "Activated";
      echo "<button onclick='deactivate()'>Deactivate</button>";
      echo "<script>document.getElementById('activate').disabled = true;</script>";
  
    // Check if the deactivate button was clicked
    } elseif (isset($_POST['deactivate'])) {
      // Show prompt to confirm deactivation
      echo "<script>if (confirm('Are you sure about this?')) {";
      echo "document.getElementById('activate').disabled = false;";
      echo "} else {";
      echo "return false;";
      echo "}</script>";
  
      // Update user database with new status and expiration time
      $username = $_SESSION['username'];
      $sql = "UPDATE users SET status='Deactivated', expire_time='0' WHERE username='$username'";
      $conn->query($sql);
  
    // If neither button was clicked, check if status is already activated
    } else {
      $username = $_SESSION['username'];
      $sql = "SELECT status, expire_time FROM users WHERE username='$username'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
  
      if ($row['status'] == 'Activated') {
        // Calculate time remaining until deactivation
        $time_left = $row['expire_time'] - time();
        $days_left = floor($time_left / (60 * 60 * 24));
        $hours_left = floor(($time_left % (60 * 60 * 24)) / (60 * 60));
        $minutes_left = floor(($time_left % (60 * 60)) / 60);
  
        // Display countdown and deactivate button
        echo "Deactivating in $days_left days, $hours_left hours, and $minutes_left minutes";
        echo "<button onclick='deactivate()'>Deactivate</button>";
        echo "<script>document.getElementById('activate').disabled = true;</script>";
      } else {
        // Display activate button
        echo "<button id='activate' onclick='activate()'>Activate</button>";
      }
    }
    $conn->close();
  }
  