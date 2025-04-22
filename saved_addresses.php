<?php
session_start();
if (!isset($_SESSION['auth_user'])) {
    die("Unauthorized access!");
}

$userEmail = $_SESSION['auth_user']['email'];

// Database configuration
$host = "localhost";
$dbname = "mrseechickenfood"; 
$username = "root"; 
$password = "";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch saved addresses
$stmt = $conn->prepare("SELECT id, address FROM saved_addresses WHERE email = ?");
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$result = $stmt->get_result();
$addresses = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saved Addresses</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        body {
            background: #f8f9fa;
        }
        .header {
            background: #222;
            color: white;
            padding: 15px 20px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }
        .container {
            width: 100%;
            max-width: 100%;
            padding: 20px;
        }
        .address-card {
            background: white;
            padding: 15px;
            margin: 10px 0;
            width: 100%;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            transition: 0.3s ease-in-out;
            gap: 10px;
        }
        .address-card:hover {
            transform: scale(1.02);
        }
        .address-text {
            font-size: 16px;
            color: #333;
            flex-grow: 1;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        .btn {
            border: none;
            cursor: pointer;
            padding: 10px 15px;
            font-size: 14px;
            border-radius: 5px;
            transition: 0.3s ease-in-out;
        }
        .use-btn {
            background:rgb(8, 8, 8);
            color: white;
        }
        .use-btn:hover {
            background: #218838;
        }
        .delete-btn {
            background: red;
            color: white;
        }
        .delete-btn:hover {
            background: #c82333;
        }
        .icon {
            margin-right: 5px;
        }
        .empty-state {
            text-align: center;
            padding: 20px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="header">📍 Your Saved Addresses</div>

<div class="container">
    <?php if (empty($addresses)) { ?>
        <p class="empty-state">No saved addresses yet. Add one at checkout.</p>
    <?php } else { ?>
        <?php foreach ($addresses as $address) { ?>
            <div class="address-card">
                <p class="address-text"><i class="fas fa-map-marker-alt icon"></i> <?= htmlspecialchars($address['address']) ?></p>
                <div class="action-buttons">
                    <button class="btn use-btn" onclick="useAddress('<?= htmlspecialchars($address['address']) ?>')">
                        <i class="fas fa-check icon"></i> Use
                    </button>
                    <button class="btn delete-btn" onclick="deleteAddress(<?= $address['id'] ?>)">
                        <i class="fas fa-trash icon"></i> Delete
                    </button>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>

<script>
function useAddress(address) {
    localStorage.setItem("selectedAddress", address);
    window.location.href = "order.php";
}

function deleteAddress(addressId) {
    if (confirm("Are you sure you want to delete this address?")) {
        fetch('delete_address.php?id=' + addressId, { method: 'GET' })
            .then(response => response.text())
            .then(data => {
                alert(data);
                location.reload();
            })
            .catch(error => console.error("Error deleting address:", error));
    }
}
</script>

</body>
</html>
