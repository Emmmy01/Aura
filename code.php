<?php
session_start();
include('dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendmail_verify($name, $email, $verify_token)
{
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true; // Missing in your code
        $mail->Username = "ajibadejerry67@gmail.com";
        $mail->Password = "wdokahugsbunscdx"; // Use App Password if required
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
        $mail->Debugoutput = 'html';           // Display debug output in HTML format


        $mail->setFrom("ajibadejerry67@gmail.com", $name);
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Email Verification From AURA';

        $email_template = "
            <h2>You have Registered With AURA</h2>
            <h5>Verify your email address to login with the below given link</h5>
            <br/><br/>
            <a href='http://localhost:8012/registrations/register-login-with-verivication/verify-email.php?token=$verify_token'> Verify </a>
        ";

        $mail->Body = $email_template;
        $mail->send();
        echo "Email has been sent!";
    } catch (Exception $e) {
        echo "Message could not be sent. Error: {$mail->ErrorInfo}";
    }
 
}

if(isset($_POST['register_btn']))
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify_token = md5(rand());


    //Email exits or not
    $check_email_query = "SELECT email FROM users WHERE email='$email'LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Id already Exists!";
        header("location: sign.php");
    }
    else
    {
        //insert user/ registered data
        $query = "INSERT INTO users (name,phone,email,password,verify_token) VALUES ('$name','$phone','$email','$password','$verify_token')";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            sendmail_verify("$name","$email","$verify_token");
            $_SESSION['status'] = "Almost there! We sent you an email to verify your account";
            header("location: sign.php");
        }
        else
        {
            $_SESSION['status'] = "Registration Failed!";
            header("location: sign.php");

        }
    }

}

    
?>