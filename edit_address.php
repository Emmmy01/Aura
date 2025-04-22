<?php
session_start();
require 'db_connect.php';

if (!isset($_GET['id'])) {
    die("Address not found.");
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM user_addresses WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id, $user_id]);
$address = $stmt->fetch();

if (!$address) {
    die("Invalid address.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $phone = $_POST["phone"];
    $address_text = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $postal_code = $_POST["postal_code"];
    $is_default = isset($_POST["is_default"]) ? 1 : 0;

    if ($is_default) {
        $resetDefault = $conn->prepare("UPDATE user_addresses SET is_default = 0 WHERE user_id = ?");
        $resetDefault->execute([$user_id]);
    }

    $sql = "UPDATE user_addresses SET full_name = ?, phone = ?, address = ?, city = ?, state = ?, postal_code = ?, is_default = ? WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$full_name, $phone, $address_text, $city, $state, $postal_code, $is_default, $id, $user_id]);

    echo "<script>alert('Address updated successfully!'); window.location.href='manage_addresses.php';</script>";
}
?>
<form method="POST">
    <label>Full Name</label>
    <input type="text" name="full_name" value="<?= $address['full_name'] ?>" required>

    <label>Phone</label>
    <input type="text" name="phone" value="<?= $address['phone'] ?>" required>

    <label>Address</label>
    <textarea name="address" required><?= $address['address'] ?></textarea>

    <label>City</label>
    <input type="text" name="city" value="<?= $address['city'] ?>" required>

    <label>State</label>
    <input type="text" name="state" value="<?= $address['state'] ?>" required>

    <label>Postal Code</label>
    <input type="text" name="postal_code" value="<?= $address['postal_code'] ?>" required>

    <label>Set as Default</label>
    <input type="checkbox" name="is_default" <?= $address['is_default'] ? 'checked' : '' ?>>

    <button type="submit">Update Address</button>
</form>
