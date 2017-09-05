<?php 

 	require_once "../config.php";
 	require '../PHPMailer-master/PHPMailerAutoload.php';
 	
	$email = $_POST['email'];
	$sql = "SELECT * from users where Email='" . $email . "'";
	$result = $conn->query($sql);
	$user = mysqli_fetch_assoc($result);
	$first_name = $user['Firstname'];
	$token = md5($email . $first_name);
	$message = 'Error!';
	if(!isset($first_name))
		$result = false;
	else
		$result = true;
	

	if($result == true){
		$mail = new PHPMailer();
	
	                             // Enable verbose debug output
	
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
		
		$mail->Subject = 'Recover your password';
		$mail->Body    = 'Recovery link: http://bookathon.bibnat.ro/passwordfb?token=' . $token;
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		
		$mail->send();
	}
	header('Content-Type: application/json', true);
	echo json_encode(array("success" => $result, 'message' => $message, 'token' => $token, 'email' => $email));
?>
