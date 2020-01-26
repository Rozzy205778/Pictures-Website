<?php

include_once "important/header.php";

if (isset($_SESSION['id'])) {
	include_once "connection.php";

	date_default_timezone_set('Europe/London');
	require_once 'comments/token.php';
	include 'comments/functions.php';

	$id = $_POST['id'];
	$userid = $_POST['userid'];
	$date = $_POST['date'];
	$message = $_POST['message'];
	$sessionId = $_SESSION['id'];
	
	echo "<form method='POST' action='".Comments::editComments($conn, $sessionId)."'>
		<input type='hidden' name='id' value='".$id."'>
		<input type='hidden' name='userid' value='".$userid."'>
		<input type='hidden' name='date' value='".$date."'>
		<input type='hidden' name='token' value='".Token::generate()."'>
		<textarea class='commentBox' name='message'>".$message."</textarea><br>
		<button type='submit' name='commentSubmit'>Edit</button>
	</form>";
	
	include_once "important/footer.php";
}