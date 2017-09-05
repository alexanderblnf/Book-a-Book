<?php
	$email = $_POST['email'];
	$conn = new mysqli('localhost:3306', 'aftqwrgr_alex', 'Hackaduck', 'aftqwrgr_poze');
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "INSERT INTO newsletter (email) VALUES ('" .$email . "');";
	$conn->query($sql);
?>