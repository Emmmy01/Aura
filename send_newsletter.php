<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = $_POST['content'];
    $filename = '';

    // Handle file upload (if an image is provided)
    if (!empty($_FILES['file']['name'])) {
        $filename = 'uploads/' . time() . '_' . basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $filename);
    }

    // Send the newsletter with or without an image
    sendNewsletter($content, $filename);

    echo "Newsletter sent successfully!";
}

function sendNewsletter($content, $filename) {
    require 'db_connect.php';

    $sql = "SELECT email FROM newsletter_subscribers";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "ajibadejerry67@gmail.com"; // Your Gmail
            $mail->Password = "wdokahugsbunscdx"; // Your App Password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
    
            $mail->CharSet = 'UTF-8'; 
            $mail->setFrom('ajibadejerry67@gmail.com', 'MR SEE CHICKEN FOOD');
            $mail->Subject = '🔥 Special Deals Just for You! 🍗';

            while ($row = $result->fetch_assoc()) {
                $email = $row['email'];

                // Embed image only if an image was uploaded
                if (!empty($filename) && file_exists($filename)) {
                    $mail->AddEmbeddedImage($filename, 'newsletter_image', basename($filename));
                    $image_html = "<br><br><img src='cid:newsletter_image' width='300'>";
                } else {
                    $image_html = "";
                }

                // Unsubscribe link
                $unsubscribe_link = "https://yourwebsite.com/unsubscribe.php?email=" . urlencode($email);
                
                // Final email content
                $message =  $image_html . $content . "<br><p><a href='$unsubscribe_link'>Unsubscribe</a></p>";

                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Body = $message;
                $mail->send();
                $mail->clearAddresses();
            }

            echo "Newsletter sent successfully!";
        } catch (Exception $e) {
            echo "Error sending email: " . $mail->ErrorInfo;
        }
    }
}
?>

?>


