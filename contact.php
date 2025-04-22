<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "ajibadejerry67@gmail.com"; // Your Gmail
        $mail->Password = "wdokahugsbunscdx"; // Your App Password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom($email, $name);
        $mail->addAddress('ajibadejerry67@gmail.com'); 

        $mail->Subject = "New Contact Form Message";
        $mail->Body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        $mail->send();
        echo "<script>alert('Message sent successfully!'); window.location.href='contact.html';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Failed to send message: " . $mail->ErrorInfo . "'); window.location.href='contact.html';</script>";
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href='contact.html';</script>";
}
?>
