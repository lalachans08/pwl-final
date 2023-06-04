<?php

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "rna";

// Create connection
$koneksi = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$koneksi) {
	die("Connection failed: " . mysqli_connect_error());
}
