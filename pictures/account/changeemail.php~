<?php

include_once "header.php";
include_once "../login/connection.php";
include_once "accountfunctions.php";

if (isset($_SESSION['id']) && isset($_POST['changeEmailSubmit'])) {
	echo "<form name='emailForm' method='POST' action'".Account::changeEmail($conn)."'>
	Password: <input type='password' name='password' />
	New email: <input type='text' name='newEmail' />
	<button type='submit' name='newEmailSubmit'>Submit</button>
	</form>";
}	

include_once "../important/footer.php";