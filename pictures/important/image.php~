<?php
	
if(isset($_GET['id'])) {
	$unsafeId = (int) $_GET['id'];
	$id = mysqli_real_escape_string($conn, $unsafeId);
	
	$sql = "SELECT * FROM pictures WHERE picture='$id'";
	$result = mysqli_query($conn, $sql);

	
	if (mysqli_num_rows($result) > 0) {
		if ($row = mysqli_fetch_assoc($result)) {
			$imgId = $row['picture'];
			$pictureName = $row['name'];
			$description = $row['description'];
			$tags = $row['tags'];
			$category = $row['category'];
			
			$imgId = "files/" . $imgId . ".jpg";
			echo "<h1>$pictureName</h1>
			<div id='imageWrapper'>
			<span id='imageText'>Click to zoom</span>
			<img src='$imgId' alt='image'>
			</div>
			<a href='$imgId' download='$pictureName'><button>Download</button></a>
			<a href='$imgId'><button>View source file</button></a>
			<br>
			<div>
				<p>$description</p>
				<p>Category: <a class='underline' href='categories.php?type=$category'>$category</a></p>
				<p>Tags: $tags</p>
			</div>";
			include_once "comments/comments.php";
		} else {
			echo "Image not available.";
		}
	} else {
		echo "Image not available.";
	}
} else {
	echo "Please search for an image.";
}
