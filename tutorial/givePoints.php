<?php
	require_once "../config.php";
	$email = $_POST['email'];

	$sql = "SELECT tutorial from users where Email='" . $email . "';";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$success = false;
	if($row['tutorial'] == 1){
		$success = true;
		$sql = "UPDATE users SET points = points + 5 where Email='" . $email . "';";
		$sql .= "UPDATE users SET totalPoints = totalPoints + 5 where Email='" . $email . "';";
		$sql .= "UPDATE users SET tutorial = 0 where Email='" . $email . "';";
		$conn->multi_query($sql);
	}

	$conn->close();

	header("Content-type: application/json");
	echo json_encode(array("success" => $success));