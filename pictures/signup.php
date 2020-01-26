<?php
	include_once 'important/header.php';

if(isset($_GET['signup'])) {
	$signup = $_GET['signup'];
	if ($signup == "empty"){
		echo "<div id='signupError'>Please fill in the form again.</div>";
	} elseif($signup == "invalid") {
		echo "<div id='signupError'>Invalid. Please fill in the form again.</div>";
	} elseif($signup == "email") {
		echo "<div id='signupError'>Invalid. Please fill in the form again.</div>";
	} elseif($signup == "usertaken") {
		echo "<div id='signupError'>Username taken.</div>";
	} elseif($signup == "success") {
		echo "<div id='signupSuccess'>Success!</div>";
	}
}

?>

<section>
	<div>
		<h2>Signup</h2>
		<form action="login/signup.php" method="POST">
			<input class="signup" type="text" name="firstname" placeholder="Name">
			<br>
			<input class="signup" type="text" name="email" placeholder="E-mail">
			<br>
			<input class="signup" type="text" name="username" placeholder="Username">
			<br>
			<input class="signup" type="password" name="password" placeholder="Password">
			<br>
			<button type="submit" name="submit">Sign up</button>
		</form>
	</div>	
</section>

<?php
	include_once 'important/footer.php';
?>