<?php
	require_once "../config.php";
	$points = $_POST['points'];
	$email = $_POST['email'];
	$sql = "SELECT points from users where Email='" . $email . "';";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$remainingPoints = $row['points'] - $points;

	if($remainingPoints < 0){
		$success = false;
		$message = "Luati mai multe puncte decat are jucatorul";	
	}
	else{
		$success = false;
		$sql = "UPDATE users SET points = points - " . $points . " where Email='" . $email . "';";
		$result = $conn->query($sql);
		
		if ($result == true) {
			$success = true;
		}
		$message = "Error";
	}
	header("Content-type: application/json");
	echo json_encode(array("success" => $success, "message" => $message));
?>