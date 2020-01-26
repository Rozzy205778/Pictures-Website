<?php
	include_once "important/header.php";
	include_once "important/functions.php";
	include_once "connection.php";

	if(isset($_GET['type'])) {
		$category = cleanInput($conn, $_GET['type']);
		echo "<h1>$category</h1>";
		
		$preparedStatement = $conn->prepare("SELECT * FROM pictures WHERE category=?");
			
		$preparedStatement->bind_param("s", $category);
		$preparedStatement->execute();
		
		$result = $preparedStatement->get_result();
		$rowNumber = $result->num_rows;
		
		if ($rowNumber > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$imgId = $row['picture'];
				$imgId = "files/" . $imgId . ".jpg";
				echo "<a href='pictures.php?id=".$row['picture']."'><img class='categoryImg' src='$imgId'>
				</a>";
			}
		} else {
			echo "No matches!";	
		}
	
	} else {
		echo "<p>No category selected<p/>";
	}
?>

<?php
	include_once "important/footer.php";
?>