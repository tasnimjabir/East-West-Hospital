<?php 
require 'auth/PHPMailer-master/src/PHPMailer.php';
require 'auth/PHPMailer-master/src/SMTP.php';
require 'auth/PHPMailer-master/src/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'shadmanshakibdip18@gmail.com';
$mail->Password = 'gddo zbef hjjv nntv';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('shadmanshakibdip18@gmail.com', 'Email-sender');
$mail->addAddress('diprzs18@gmail.com');

$mail->isHTML(true);
$mail->Subject = 'Verify Your Email';
$mail->Body = "Jabir";

$mail->send();
?>