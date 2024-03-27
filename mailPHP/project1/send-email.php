<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../vendor/autoload.php";

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
$email = 'simbingangu@gmail.com';
$password = 'hgwyxexypdncvefj';
$name = $_POST["name"];
$email2 = $_POST["email"];
//$mail1 = "emmanuelskofild@gmail.com";
$subject = $_POST["subject"];
$say = $_POST["message"];
$message = "Thank you for sending us your message, our team we\'ll get back to you. \n Best regard EFTECH";
$message2 = "Name: $name \n Email: $email2 \n Subject: $subject \n Message: $say";

// start here
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = $email;
$mail->Password = $password;
$mail->setFrom($email);
$mail->addAddress($email2);
$mail->Subject = 'EFTECH <NOTIFICATION>';
$mail->Body = $message;

// second one
$mail2 = new PHPMailer(true);
$mail2->isSMTP();
$mail2->Host = 'smtp.gmail.com';
$mail2->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail2->Port = 587;
$mail2->SMTPAuth = true;
$mail2->Username = $email;
$mail2->Password = $password;
$mail2->setFrom($email);
$mail2->addAddress($email);
$mail2->Subject = 'EFTECH <ACKNOWLEDGEMENT OF RECEIPT>';
$mail2->Body = $message2;

if ($mail->send() && $mail2->send()){
    echo "Message sent";
    header("Location: sent.html");
}else{
    echo "error ";
}
} else {
    echo "mistake !!";
}

?>

