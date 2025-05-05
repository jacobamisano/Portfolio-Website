<?php

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$feedback = $_POST["feedback"];

require "vendor\autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
//app password = "nzqr jqls wwsd dluw"
// Host name = smtp.gmail.com
// Name = Dummy Gmail
// username = jacob.portfolio.mailserver@gmail.com
// SMTP password = 
$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->Username = "jacob.portfolio.mailserver@gmail.com";
$mail->Password = "nzqr jqls wwsd dluw";

$mail->setFrom("jacob.portfolio.mailserver@gmail.com", $name);
$mail->addAddress($email, $name);
$mail->addAddress("jacob.portfolio.mailserver@gmail.com", "Jacob");
$mail->addCC($email, $name);

$mail->Subject = $subject;
$mail->Body = $feedback;

if (!$mail->send()) {
    echo 'Email not sent. An error was encountered: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent.';
}

$mail->smtpClose();
