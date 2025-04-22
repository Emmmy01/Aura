<?php
// Get the transaction reference
if (!isset($_GET['reference'])) {
    die("Invalid access. No reference provided.");
}

$reference = $_GET['reference']; // Payment reference from Paystack

// Your Paystack secret key
$paystack_secret_key = "sk_test_7fab4f7a29ecf952b62aaa1ef61405b5ddc03e1a";


// Paystack API endpoint for verifying the payment
$verify_url = "https://api.paystack.co/transaction/verify/" . $reference;

// Initialize cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $verify_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $paystack_secret_key",
    "Cache-Control: no-cache"
]);

// Execute request
$response = curl_exec($ch);
curl_close($ch);

// Decode JSON response
$result = json_decode($response, true);

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
?>
