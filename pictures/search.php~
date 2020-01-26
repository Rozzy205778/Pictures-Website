<?php
	include_once "important/header.php";
	include_once "important/functions.php";
	include_once "connection.php";
?>

<div class="searchContainer">

<?php
	if (isset($_POST['submitSearch'])) {
		$unsafeSearchTerm = $_POST['searchTerm'];
		$searchTerm = "%".cleanInput($conn, $unsafeSearchTerm)."%";
		
		$preparedStatement = $conn->prepare("SELECT * FROM pictures WHERE name LIKE ? OR tags LIKE ? OR description LIKE ?");
		
		$preparedStatement->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
		$preparedStatement->execute();
		
		$result = $preparedStatement->get_result();
		$rowNumber = $result->num_rows;
		
		if ($rowNumber > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<a href='pictures.php?id=".$row['picture']."'><div class='pictureResults'>
					<h2>".$row['name']."</h2>
					<p>".$row['description']."</p>
					<p>Tags: ".$row['tags']."</p>
				</div></a>";
			}
		} else {
			echo "<p>No matches!</p>";
		}
	} else {
		echo "<p>No matches!</p>";
	}
?>

</div>

<?php
	include_once "important/footer.php";
?>