<?php
	//require_once "../config.php";
	session_start();
	$book = $_SESSION['book'];
	$exists = 1;
	$aux = $book;
	$arr = explode("_", $aux, 2);
	$newBook = $arr[0] . "_";
	if(strpos($arr[1], "_") != false){
		$auxArr = explode("_", $arr[1]);
		$newBook = $newBook . $auxArr[0] . "_";
		$part = explode(".", $auxArr[1]);
		$nr = (int)$part[0];
		$nr++;
		$newBook = $newBook . $nr . ".jpg";
		if(file_exists($newBook) == false){
			$newBook = $book;
			$exists = 0;
		}							
	}
	else{
		$auxArr = explode(".", $arr[1]);
		$nr = (int)$auxArr[0];
		$nr++;
		$newBook = $newBook . $nr . ".jpg";
		if(file_exists($newBook) == false){
			$newBook = $book;
			$exists = 0;
		}	
	}
	$book = $newBook;
	$_SESSION['book'] = $book;

	header("Content-type: application/json");
	echo json_encode(array("exists" => $exists, "book" => $book))
?>