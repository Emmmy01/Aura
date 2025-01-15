<?php

require_once "paystackConfig.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $amount = $_POST['amount'];

    $data = [
        'email' => $email,
        'amount' => $amount,
        'callback_url' => 'http://localhost/ecom/testPaystack/verify.php',
    ];

    // Initialize Payment via Paystack
    $response = paystackRequest('transaction/initialize', 'POST', $data);

    if ($response['status'] && isset($response['data']['authorization_url'])) {
        // Redirect user to the payment page
        header('Location: ' . $response['data']['authorization_url']);
        exit();
    } else {
        echo 'Error initializing payment: ' . $response['message'];
    }
}
?>