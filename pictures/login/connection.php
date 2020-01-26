<?php

$servername = "localhost";
$dbname = "loginsystem";
$config = parse_ini_file('../../../configlogin.ini');

$conn = mysqli_connect($servername, $config['username'], $config['password'], $dbname);

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}