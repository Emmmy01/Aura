Sure! Below is a sample markdown documentation that you can share with your programmer friend to help them implement Paystack in PHP.

```markdown
# Paystack Integration in PHP

This documentation will guide you through integrating Paystack payment gateway into your PHP application. Paystack allows businesses in Africa to accept online payments from customers. You will need to make use of their API to process payments, verify transactions, and more.

## Requirements

Before you begin, ensure you have:

1. A Paystack account: [Sign up on Paystack](https://www.paystack.com)
2. PHP 7.0+ installed on your server.
3. Composer for dependency management (optional, but recommended).
4. An HTTPS-enabled server (Paystack requires secure connections).
5. A basic understanding of PHP and HTTP requests.

## Step 1: Install Paystack SDK (Optional)

You can use Paystack's official PHP SDK for a more seamless integration. To install it, use Composer:

```bash
composer require paystack/paystack-php
```

Alternatively, you can manually handle API requests using `cURL` or `file_get_contents`, but using the SDK is highly recommended as it simplifies the process.

# Using CURL

## Step 2: Get Paystack API Keys

1. Log into your Paystack dashboard at [Paystack Dashboard](https://dashboard.paystack.com).
2. Navigate to the **API Keys & Webhooks** section under **Settings**.
3. Copy your **Live Secret Key** for production or **Test Secret Key** for testing purposes.

## Step 3: Configure the Paystack API Client

### Example configuration for using the Paystack API:

```php
<?php

define('PAYSTACK_SECRET_KEY', 'your-paystack-secret-key'); // Replace with your actual secret key

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
```

## Step 4: Create a Payment Page

Create a simple form to allow the user to make payments. This example collects the amount to be paid:

```php
<form action="payment.php" method="POST">
    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email" required>

    <label for="amount">Amount (in kobo):</label>
    <input type="number" id="amount" name="amount" required>

    <button type="submit">Pay</button>
</form>
```

## Step 5: Initialize Payment (Create a Transaction)

In `payment.php`, you will need to initiate a payment by creating a transaction via Paystack’s API.

```php
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $amount = $_POST['amount'];

    $data = [
        'email' => $email,
        'amount' => $amount,
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
```

### Explanation:

- `email`: The customer's email address.
- `amount`: The amount to be charged, in kobo (1 NGN = 100 kobo).
- `transaction/initialize`: Paystack API endpoint to initialize a payment.
- After initializing the payment, Paystack returns an `authorization_url` where the user will complete the payment.

## Step 6: Handle Payment Verification

Once the user completes the payment on Paystack, Paystack will redirect them back to your site with a `reference` parameter. You need to verify the transaction using this reference.

```php
<?php

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
```

### Explanation:

- The `verify/` endpoint is used to check if the payment was successful.
- If the transaction was successful, you can update your database or perform other actions.

## Step 7: Handling Errors

If the payment request fails (e.g., insufficient funds, invalid details), you will need to handle errors properly by displaying appropriate messages to the user.

```php
<?php

$response = paystackRequest('transaction/initialize', 'POST', $data);

if (!$response['status']) {
    echo 'Error: ' . $response['message'];
} else {
    // Continue with the process
}
?>
```

## Step 8: Test Your Integration

Paystack offers a **Test Mode** to test your integration before going live. You can use the test API keys and use the following test cards:

- **Visa**: `4084084084084081`
- **Mastercard**: `5520488282323435`
- **Expiration Date**: Any future date.
- **CVV**: `123`

To enable **Test Mode** in the Paystack dashboard, go to **Settings > API Keys & Webhooks** and switch to **Test Mode**.

## Step 9: Go Live

Once you've successfully tested the integration, switch to **Live Mode** in your Paystack Dashboard and replace the test secret key with your live secret key in the code.

## Conclusion

You have now successfully integrated Paystack into your PHP application! You can explore more Paystack API features such as refunds, customer management, etc., by checking out the official Paystack API documentation: [Paystack API Docs](https://paystack.com/docs/).

Good luck with your integration, and happy coding!

### Key Points:
- Replace `'your-paystack-secret-key'` with your actual Paystack secret key.
- Ensure to handle errors and verify transactions after successful payment.
- For production, switch to live API keys once you've tested everything successfully.


# Using paystack sdk

Sure! Here's an example of how to use the **Paystack SDK** in PHP to integrate payment processing.

First, you will need to install the Paystack SDK via Composer, as mentioned earlier:

```bash
composer require paystack/paystack-php
```

Then, you can follow the steps below.

### Step 1: Configuration

Create a configuration file to store the Paystack secret key.

**config.php:**

```php
<?php
// config.php
define('PAYSTACK_SECRET_KEY', 'your-paystack-secret-key'); // Replace with your actual Paystack secret key
?>
```

### Step 2: Initialize the Paystack Client

Use the Paystack SDK to initialize the Paystack client. You'll need to load the SDK via Composer's autoload.

**payment.php:**

```php
<?php
// payment.php

// Load Composer's autoloader
require_once 'vendor/autoload.php'; // Path to autoload.php

// Load configuration
require_once 'config.php';

// Initialize Paystack SDK with the secret key
use Paystack\Paystack;

$paystack = new Paystack(PAYSTACK_SECRET_KEY);

// When the form is submitted, initialize a payment
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form input
    $email = $_POST['email'];
    $amount = $_POST['amount'];

    // Create a payment request
    $data = [
        'email' => $email,
        'amount' => $amount,  // Amount should be in kobo (1 NGN = 100 kobo)
    ];

    // Initialize the payment transaction
    try {
        $transaction = $paystack->transaction->initialize($data);

        // Redirect to Paystack's payment page
        header('Location: ' . $transaction->data->authorization_url);
        exit();
    } catch (Exception $e) {
        echo 'Error initializing payment: ' . $e->getMessage();
    }
}
?>
```

### Step 3: Create a Payment Form

Create an HTML form where the user can enter their email and the amount to pay.

**index.php:**

```php
<?php
// index.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paystack Payment Example</title>
</head>
<body>
    <h2>Paystack Payment Example</h2>

    <form action="payment.php" method="POST">
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="amount">Amount (in kobo):</label>
        <input type="number" id="amount" name="amount" required><br><br>

        <button type="submit">Pay</button>
    </form>
