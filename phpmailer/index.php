<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoload file
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';

// Create a new PHPMailer instance
$mail = new PHPMailer();

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["fullname"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Sender's email address from session
    $to = isset($_SESSION["user_email"]) ? $_SESSION["user_email"] : '';

    // Server settings
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                 // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                             // Enable SMTP authentication
    $mail->Username   = 'solutionsautotrader@gmail.com';  // SMTP username
    $mail->Password   = 'aiqm uvga xsot jhfd';            // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                              // TCP port to connect to

    // Recipients
    $mail->setFrom('solutionsautotrader@gmail.com', 'autotrader_solutions');
    $mail->addAddress($email, $name);  // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    
    // Send the email
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
        header("Location: ../contact-us.php");
    }
}
?>