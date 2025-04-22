<?php
session_start();
include('db_connect.php');

if (!isset($_SESSION['auth_user'])) {
    echo 0;
    exit();
}

$user_id = $_SESSION['auth_user']['id'];

// Fetch unread notifications count
$query = "SELECT COUNT(*) AS unread_count FROM notifications WHERE (user_id IS NULL OR user_id = $user_id) AND status = 'unread'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$unread_count = $data['unread_count'];

// If there are unread notifications, mark them as read
if ($unread_count > 0) {
    $update_query = "UPDATE notifications SET status = 'read' WHERE (user_id IS NULL OR user_id = $user_id) AND status = 'unread'";
    mysqli_query($conn, $update_query);
}

echo $unread_count; // Return the count before marking them as read
?>
