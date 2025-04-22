<?php
include 'db_connect.php'; // Database connection
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $event_type = $_POST['event_type'];
    $guests = $_POST['guests'];
    $preferred_dishes = $_POST['preferred_dishes'];
    $event_date = $_POST['event_date'];
    $special_requests = $_POST['special_requests'];

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO catering_quotes (name, email, phone, event_type, guests, preferred_dishes, event_date, special_requests) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssisss", $name, $email, $phone, $event_type, $guests, $preferred_dishes, $event_date, $special_requests);
    if($stmt->execute()) {
        // Send confirmation email to customer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "ajibadejerry67@gmail.com"; // Your Gmail
            $mail->Password = "wdokahugsbunscdx"; // Your App Password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('ajibadejerry67@gmail.com', 'MR SEE CHICKEN FOOD');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Catering Quote Request Received';
            $mail->Body = "<h3>Dear $name,</h3>
                           <p>Thank you for requesting a catering quote. We will review your request and get back to you soon.</p>
                           <p><strong>Event Type:</strong> $event_type</p>
                           <p><strong>Number of Guests:</strong> $guests</p>
                           <p><strong>Preferred Dishes:</strong> $preferred_dishes</p>
                           <p><strong>Event Date:</strong> $event_date</p>
                           <p>We will contact you at <strong>$phone</strong> for further details.</p>
                           <p>Best Regards, <br> MR SEE CHICKEN FOOD</p>";

            $mail->send();
            
            // Return success response
            echo json_encode(['success' => true, 'message' => 'Your quote request has been submitted!']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Error inserting the quote into the database.']);
    }
}
?>
