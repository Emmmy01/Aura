<?php
include 'db_connect.php';


$result = $conn->query("SELECT * FROM orders ORDER BY created_at DESC");

$orders = [];
while ($row = $result->fetch_assoc()) {
    $orders[] = $row;
}

echo json_encode($orders);
?>
