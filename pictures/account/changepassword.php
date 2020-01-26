<?php

include_once "header.php";
include_once "../login/connection.php";
include_once "accountfunctions.php";

if (isset($_SESSION['id']) && isset($_POST['changePassSubmit'])) {
	echo "<form name='passwordForm' method='POST' action'".Account::changePassword($conn)."'>
	Old password: <input type='password' name='password' />
	New password: <input type='password' name='password' />
	Confirm: <input type='password' name='password' />
	<button type='submit' name='passwordSubmit'>Submit</button>
	</form>";
}

include_once "../important/footer.php";