<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["fullname"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Sender's email address from session
    $to = isset($_SESSION["user_email"]) ? $_SESSION["user_email"] : '';

    // Recipient's email address
    $from_email = "solutionsautotrader@gmail.com";

    // Email headers
    $headers = "From: $from_email\r\n";
    $headers .= "Reply-To: $from_email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";

    // Send email
    $mail_sent = mail($to, $subject, $message, $headers);

    if ($mail_sent) {
        echo "Email sent successfully";
    } else {
        echo "Email sending failed";
    }
}

    // Configure PHP to use Gmail's SMTP server
    ini_set("SMTP", "smtp.gmail.com");
    ini_set("smtp_port", 587);
    ini_set("auth_username", $from_email);
    ini_set("auth_password", ''); // No need to set password here
    ini_set("sendmail_from", $from_email);
    ini_set("smtp_ssl", "tls"); // Enable SSL/TLS encryption

    // Email headers
    $headers = "From: $name <$email>";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent";
        header("Location: contact-us.php");
    } else {
        echo "Email sending failed";
    }

?>
