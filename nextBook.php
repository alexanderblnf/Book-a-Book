<?php
	session_start();
	$aux = $_SESSION['book'];
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
		}							
	}
	else{
		$auxArr = explode(".", $arr[1]);
		$nr = (int)$auxArr[0];
		$nr++;
		$newBook = $newBook . $nr . ".jpg";
		//if(file_exists($newBook) == false){
		//	$newBook = $book;
		//}
	}
	$_SESSION['book'] = $newBook;
?>