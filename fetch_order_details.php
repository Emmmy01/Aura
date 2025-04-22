<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];

    $stmt = $conn->prepare("SELECT * FROM orders WHERE id = ?");
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $order = $result->fetch_assoc();

    if ($order) {
        echo "<p><strong>Order ID:</strong> " . $order['id'] . "</p>";
        echo "<p><strong>Name:</strong> " . $order['name'] . "</p>";
        echo "<p><strong>Email:</strong> " . $order['email'] . "</p>";
        echo "<p><strong>Phone:</strong> " . $order['phone'] . "</p>";
        echo "<p><strong>Delivery Method:</strong> " . $order['delivery_method'] . "</p>";
        echo "<p><strong>Pickup Location:</strong> " . $order['pickup_location'] . "</p>";
        echo "<p><strong>Address:</strong> " . $order['address'] . "</p>";
        echo "<p><strong>Total:</strong> ₦" . number_format($order['total'], 2) . "</p>";
        echo "<p><strong>Order Summary:</strong> " . $order['order_summary'] . "</p>";
        echo "<p><strong>Order Time:</strong> " . $order['created_at'] . "</p>";
        echo "<p><strong>Status:</strong> " . $order['status'] . "</p>";
    } else {
        echo "<p>Order not found.</p>";
    }
}
?>
