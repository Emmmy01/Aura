<?php
// process_order.php

// Database configuration
$host = "localhost"; // Update with your database host
$dbname = "integration";    // Your database name
$username = "root";  // Your database username
$password = "";      // Your database password

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture order details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $total = $_POST['total'];
    $items = $_POST['items'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO orders (name, address, phone, total, items) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $address, $phone, $total, $items);

    // Execute the statement
    if ($stmt->execute()) {
        // Send email notification
        $to = "your_email@example.com"; // Replace with your email
        $subject = "New Order from $name";
        $message = "You have received a new order:\n\n";
        $message .= "Name: $name\n";
        $message .= "Address: $address\n";
        $message .= "Phone: $phone\n";
        $message .= "Total: ₦$total\n";
        $message .= "Items:\n$items\n";

        // Headers
        $headers = "From: no-reply@yourdomain.com\r\n"; // Change as needed

        // Send email
        mail($to, $subject, $message, $headers);

        // Return success response
        echo json_encode(["status" => "success", "message" => "Order placed successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error processing order."]);
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>
