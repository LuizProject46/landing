<?php
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//error_reporting(0);


if($_POST[action] == "email"){

  $name = $_POST[name];
  $email = $_POST[email];
  $subject = $_POST[subject];
  $msg = $_POST[msg];


  $mail = new PHPMailer(true);
 
try {
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'smtp.umbler.com ';
	$mail->SMTPAuth = true;
	$mail->Username = 'lgmprj@lgmprojects';
	$mail->Password = "7cz?UBkk5O_U";//'luizproject46';
	$mail->Port = 587 ;
	$mail->setFrom('lgmprj@lgmprojects');
	$mail->addAddress('lgmprj@lgmprojects');
	
  $mail->smtpConnect(
    array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
        )
    )
);
	$mail->isHTML(true);
	$mail->Subject = $subject;
	$mail->Body = $msg;
	$mail->AltBody = 'Chegou o email';
 
	if($mail->send()) {
		echo 1;
	} else {
		echo -1;
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}
}  
 ?>