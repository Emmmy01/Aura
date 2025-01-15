<?php
require_once "paystackConfig.php";

if (isset($_GET['reference'])) {
    $reference = $_GET['reference'];

    // Verify the transaction using Paystack
    $response = paystackRequest('transaction/verify/' . $reference);

    if ($response['status'] && $response['data']['status'] === 'success') {
        echo 'Payment was successful!';
    } else {
        echo 'Payment failed or was not verified.';
    }
}
?>