<?php
	$row = $_GET['row'];
	$conn = new mysqli('localhost:3306', 'aftqwrgr_alex', 'Hackaduck', 'aftqwrgr_poze');
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	//$conn = unserialize($_REQUEST['conn']);
	$sqlPath = "SELECT path FROM one WHERE sertar = '" . $row . "';";
	$result1 = $conn->query($sqlPath);
	$nr1 = (int)mysqli_num_rows($result1);
	for ($j = 1; $j <= $nr1; $j++) {
		$row1 = $result1->fetch_assoc();
		echo '<div class="image-container">';
		echo '<div class="image-blocker"></div>';
		echo '<img class="image" src="' . $row1['path'] . '"></img>';
		echo '</div>';
	}
		
?>