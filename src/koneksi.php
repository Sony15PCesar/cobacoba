<?php

$server = "db";	// ini IP server databasenya, localhost jika di local PC
$username = "root";	// Username database, defaultnya root
$password = "example";		// password database, defaultnya kosong
$database = "caritahu";	// Nama database, sesuaikan dengan nama database anda


$conn = mysqli_connect($server,$username,$password, $database) or die("Koneksi gagal ".mysqli_connect_errno(). PHP_EOL);




?>