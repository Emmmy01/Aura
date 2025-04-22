<?php
session_start();
include('db_connect.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

function sendmail_verify($name, $email, $verify_token)
{
    $mail = new PHPMailer(true);

    try { 
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "ajibadejerry67@gmail.com";
        $mail->Password = "wdokahugsbunscdx"; // Use App Password if required
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom("ajibadejerry67@gmail.com", "Mr See Chicken Food");
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Email Verification From Mr See Chicken Food';

        $email_template = "
            <h2>You have Registered With Mr See Chicken Food</h2>
            <h5>Verify your email address to login with the link below:</h5>
            <br/><br/>
            <a href='http://localhost/Mrseechicken/verify-email.php?token=$verify_token'>Verify</a>
        ";

        $mail->Body = $email_template;
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Error: {$mail->ErrorInfo}";
    }
}

if (isset($_POST['register-btn'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $verify_token = md5(rand());

    // **✅ Hash the password before saving**
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['status'] = "Email Id already Exists!";
        header("Location: register.php");
        exit();
    } else {
        // **✅ Save hashed password**
        $query = "INSERT INTO users (name, email, password, verify_token) VALUES ('$name', '$email', '$hashed_password', '$verify_token')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            sendmail_verify($name, $email, $verify_token);
            $_SESSION['status'] = "Almost there! We sent you an email to verify your account";
            header("Location: register.php");
            exit();
        } else {
            $_SESSION['status'] = "Registration Failed!";
            header("Location: register.php");
            exit();
        }
    }
}
?>
