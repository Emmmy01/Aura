<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$host = "localhost";
$dbname = "mrseechickenfood"; // Replace with your database name
$username = "root";      // Replace with your MySQL username
$password = "";          // Replace with your MySQL password

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$response = ["status" => "error", "message" => ""];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $delivery_method = $_POST['delivery-method'] ?? '';
    $address = $_POST['address'] ?? '';
    $pickup_location = $_POST['pickup-location'] ?? '';
    $order_summary = $_POST['order-summary'] ?? '';
    $total = isset($_POST['total']) ? (float) $_POST['total'] : 0.00;

    // Determine the final delivery address
    if ($delivery_method == "pickup") {
        $final_address = "Pickup at: " . ($pickup_location == "station1" ? "Second Gate Opposite Q09 Hotel" : "Small Gate Opposite Uncle K Hostel");
    } else {
        $final_address = $address; // Home delivery address
    }

    // Insert order into the database
    $sql = "INSERT INTO orders (name, email, phone, total, delivery_method, pickup_location, address, order_summary) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $name, $email, $phone, $total, $delivery_method, $pickup_location, $address, $order_summary);

    if ($stmt->execute()) {
        // ✅ Save the address if it's new
        if ($delivery_method == "delivery" && !empty($address)) {
            $check_stmt = $conn->prepare("SELECT id FROM saved_addresses WHERE email = ? AND address = ?");
            $check_stmt->bind_param("ss", $email, $address);
            $check_stmt->execute();
            $check_stmt->store_result();

            if ($check_stmt->num_rows == 0) {
                // Address does not exist, save it
                $save_stmt = $conn->prepare("INSERT INTO saved_addresses (email, address) VALUES (?, ?)");
                $save_stmt->bind_param("ss", $email, $address);
                $save_stmt->execute();
                $save_stmt->close();
            }

            $check_stmt->close();
        }

        // ✅ Send order confirmation email using PHPMailer (same as before)
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ajibadejerry67@gmail.com';
            $mail->Password = 'wdokahugsbunscdx'; // Use an App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('ajibadejerry67@gmail.com', 'MR SEE CHICKEN FOOD');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Order Confirmation - MR SEE CHICKEN FOOD';
            $mail->Body = "
                <div style='font-family: Arial, sans-serif; color: #333; background-color: #f4f4f4; padding: 20px;'>
                    <h1 style='text-align: center; color: #FFD700;'>Order Confirmation</h1>
                    <p>Dear <strong>$name</strong>,</p>
                    <p>Thank you for your purchase! Your order has been successfully received.</p>
                    <h2 style='font-size: 18px; color: #333;'>Order Summary</h2>
                    <table style='width: 100%; border-collapse: collapse;'>
                        <tr style='background-color: #f9f9f9;'>
                            <th style='text-align: left; padding: 10px;'>Item</th>
                            <th style='text-align: right; padding: 10px;'>Total</th>
                        </tr>
                        <tr>
                            <td style='padding: 10px;'>$order_summary</td>
                            <td style='text-align: right; padding: 10px;'>₦" . number_format((float) $total, 2) . "</td>
                        </tr>
                    </table>
                    <p><strong>Delivery Address:</strong> " . ($address ? $address : "Pickup Selected") . "</p>
                    <p>We will contact you shortly for delivery or pickup arrangements.</p>
                    <p style='text-align: center;'><a href='http://localhost/mrseechickenfood/' style='color: white; background: #FFD700; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Shop More</a></p>
                    <p>For any inquiries, contact us at <a href='mailto:support@mrseechickenfood.com'>support@mrseechickenfood.com</a>.</p>
                </div>
            ";

            $mail->send();
            $response["status"] = "success";
            $response["message"] = "Success";
        } catch (Exception $e) {
            $response["status"] = "error";
            $response["message"] = "Order placed, but email failed: " . $mail->ErrorInfo;
        }
    } else {
        $response["status"] = "error";
        $response["message"] = "Error saving order: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
echo json_encode($response);
?>
