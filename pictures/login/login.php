<?php

session_start();

if (isset($_POST['submit'])) {

	include_once 'connection.php';
	
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	// Error handlers
	// Check if inputs are empty
	if (empty($username) || empty($password)) {
		unset($password, $_POST['password']);
		header("Location: ../index.php?signin=error");
		exit();
	} else {	
		$sql = "SELECT * FROM users WHERE username='$username' OR email='$username'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			unset($password, $_POST['password']);
			header("Location: ../index.php?signin=error");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				// Dehashing password
				$hashedPwdCheck = password_verify($password, $row['password']);
				if ($hashedPwdCheck == false) {
					unset($password, $_POST['password']);
					header("Location: index.php");
				} elseif ($hashedPwdCheck == true) {
					// Log in the user here
					$_SESSION['id'] = $row['id'];
					$_SESSION['first'] = $row['firstname'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['username'] = $row['username'];
					unset($password, $_POST['password']);
					header("Location: ../index.php?signin=success");
					exit();
				}
			}
		}
	}
} else {
	unset($_POST['password']);
	header("Location: ../index.php?signin=error");
	exit();
}