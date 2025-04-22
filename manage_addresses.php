<?php
session_start();
require 'db_connect.php'; // Database connection

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM user_addresses WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$user_id]);
$addresses = $stmt->fetchAll();
?>

<h2>Manage Addresses</h2>
<a href="add_address.php">➕ Add New Address</a>

<?php if (count($addresses) > 0): ?>
    <ul>
        <?php foreach ($addresses as $address): ?>
            <li>
                <strong><?= htmlspecialchars($address['full_name']) ?></strong> <br>
                <?= htmlspecialchars($address['phone']) ?><br>
                <?= htmlspecialchars($address['address']) ?>, <?= htmlspecialchars($address['city']) ?>, <?= htmlspecialchars($address['state']) ?> - <?= htmlspecialchars($address['postal_code']) ?>
                <br>
                <?php if ($address['is_default']): ?>
                    <span style="color: green;">[Default]</span>
                <?php endif; ?>
                <br>
                <a href="edit_address.php?id=<?= $address['id'] ?>">✏️ Edit</a> | 
                <a href="delete_address.php?id=<?= $address['id'] ?>" onclick="return confirm('Are you sure?');">🗑 Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No saved addresses.</p>
<?php endif; ?>
