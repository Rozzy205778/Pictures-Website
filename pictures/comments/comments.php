<?php

	if (basename($_SERVER['PHP_SELF']) == "pictures.php" && isset($_SESSION['id'])) {
		require_once 'comments/token.php';
		include_once 'comments/functions.php';
		include_once 'comments/connection2.php';

		date_default_timezone_set('Europe/London');
		echo "<br>
		<h2>Comments</h2>
		<form method='POST' action='".Comments::setComments($conn)."'>
		<input type='hidden' name='userid' value='".$_SESSION['id']."'>
		<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
		<input type='hidden' name='token' value='".Token::generate()."'>
		<textarea class='commentBox' name='message'></textarea><br>
		<button type='submit' name='commentSubmit'>Comment</button>
		</form>";
		Comments::getComments($conn, $conn2);
	}