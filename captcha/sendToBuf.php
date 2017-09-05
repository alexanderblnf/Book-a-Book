<?php 
	require_once "../config.php";

	$ref = $conn->real_escape_string($_POST['ref']);
	$title = $conn->real_escape_string($_POST['title']);
	$path = $conn->real_escape_string($_POST['path']);
	$parts = $conn->real_escape_string($_POST['parts']);
	$author1last = "";
	$author1first = "";
	$author2last = "";
	$author2first = "";
	$author3last = "";
	$author3first = "";
	$descr = "";
	$info_title = "";
	$place = "";
	$publishing = "";
	$year = "";
	$pagination = "";

	if($parts < 1){
		$success = false;
		$message = "Numarul de parti nu poate fi mai mic de 1";
		header("Content-type: application/json");
		echo json_encode(array("success" => $success, "message" => $message));

		return ;
	}

	if (isset($_POST['author1last'])){
		$author1last = $conn->real_escape_string($_POST['author1last']);
	
		if (strpos($author1last, 'Ş') !== false){
			$author1last = str_replace("Ş", "Ș", $author1last);
		}
		if (strpos($author1last, 'Ţ') !== false){
			$author1last = str_replace("Ţ", "Ț", $author1last);
		}
	}
	if (isset($_POST['author1first'])){
		$author1first = $conn->real_escape_string($_POST['author1first']);

		if (strpos($author1first, 'Ş') !== false){
			$author1first = str_replace("Ş", "Ș", $author1first);
		}
		if (strpos($author1first, 'Ţ') !== false){
			$author1first = str_replace("Ţ", "Ț", $author1first);
		}
	}
	if (isset($_POST['author2last'])){
		$author2last = $conn->real_escape_string($_POST['author2last']);

		if (strpos($author2last, 'Ş') !== false){
			$author2last = str_replace("Ş", "Ș", $author2last);
		}
		if (strpos($author2last, 'Ţ') !== false){
			$author2last = str_replace("Ţ", "Ț", $author2last);
		}
	}
	if (isset($_POST['author2first'])){
		$author2first = $conn->real_escape_string($_POST['author2first']);

		if (strpos($author2first, 'Ş') !== false){
			$author2first = str_replace("Ş", "Ș", $author2first);
		}
		if (strpos($author1first, 'Ţ') !== false){
			$author2first = str_replace("Ţ", "Ț", $author2first);
		}
	}
	if (isset($_POST['author3last'])){
		$author3last = $conn->real_escape_string($_POST['author3last']);

		if (strpos($author3last, 'Ş') !== false){
			$author3last = str_replace("Ş", "Ș", $author3last);
		}
		if (strpos($author3last, 'Ţ') !== false){
			$author3last = str_replace("Ţ", "Ț", $author3last);
		}
	}
	if (isset($_POST['author3first'])){
		$author3first = $conn->real_escape_string($_POST['author3first']);

		if (strpos($author3first, 'Ş') !== false){
			$author3first = str_replace("Ş", "Ș", $author3first);
		}
		if (strpos($author3first, 'Ţ') !== false){
			$author3first = str_replace("Ţ", "Ț", $author3first);
		}
	}
	if (isset($_POST['descr'])){
		$descr = $conn->real_escape_string($_POST['descr']);

		if (strpos($descr, 'Ş') !== false){
			$descr = str_replace("Ş", "Ș", $descr);
		}
		if (strpos($descr, 'Ţ') !== false){
			$descr = str_replace("Ţ", "Ț", $descr);
		}
	}
	if (isset($_POST['info_title'])){
		$info_title = $conn->real_escape_string($_POST['info_title']);

		if (strpos($info_title, 'Ş') !== false){
			$info_title = str_replace("Ş", "Ș", $info_title);
		}
		if (strpos($info_title, 'Ţ') !== false){
			$info_title = str_replace("Ţ", "Ț", $info_title);
		}
	}
	if (isset($_POST['place'])){
		$place = $conn->real_escape_string($_POST['place']);

		if (strpos($place, 'Ş') !== false){
			$place = str_replace("Ş", "Ș", $place);
		}
		if (strpos($place, 'Ţ') !== false){
			$place = str_replace("Ţ", "Ț", $place);
		}
	}
	if (isset($_POST['publishing'])){
		$publishing = $conn->real_escape_string($_POST['publishing']);

		if (strpos($publishing, 'Ş') !== false){
			$publishing = str_replace("Ş", "Ș", $publishing);
		}
		if (strpos($publishing, 'Ţ') !== false){
			$publishing = str_replace("Ţ", "Ț", $publishing);
		}
	}
	if (isset($_POST['year'])){
		$year = $conn->real_escape_string($_POST['year']);
	}

	if (isset($_POST['pagination'])){
		$pagination = $_POST['pagination'];
	}
	
	
	$success = false;
	$message = "";
	$aux = explode("/", $path, 2);
	$sql = "SELECT * from one where path='" . $aux[1] . "';";
	$result = $conn->query($sql);
	$nr = (int)mysqli_num_rows($result);
	
	if($nr == 0){
		$sql = "SELECT * from lucky where email='" . $_SESSION['user']['Email'] . "' and path='" . $aux[1] . "';";
		$result = $conn->query($sql);
		$nr = (int)mysqli_num_rows($result);
		
		if ($nr == 0){
			$success = true;
			$sql = "UPDATE users set points = points + 1 where Email='" . $_SESSION['user']['Email'] . "';";
			$conn->query($sql);
			$sql = "UPDATE users set totalPoints = totalPoints + 1 where Email='" . $_SESSION['user']['Email'] . "';";
			$conn->query($sql);
			$sql = "INSERT INTO lucky(email, path) VALUES ('" . $_SESSION['user']['Email'] . "', '" . $aux[1] . "');";
			$conn->query($sql);
			$message = "Success";
		}
		else {
			$success = false;
			$message = "Ati mai introdus o data date pentru aceasta poza";
		}
		header("Content-type: application/json");
		echo json_encode(array("success" => $success, "message" => $message));

		return;
	}

	$sql = "SELECT * from captchaBuffer where email='" . $_SESSION['user']['Email'] .  "' and path='" . $path . "';";
	$result = $conn->query($sql);
	$nr = (int)mysqli_num_rows($result);




	if ($nr == 0){
		$sql = "INSERT INTO captchaBuffer (ref, author1last, author1first, author2last, author2first, author3last, author3first, title, info_title, place, year, publishing, descr, pagination, parts, path, email) VALUES ('" . $ref .  "', '" . $author1last . "', '" . $author1first . "', '" . $author2last . "', '" . $author2first . "', '" . $author3last . "', '" . $author3first . "', '" . $title . "', '" . $info_title . "', '" . $place . "', '" . $year . "', '" . $publishing . "', '" . $descr . "', '" . $pagination . "', '" . $parts . "','" . $path . "','" . $_SESSION['user']['Email'] . "');";
		$result = $conn->query($sql);

		if ($result == true){
			$success = true;
		} else {
			$message = "Eroare la inserare";
		}

		$sql = "SELECT email from captchaBuffer where ref='" . $ref . "' and author1last='" . $author1last . "' and author1first='" . $author1first . "' and title='" . $title . "' and place='" . $place . "' and parts='" . $parts . "' and year='" . $year . "';";
		$result = $conn->query($sql);
		$nr = (int)mysqli_num_rows($result);
		if($nr >= 2){
			$sql = "INSERT INTO contents (ref, author1last, author1first, author2last, author2first, author3last, author3first, title, info_title, place, year, publishing, descr, pagination, path) VALUES ('" . $ref .  "', '" . $author1last . "', '" . $author1first . "', '" . $author2last . "', '" . $author2first . "', '" . $author3last . "', '" . $author3first . "', '" . $title . "', '" . $info_title . "', '" . $place . "', '" . $year . "', '" . $publishing . "', '" . $descr . "', '" . $pagination . "','" . $path . "');";
			$conn->query($sql);

			for($i=1; $i <= $nr; $i++){
				$row = $result->fetch_assoc();
				$sql = "UPDATE users set points = points + 1 where Email='" . $row['email'] . "';";
				$conn->query($sql);
				$sql = "UPDATE users set totalPoints = totalPoints + 1 where Email='" . $row['email'] . "';";
				$conn->query($sql);
			}

			$sql = "DELETE from captchaBuffer where ref='" . $ref . "';";
			$conn->query($sql);

			include 'test.php';
			xmlGenerator($ref, $author1last, $author1first, $author2last, $author2first, $author3last, $author3first, $title, $info_title, $place, $publishing, $year, $descr, $path);
			include 'deleteParts.php';
			deleteP($path, $parts, $conn);
		}
	} else {
		$message = "Ati mai introdus o data date pentru aceasta poza";
	}
	$conn->close();
	header("Content-type: application/json");
	echo json_encode(array("success" => $success, "message" => $message));
	
?>