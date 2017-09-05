<?php
	require_once "../config.php";
	$last = $_POST['lastName'];
	$first = $_POST['firstName'];
	$email = "";

	if (isset($_POST['email'])) {
		$email = $_POST['email'];
	}

	$sql = "SELECT * FROM users where ((Lastname='" . $last . "' or Lastname='" . $first. "') and (Firstname='" . $first . "' or Firstname='" . $last . "')) or (Email='" . $email . "');";
	$result = $conn->query($sql);
	$nr = (int)mysqli_num_rows($result);
	$success = false;
	$lastName = "";
	$firstName = "";
	$email = "";
	$points = 0;
	$totalPoints = 0;

	if($nr == 1){
		$success = true;
		$row = $result->fetch_assoc();
		$lastName = $row['Lastname'];
		$firstName = $row['Firstname'];
		$email = $row['Email'];
		$points = $row['points'];
		$totalPoints = $row['totalPoints'];
	}
	$conn->close();
	header("Content-type: application/json");
	echo json_encode(array("success" => $success, "lastName" => $lastName, "firstName" => $firstName, "email" => $email, "points" => $points, "totalPoints" => $totalPoints));
?>