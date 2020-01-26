<?php

$servername = "localhost";
$dbname = "picturedata";
$config = parse_ini_file('../../configpictures.ini');

$conn = mysqli_connect($servername, $config['username'], $config['password'], $dbname);

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}