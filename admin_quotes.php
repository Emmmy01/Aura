<?php
include 'db_connect.php';

$result = $conn->query("SELECT * FROM catering_quotes ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Catering Quotes | Admin</title>
</head>
<body>
    <h2>Catering Quote Requests</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Event Type</th>
            <th>Guests</th>
            <th>Preferred Dishes</th>
            <th>Event Date</th>
            <th>Special Requests</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['event_type'] ?></td>
            <td><?= $row['guests'] ?></td>
            <td><?= $row['preferred_dishes'] ?></td>
            <td><?= $row['event_date'] ?></td>
            <td><?= $row['special_requests'] ?></td>
            <td><?= $row['status'] ?></td>
            <td>
                <form action="update_quote.php" method="POST">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <select name="status">
                        <option value="Pending" <?= $row['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                        <option value="Approved" <?= $row['status'] == 'Approved' ? 'selected' : '' ?>>Approved</option>
                        <option value="Rejected" <?= $row['status'] == 'Rejected' ? 'selected' : '' ?>>Rejected</option>
                    </select>
                    <button type="submit">Update</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
