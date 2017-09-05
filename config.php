<?php
	session_start();
	$conn = new mysqli('localhost:3306', 'root', 'alexbalan', 'aftqwrgr_poze');
	$conn->set_charset("utf8");
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
?>
