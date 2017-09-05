<?php
require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer();

                             // Enable verbose debug output

$mail->isSMTP();
$mail->SMTPDebug = 1;  
//$mail->Host = "mail.book-a-book.com";
 
$mail->SMTPAuth = true;            
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->Port = 465;
$mail->Username = 'bookabookofficial@gmail.com';                 // SMTP username
$mail->Password = 'HackADuck93-94';                           // SMTP password
                               // TCP port to connect to

$mail->setFrom('bookabookofficial@gmail.com', 'Book-A-Book');
$mail->addAddress('alexandru.balan0505@gmail.com');               // Name is optional

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}