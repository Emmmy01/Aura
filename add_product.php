<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "mrseechickenfood";

// Connect to DB
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $details_page = $_POST["details_page"];
    $rating = $_POST["rating"];

    // Handle Image Upload
    $image = $_FILES["image"]["name"];
    $target = "uploads/" . basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target);

    // Insert into DB
    $stmt = $conn->prepare("INSERT INTO products (name, image, price, details_page, rating) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdsi", $name, $image, $price, $details_page, $rating);
    
    if ($stmt->execute()) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
