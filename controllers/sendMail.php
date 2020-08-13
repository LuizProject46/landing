<?php
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//error_reporting(0);


if($_POST){

  $name = $_POST[name];
  $email = $_POST[email];
  $subject = $_POST[subject];
  $msg = $_POST[msg];


  $mail = new PHPMailer(true);
 
try {
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'luizguitar666@gmail.com';
	$mail->Password = 'luizproject46';
	$mail->Port = 587;
  $mail->SMTPSecure = 'ssl';
  //$mail->Port = 465;
	$mail->setFrom('luizguitar666@gmail.com');
	$mail->addAddress('luizguitar666@gmail.com');
	
 
	$mail->isHTML(true);
	$mail->Subject = $subject;
	$mail->Body = $msg;
	$mail->AltBody = 'Chegou o email';
 
	if($mail->send()) {
		echo 'Email enviado com sucesso';
	} else {
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}
}  
 ?>