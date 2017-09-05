<?php
	require_once "../config.php";
	$sertar = $_POST['sertar'];
	$success = true;
	$_SESSION['pics'] = 0;	
	$_SESSION['sertar'] = $sertar;

	header("Content-type: application/json");
	echo json_encode(array("success" => $success, "sertar" => $_SESSION['sertar']));

?>