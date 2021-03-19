<?php

class Email_handler extends CI_Controller{

  function  __construct(){
    parent::__construct();
  }

  public function send($to, $subject, $message){
    // Load PHPMailer library
    $this->load->library('phpmailer_lib');

    // PHPMailer object
    $mail = $this->phpmailer_lib->load();

    // SMTP configuration
    $mail->isSMTP();
    $mail->SMTPDebug  = 1;
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = 'mail.mamamoorental@gmail.com';
    $mail->Password   = 'mamamoorental123';

    $mail->setFrom('mamamoorental@gmail.com','no-reply - MAMAMOORENTAL');
    $mail->addReplyTo('mamamoorental@gmail.com','no-reply - MAMAMOORENTAL');

    // Add a recipient
    $mail->addAddress($to);

    // Email subject
    $mail->Subject = $subject;

    // Set email format to HTML
    $mail->isHTML(true);
    // Email body content
    $mail->Body = $message;

    // Send email
    if(!$mail->send()){
      echo 'Message could not be sent. <br>';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
      echo '<br>Contact ADMIN ';
      die();
    }else{
      return true;
    }
  }

}

?>
