<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Fetch subscribers
$sql = "SELECT email FROM newsletter_subscribers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $emails = [];
    while ($row = $result->fetch_assoc()) {
        $emails[] = $row['email'];
    }

    $mail = new PHPMailer(true);

    try {
        // SMTP Setup
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "ajibadejerry67@gmail.com"; // Your Gmail
        $mail->Password = "wdokahugsbunscdx"; // Your App Password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;


        // Email Content
        $mail->setFrom('your-email@gmail.com', 'MR SEE CHICKEN FOOD');
        $mail->Subject = '🔥 Special Offer for You! 🍗';
        $message = "Hello! Check out our latest meals & deals at https://mrseechickenfood.com/menu 🥘";

        foreach ($emails as $email) {
            $mail->addAddress($email);
            $mail->Body = $message;
            $mail->send();
            $mail->clearAddresses();
        }

        echo "Automated newsletter sent!";
    } catch (Exception $e) {
        echo "Error sending email: " . $mail->ErrorInfo;
    }
} else {
    echo "No subscribers found.";
}

$conn->close();
?>
