<?php
	require_once "../config.php";
	$path = $_POST['book'];
	$email = $_SESSION['user']['Email'];

	$success = false;
	$message = "Success";

	$sql = "SELECT path from flagged where path='" . $path . "' and email='" . $email . "';";
	$result = $conn->query($sql);
	$nr = (int)mysqli_num_rows($result);

	if($nr > 0){
		$message = "Deja a&#355;i raportat aceast&#259; poz&#259;";
	}
	else{
		$sql = "INSERT INTO flagged (path, email) VALUES ('" . $path . "', '" . $email . "');";
		$result = $conn->query($sql);
		
		if($result == true){
			$success = true;
		
		}
		$sql = "SELECT path from flagged where path='" . $path . "';";
		$result = $conn->query($sql);
		$nr = (int)mysqli_num_rows($result);
		if($nr >= 1){
			$sql = "DELETE FROM one WHERE path='" . $path . "';";
			$conn->query($sql);
			$sql = "DELETE FROM flagged where path='" . $path . "'";
			$conn->query($sql); 
		}
		$conn->close();
	}

	header("Content-type: application/json");
	echo json_encode(array("success" => $success, "message" => $message));
?>