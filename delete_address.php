<?php
session_start();
if (!isset($_SESSION['auth_user'])) {
    die("Unauthorized access!");
}

if (!isset($_GET['id'])) {
    die("Invalid request!");
}

$addressId = intval($_GET['id']);  

$host = "localhost";
$dbname = "mrseechickenfood"; 
$username = "root"; 
$password = "";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete the address
$stmt = $conn->prepare("DELETE FROM saved_addresses WHERE id = ?");
$stmt->bind_param("i", $addressId);
if ($stmt->execute()) {
    echo "Address deleted successfully!";
} else {
    echo "Failed to delete address!";
}
$stmt->close();
$conn->close();
?>
