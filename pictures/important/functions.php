<?php

function cleanInput($conn, $input) {
	$input = strip_tags($input);
	$input = mysqli_real_escape_string($conn, $input);
	return $input;
}