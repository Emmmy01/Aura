<?php
session_start();
header("Content-Type: application/json");

if (!isset($_GET['reference'])) {
    echo json_encode(["status" => "failed", "message" => "No reference supplied"]);
    exit;
}

$reference = $_GET['reference'];
$paystack_secret_key = "sk_test_7fab4f7a29ecf952b62aaa1ef61405b5ddc03e1a";

$verify_url = "https://api.paystack.co/transaction/verify/" . $reference;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $verify_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $paystack_secret_key",
    "Cache-Control: no-cache"
]);

$response = curl_exec($ch);
curl_close($ch);
$result = json_decode($response, true);

if ($result['status'] && $result['data']['status'] === 'success') {
    // Payment was successful, clear the cart in PHP
    unset($_SESSION['cart']);

    echo json_encode(["status" => "success", "redirect" => "thank_you.html"]);
    exit;
} else {
    echo json_encode(["status" => "failed", "message" => "Payment verification failed"]);
    exit;
}
?>
