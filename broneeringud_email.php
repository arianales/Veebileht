<?php
header('Content-type: text/html; charset=utf-8');
$name = $_POST["fname"];
$email = $_POST["kontakt"];
$muuinf = $_POST["muuinf"];
$kus = $_POST["kus"];
$kuupäev = $_POST["kuupäev"];
$soov2 = $_POST["soov2"];
$soov3 = $_POST["soov3"];

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

$mail->Nimi = $name;
$mail->Kontakt = $email;
$mail ->Kus= $kus;

$mail->Kuupäev = $kuupäev;

$mail->Soov = $soov2;
$mail->Soov = $soov3;

$mail->Body = $muuinf;


$mail->send();

echo'
   <script>
   window.onload = function() {
      alert("Saime Teie broneeringu kätte, vastame esimesel võimalusel!");  
      location.href = "broneeringud.html";
   }
   </script>
';
?>