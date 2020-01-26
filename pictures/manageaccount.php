<?php

include_once 'important/header.php';

if (isset($_SESSION['id'])) {
	echo "<form name='deleteAccount' method='POST' action='account/deleteaccount.php'>
	<button name='deleteSubmit' type='submit'>Delete Account</button>
	</form>
	<form name='changePassword' method='POST' action='account/changepassword.php'>
	<button name='changePassSubmit' type='submit'>Change Password</button>
	</form>
	<form name='changeEmail' method='POST' action='account/changeemail.php'>
	<button name='changeEmailSubmit' type='submit'>Change Email</button>
	</form>";
}

include_once 'important/footer.php';
?>