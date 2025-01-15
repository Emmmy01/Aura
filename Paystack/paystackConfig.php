<?php

define('PAYSTACK_SECRET_KEY', 'sk_test_a3289413dcbc4608f2a5cfb116ce46f759fc4c64'); // Replace with your actual secret key

// The Paystack API URL
define('PAYSTACK_URL', 'https://api.paystack.co/');

function paystackRequest($endpoint, $method = 'GET', $data = []) {
    $ch = curl_init();
    
    // Prepare the data
    $headers = [
        'Authorization: Bearer ' . PAYSTACK_SECRET_KEY,
        'Content-Type: application/json'
    ];

    curl_setopt($ch, CURLOPT_URL, PAYSTACK_URL . $endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    }

    $response = curl_exec($ch);

    if ($response === false) {
        return 'Error: ' . curl_error($ch);
    }

    curl_close($ch);
    return json_decode($response, true);
}
?>