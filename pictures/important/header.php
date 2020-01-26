<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="imagestyle.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<nav>
		<div class="searchBar">
			<form action="search.php" method="POST">
				<a href="index.php"><img src="home.png" id="home"/></a>
				<input id="searchBox" type=text name="searchTerm">
				<button type="submit" name="submitSearch">Search</button>
			</form>
		</div>
		
		<div class="navLogin">
			<?php
				if (isset($_SESSION['username'])) {
					echo '<form action="login/logout.php" method="POST">
					<button type="submit" name="submit">Logout</button>
					</form>
					<a href="manageaccount.php"><button>Account</button></a>';
				} else {
					echo '<form action="login/login.php" method="POST">
					<input type="text" name="username" placeholder="Username/email">
					<input type="password" name="password" placeholder="password">
					<button type="submit" name="submit">Login</button>
					</form>
					<a href="signup.php"><button>Sign up</button></a>';
				}
			?>
			
		</div>	
	</nav>

<div class="pagebody">