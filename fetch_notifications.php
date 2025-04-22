<?php
session_start();
include 'db_connection.php'; // Connect to your database

$user_id = $_SESSION['user_id']; // Ensure user is logged in
$query = "SELECT COUNT(*) AS count FROM notifications WHERE user_id = ? AND status = 'unread'";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();

echo json_encode(['count' => $result['count']]);
?>
