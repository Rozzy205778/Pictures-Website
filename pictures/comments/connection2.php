<?php

$servername2 = "localhost";
$dbname2 = "loginsystem";
$config2 = parse_ini_file('../../configlogin.ini');

$conn2 = mysqli_connect($servername2, $config2['username'], $config2['password'], $dbname2);

if (!$conn2) {
	die("Connection failed: ".mysqli_connect_error());
}