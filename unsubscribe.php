<?php
include 'db_connect.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $stmt = $conn->prepare("DELETE FROM newsletter_subscribers WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    echo "You have been unsubscribed successfully.";
}
?>
