<?php

include_once "important/functions.php";

class Comments {

	public static function setComments($conn) {
		if (isset($_POST['commentSubmit']) && isset($_SESSION['id'])) {
			if(Token::check($_POST['token'])) {
				$userid = cleanInput($conn, $_POST['userid']);
				$date = cleanInput($conn, $_POST['date']);
				$message = cleanInput($conn, $_POST['message']);
				
				$unsafeId = (int) $_GET['id'];
				$id = mysqli_real_escape_string($conn, $unsafeId);
				
				$sql = "INSERT INTO comments (userid, date, message, picture) VALUES ('$userid', '$date', '$message', '$id')";
				$result = $conn->query($sql);
				header('location: '.$_SERVER['REQUEST_URI']);
			}
		}
	}
	
	public static function getComments($conn, $conn2) {
		if (isset($_GET['id']) && isset($_SESSION['id'])) {
			
			$unsafeId = (int) $_GET['id'];
			$id = mysqli_real_escape_string($conn, $unsafeId);
			$sql = "SELECT * FROM comments WHERE picture='$id'";
			$result = $conn->query($sql);
			
			while ($row = $result->fetch_assoc()) {
				$userid = $row['userid'];
				$sql2 = "SELECT * FROM users WHERE id='$userid'";
				$result2 = $conn2->query($sql2);
	
				if ($row2 = $result2->fetch_assoc()) {
					echo "<div class='displayBox'><p>";
					echo $row2['username']."<br>";
					echo $row['date']."<br>";
					echo nl2br($row['message'])."</p>";
					$sessionId = $_SESSION['id'];
					if ($sessionId == $row2['id']) {
						require_once 'comments/token.php';
						echo "<form class='deleteForm' method='POST' action='".Comments::deleteComments($conn, $sessionId)."'>
							<input type='hidden' name='id' value='".$row['id']."'>
							<button type='submit' name='commentDelete'>Delete</button>
						</form>
						<form class='editForm' method='POST' action='editcomment.php'>
							<input type='hidden' name='id' value='".$row['id']."'>
							<input type='hidden' name='userid' value='".$row['userid']."'>
							<input type='hidden' name='date' value='".$row['date']."'>
							<input type='hidden' name='message' value='".$row['message']."'>
							<button>Edit</button>
						</form>";
					}
					echo "</div>";
				}
			}
		}
	}
	
	public static function editComments($conn, $sessionId) {
		if (isset($_POST['commentSubmit']) && isset($_SESSION['id'])) {
			if(Token::check($_POST['token'])) {
				$id = cleanInput($conn, $_POST['id']);
				$userid = cleanInput($conn, $_POST['userid']);
				$date = cleanInput($conn, $_POST['date']);
				$message = cleanInput($conn, $_POST['message']);
				
				$sql = "UPDATE comments SET message = '$message' WHERE id='$id' AND userid='$sessionId'";
				$result = $conn->query($sql);
				header("Location: index.php");
			}
		}
	}
	
	public static function deleteComments($conn, $sessionId) {
		if (isset($_POST['commentDelete']) && isset($_SESSION['id'])) {
			$unsafeId = $_POST['id'];
			$id = mysqli_real_escape_string($conn, $unsafeId);
			
			$sql = "DELETE FROM comments WHERE id='$id' AND userid='$sessionId'";
			$result = $conn->query($sql);
			header('location: '.$_SERVER['REQUEST_URI']);
		}
	}
	
}