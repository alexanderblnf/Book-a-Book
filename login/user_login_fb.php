<?php
	require_once "../config.php";
	
	$email = $_POST['email'];
	$sql = "SELECT * from users where email='" . $email . "'";
	$result = $conn->query($sql);
	$nr = (int)mysqli_num_rows($result);
	$message = "There was an error";
	if($nr > 0){
		$_SESSION['user'] = mysqli_fetch_assoc($result);
		$result = true;
	}
	else{
		$result = false;
	}
	
	header('Content-Type: application/json');
	echo json_encode(array("success" => $result, 'message' => $message));