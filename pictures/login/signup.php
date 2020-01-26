<?php

if (isset($_POST['submit'])) {
	include_once 'connection.php';
	include_once '../important/functions.php';
	
	$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$username = cleanInput($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	// Error handlers
	// Check for empty fields
	if (empty($firstname) || empty($email) || empty($username) || empty($password)) {
		unset($password, $_POST['password']);
		header("Location: ../signup.php?signup=empty");
		exit();
	} else {
		// Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
			unset($password, $_POST['password']);
			header("Location: ../signup.php?signup=invalid");
			exit();
		} else {
			// Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				unset($password, $_POST['password']);
				header("Location: ../signup.php?signup=email");
				exit();
			} else {
				$sql = "SELECT * FROM users WHERE username='$username'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				
				if ($resultCheck > 0) {
					unset($password, $_POST['password']);
					header("Location: ../signup.php?signup=usertaken");
					exit();
				} else {
					// Hashing the password
					$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
					// Insert the user into the database
					$sql = "INSERT INTO users (firstname, email, username, password) VALUES ('$firstname', '$email', '$username', '$hashedPassword')";
					mysqli_query($conn, $sql);
					unset($password, $_POST['password']);
					header("Location: ../signup.php?signup=success");
					exit();
				}
			}
		}
	}
	
} else {
	unset($_POST['password']);
	header('Location: '.$_SERVER['REQUEST_URI']);
	exit();
}