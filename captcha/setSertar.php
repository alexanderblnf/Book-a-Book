<?php
	session_start();
	$sertar = $_POST['sertar'];
	$success = true;
	$_SESSION['pics'] = 0;	
	$_SESSION['sertar'] = $sertar;

	header("Content-type: application/json");
	echo json_encode(array("success" => $success));

?>