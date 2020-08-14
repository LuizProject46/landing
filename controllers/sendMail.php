<?php
require './vendor/autoload.php';
//error_reporting(0);


if($_POST[action] == "email"){

  $name = $_POST[name];
  $mail = $_POST[email];
  $subject = $_POST[subject];
  $msg = $_POST[msg];

  $email = new \SendGrid\Mail\Mail();
  $email->setFrom("jane.doe@lgmprojects.com", "Contato LGM Projects");
  $email->setSubject($subject);
  $email->addTo("luizguitar666@gmail.com", "Example User");
 
  $email->addContent(
      "text/html", "<strong>Nome : </strong>{$name}<br><strong>Email : </strong>{$mail} <br> <strong>Mensagem : </strong>{$msg}"
  );
  $sendgrid = new \SendGrid('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');
  try {
      $response = $sendgrid->send($email);
     
      echo 1;
  } catch (Exception $e) {
      echo 'Caught exception: '. $e->getMessage() ."\n";
      echo -1;
  }

}  
 ?>