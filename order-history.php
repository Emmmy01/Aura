<?php

include('db_connect.php');
include 'authentication.php';

$user_email = $_SESSION['email']; // Assuming user is logged in and email is stored in session

$query = "SELECT * FROM orders WHERE email='$user_email' ORDER BY created_at DESC";
$query_run = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History | Mr See Chicken Food</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }
        body {
            background-color: #f4f6f9;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .order-card {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 15px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.05);
            border-left: 5px solid #ccc;
        }
        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .order-header span {
            font-size: 14px;
            color: #666;
        }
        .order-details {
            font-size: 14px;
            color: #444;
            line-height: 1.6;
        }
        .order-details strong {
            color: #222;
        }
        .status {
            font-size: 13px;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 5px;
            display: inline-block;
        }
        .status.pending {
            background-color: #ffcc00;
            color: #fff;
        }
        .status.completed {
            background-color: #28a745;
            color: #fff;
        }
        .status.cancelled {
            background-color: #dc3545;
            color: #fff;
        }
        .no-orders {
            text-align: center;
            color: #777;
            padding: 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2> Order History</h2>

    <?php
    if(mysqli_num_rows($query_run) > 0) {
        while($order = mysqli_fetch_assoc($query_run)) {
            // Determine status class
            $status_class = strtolower($order['status']);
            echo "<div class='order-card' style='border-left-color: " . ($status_class == "completed" ? "#28a745" : ($status_class == "pending" ? "#ffcc00" : "#dc3545")) . ";'>";
            echo "<div class='order-header'>";
            echo "<h3 style='font-size: 16px;'>Order #" . $order['id'] . "</h3>";
            echo "<span class='status $status_class'>" . ucfirst($order['status']) . "</span>";
            echo "</div>";
            echo "<div class='order-details'>";
            echo "<p><strong>Name:</strong> " . $order['name'] . "</p>";
            echo "<p><strong>Phone:</strong> " . $order['phone'] . "</p>";
            echo "<p><strong>Delivery Method:</strong> " . ucfirst($order['delivery_method']) . "</p>";
            if ($order['delivery_method'] == 'delivery') {
                echo "<p><strong>Address:</strong> " . $order['address'] . "</p>";
            } else {
                echo "<p><strong>Pickup Location:</strong> " . $order['pickup_location'] . "</p>";
            }
            echo "<p><strong>Order Summary:</strong> " . $order['order_summary'] . "</p>";
            echo "<p><strong>Total Price:</strong> ₦" . number_format($order['total'], 2) . "</p>";
            echo "<p><strong>Order Time:</strong> " . date('F d, Y h:i A', strtotime($order['created_at'])) . "</p>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p class='no-orders'>😞 No orders found.</p>";
    }
    ?>
</div>

</body>
</html>
