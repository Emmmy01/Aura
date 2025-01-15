<?php
// Database configuration
$host = "localhost";
$dbname = "integration"; // Replace with your database name
$username = "root";      // Replace with your MySQL username
$password = "";          // Replace with your MySQL password

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Load PHPMailer classes
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Initialize a message variable
$message = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $total = $_POST['total'];
    $items = $_POST['items'];
    $email = $_POST['email']; // Capture the email input

    // Insert data into the database
    $sql = "INSERT INTO emailorder (name, address, phone, total, item) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $address, $phone, $total, $items);

    if ($stmt->execute()) {
        $message = "Order placed successfully!";
        
        // Send email using PHPMailer
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Use your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'ajibadejerry67@gmail.com'; // Your email
        $mail->Password = 'Jeremiah77#'; // Your email password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption
        $mail->Port = 465; // TCP port to connect to

        $mail->setFrom('ajibadejerry67@gmail.com', 'AURA'); // Sender's email and name
        $mail->addAddress($email); // Add recipient email (customer's email)

        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Order Confirmation';
        $mail->Body    = "Dear $name,<br><br>Your order has been received.<br>Total: $total<br>Items: $items<br><br>Thank you for your purchase!";

        if (!$mail->send()) {
            $message = "Order placed, but could not send confirmation email. Error: " . $mail->ErrorInfo;
        } else {
            $message = "Order placed successfully! Confirmation email sent.";
        }
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
}


// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #080808;
        color: #e4e0e0;
      }

      .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #060606;
        border-radius: 8px;
        box-shadow: 0 2px 2px #1e90ff;
        color: white;
      }

      h1 {
        text-align: center;
        margin-bottom: 20px;
      }

      .form-group {
        margin-bottom: 15px;
      }

      .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
      }

      .form-group input {
        width: 96%;
        padding: 10px;
        border: 1px solid #1e90ff;
        border-radius: 4px;
        font-size: 16px;
        background-color: #080808;
        color: white;
      }

      .cart-items {
        margin-bottom: 20px;
      }

      .cart-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        border-bottom: 1px solid #1e90ff;
        padding-bottom: 10px;
      }

      .cart-item img {
        width: 60px;
        height: 60px;
        margin-right: 10px;
        border-radius: 6px;
      }

      .cart-item .details {
        flex-grow: 1;
      }

      .cart-item .details p {
        margin: 5px 0;
      }

      .summary {
        margin-top: 20px;
        padding: 15px;
        background-color: #1c1c1c;
        border-radius: 8px;
      }

      .summary p {
        font-size: 16px;
        margin: 5px 0;
      }

      .summary p span {
        float: right;
      }

      .summary hr {
        border: 1px solid #1e90ff;
      }

      .checkout-btn {
        width: 100%;
        padding: 15px;
        background-color: #1e90ff;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 18px;
        cursor: pointer;
      }

      .checkout-btn:hover {
        background-color: #3997f5;
      }

      footer {
        text-align: center;
        margin-top: 20px;
        font-size: 14px;
        color: #888;
      }
    </style>
</head>
<body>
     <div class="container" action="process_order.php" method="POST">
      <h1>Checkout</h1>

      <div class="cart-items" id="cart-items">
        <!-- Cart items will be rendered here -->
      </div>

      <div class="summary" id="summary">
        <p>Subtotal: <span id="subtotal">₦0.00</span></p>
        <p>Tax: <span id="tax">₦0.00</span></p>
        <hr />
        <p>Total: <span id="total">₦0.00</span></p>
      </div>

      <form id="checkout-form">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" placeholder="Enter your name" required />
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input
            type="email"
            id="email"
            placeholder="Enter your email"
            required
          />
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input
            type="text"
            id="address"
            placeholder="Enter your address"
            required
          />
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input
            type="text"
            id="phone"
            placeholder="Enter your phone number"
            required
          />
        </div>
        <button type="submit" class="checkout-btn">Place Order</button>
      </form>
    </div>

    <footer>&copy; 2025 Aura. All rights reserved.</footer>

        
        <?php if (!empty($message)): ?>
            <div class="message"><?= htmlspecialchars($message); ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
