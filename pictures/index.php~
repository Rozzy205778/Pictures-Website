<?php
	include_once "important/header.php";
	include_once "connection.php";
	
	if(isset($_GET['signin'])) {
		$signin = $_GET['signin'];	
		if ($signin == "error"){
			echo "<div id='signupError'>Login error.</div>";
		} elseif($signin == "success") {
			echo "<div id='signupSuccess'>Login success!</div>";
		}
	}

?>

<h1>Categories</h1>

<div id="categories">

<?php

$sql = "SELECT DISTINCT category FROM pictures";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
	echo "<a href='categories.php?type=".$row['category']."'><div class='categoryResults'>
		<p>".$row['category']."</p>
		</div></a>";
}

?>

</div>

<?php
	include_once "important/footer.php";
?>