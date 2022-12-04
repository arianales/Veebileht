<?php
header('Content-type: text/html; charset=utf-8');
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "kohvik.delta@gmail.com";
$mail->Password = "zzouwoqzlkdoulsb";

$mail->setFrom($email, $name);
$mail->addAddress("kohvik.delta@gmail.com");

$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();

echo'
   <script>
   window.onload = function() {
      alert("Saime Su sõnumi kätte, vastame esimesel võimalusel!");
      location.href = "uusform.html";  
   }
   </script>
';