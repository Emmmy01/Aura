<?php
session_start();
require 'db_connect.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id']; // Get logged-in user ID
    $full_name = $_POST["full_name"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $postal_code = $_POST["postal_code"];
    $is_default = isset($_POST["is_default"]) ? 1 : 0;

    if ($is_default) {
        // Set all other addresses to non-default
        $resetDefault = $conn->prepare("UPDATE user_addresses SET is_default = 0 WHERE user_id = ?");
        $resetDefault->execute([$user_id]);
    }

    $sql = "INSERT INTO user_addresses (user_id, full_name, phone, address, city, state, postal_code, is_default)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user_id, $full_name, $phone, $address, $city, $state, $postal_code, $is_default]);

    echo "<script>alert('Address added successfully!'); window.location.href='manage_addresses.php';</script>";
}
?>