</body>
</html>
```

### Step 4: Handle Payment Verification

Once the user completes the payment, Paystack will redirect them back to your site with a `reference` parameter. You will need to verify the payment using the reference.

**verify.php:**

```php
<?php
// verify.php

// Load Composer's autoloader
require_once 'vendor/autoload.php'; // Path to autoload.php

// Load configuration
require_once 'config.php';

// Initialize Paystack SDK with the secret key
use Paystack\Paystack;

$paystack = new Paystack(PAYSTACK_SECRET_KEY);

// Check if the reference is set in the URL
if (isset($_GET['reference'])) {
    $reference = $_GET['reference'];

    // Verify the payment using the reference
    try {
        $verification = $paystack->transaction->verify($reference);

        // Check if the transaction is successful
        if ($verification->data->status == 'success') {
            echo 'Payment was successful!';
        } else {
            echo 'Payment failed or was not verified.';
        }
    } catch (Exception $e) {
        echo 'Error verifying payment: ' . $e->getMessage();
    }
} else {
    echo 'No reference provided.';
}
?>
```

### Step 5: How It Works

1. **User visits `index.php`**: The user sees a form where they can enter their email address and the amount they wish to pay.
   
2. **User submits the form**: When the form is submitted, the `payment.php` file initializes a Paystack transaction using the SDK.
   
3. **Paystack redirects the user**: After the transaction is initialized, the user is redirected to Paystack’s payment page to complete the payment.
   
4. **Paystack redirects back to your site**: After the user completes the payment, Paystack redirects them back to your site with a `reference` parameter.
   
5. **Transaction verification**: On the `verify.php` page, you verify the transaction using the provided reference and check if the transaction was successful.

### Step 6: Testing

You can test the integration using Paystack’s test cards. Make sure you're using your **Test Secret Key** from the Paystack Dashboard and that **Test Mode** is enabled.

**Test Cards**:

- **Visa**: `4084084084084081`
- **Mastercard**: `5520488282323435`
- **Expiration Date**: Any future date.
- **CVV**: `123`

### Conclusion

By following the above steps, you can integrate Paystack into your PHP application using their official SDK. The SDK simplifies handling Paystack API calls and provides a more structured way to interact with the Paystack payment gateway.

You can extend this integration by adding more features, such as refunding payments, managing customers, and handling webhooks for notifications.

Good luck with your integration, and feel free to check out the [Paystack SDK Documentation](https://github.com/PaystackHQ/paystack-php) for further details on how to utilize the SDK's full potential!
