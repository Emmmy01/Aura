<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$host = "localhost";
$dbname = "mrseechickenfood"; // Your database name
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user ID from the request
$userId = $_GET['id'] ?? '';

if (!empty($userId)) {
    $stmt = $conn->prepare("SELECT address FROM saved_addresses WHERE user_id = ?");  // ✅ Use user_id instead of email
    $stmt->bind_param("i", $userId); // ✅ Bind as integer
    $stmt->execute();
    $result = $stmt->get_result();

    $addresses = [];
    while ($row = $result->fetch_assoc()) {
        $addresses[] = $row['address'];
    }

    echo json_encode($addresses);
    $stmt->close();
}

$conn->close();
?>
