<?php

	// Connect to database
	require_once "config.php";

	// Check if id is set or not if true toggle,
	// else simply go back to the page
	if (isset($_GET['user_id'])){

		// Store the value from get to a
		// local variable "course_id"
		$user_id = $_GET['user_id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql = "UPDATE `users` SET
			`status`=1 WHERE id='$user_id'";

		// Execute the query
		mysqli_query($link, $sql);
	}

	// Go back to course-page.php
	header('location: welcome.php');
?>
