<?php
// Allow cross-origin requests
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Replace with your Paystack secret key
$paystack_secret_key = "sk_test_7fab4f7a29ecf952b62aaa1ef61405b5ddc03e1a";

// Get user details from the request
$data = json_decode(file_get_contents("php://input"), true);
$name = $data["name"];
$email = $data["email"];
$amount = $data["amount"]; // Already in kobo

// Paystack API endpoint
$url = "https://api.paystack.co/transaction/initialize";

$fields = [
    "email" => $email,
    "amount" => $amount,
    "callback_url" => "http://127.0.0.1:3000/payment_callback.php",
    "metadata" => ["payerName" => $name]
];

$fields_string = http_build_query($fields);

// Initialize cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $paystack_secret_key",
    "Cache-Control: no-cache",
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute request and get response
$result = curl_exec($ch);
curl_close($ch);
// Check if payment was successful
if ($result['status'] && $result['data']['status'] === 'success') {
    $amount_paid = $result['data']['amount'] / 100; // Convert from kobo
    $payer_email = $result['data']['customer']['email'];

    // ✅ Clear cart using JavaScript
    echo "<script>
        localStorage.removeItem('cart'); 
        sessionStorage.removeItem('cart'); 
    </script>";

    // ✅ Display a success message
    echo "<h2>✅ Payment Successful! 🎉</h2>";
    echo "<p>Amount Paid: ₦" . $amount_paid . "</p>";
    echo "<p>Payer Email: " . $payer_email . "</p>";
    echo "<p><a href='index.php'>Return to Home</a></p>";
} else {
    echo "<h2>❌ Payment Verification Failed.</h2>";
    echo "<p>Please contact support if your payment was deducted.</p>";
}
// Return JSON response
echo $result;
?>
