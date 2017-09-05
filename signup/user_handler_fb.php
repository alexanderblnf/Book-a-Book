<?php 

 	require_once "../config.php";
 	require '../PHPMailer-master/PHPMailerAutoload.php';
 	
	$first_name = $_POST['firstname'];
	$last_name = $_POST['lastname'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$token = md5($email . $first_name);
	
	
	$result = false;
	$message = "There was an error inserting the user";
	$sql = "SELECT * FROM users where Email='" . $email . "';";
	$result = $conn->query($sql);
	$nr = (int)mysqli_num_rows($result);

	if($nr > 0){
		$result = false;
		$message = "Acest utilizator exista deja";
	} else {
		$sql = "INSERT INTO users (Lastname, Firstname, Email, Gender, Token) VALUES ('" . $last_name .  "', '" . $first_name . "', '" . $email . "','" . $gender . "', '" . $token . "');";
		$conn->query($sql);
		$result = $conn->insert_id;
		if($result >= 0){
			$result = true;
		}
		else
			$result = false;
		
		if($result == true){
			$mail = new PHPMailer();

			$mail->isSMTP();
			 
			$mail->SMTPAuth = true;            
			$mail->SMTPSecure = 'ssl';
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->Port = 465;
			$mail->Username = 'bookabookofficial@gmail.com';                 // SMTP username
			$mail->Password = 'HackADuck93-94';                           // SMTP password
			                               // TCP port to connect to
			
			$mail->setFrom('bookabookofficial@gmail.com', 'Book-A-Book');
			$mail->addAddress($email);               // Name is optional
			
			$mail->isHTML(true);                                  // Set email format to HTML
			
			$mail->Subject = 'Welcome to Book-a-Book!';
			$mail->Body    = 'Your account has been successfully created. Welcome!';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			
			$mail->send();
		}
	}
	header('Content-Type: application/json', true);
	echo json_encode(array("success" => $result, 'message' => $message, 'token' => $token));
?>