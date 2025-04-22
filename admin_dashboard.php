<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

include 'db_connect.php'; // Ensure this connects to your database

// Fetch all orders
$status_filter = isset($_GET['status']) ? $_GET['status'] : "";
$search_query = isset($_GET['search']) ? $_GET['search'] : "";

$query = "SELECT * FROM orders WHERE 1=1"; // Starting with 'WHERE 1=1' to simplify appending conditions
$parameters = [];

if (!empty($status_filter)) {
    $query .= " AND status = ?";
    $parameters[] = $status_filter;
}

if (!empty($search_query)) {
    $query .= " AND (name LIKE ? OR email LIKE ? OR phone LIKE ?)";
    $search_query = "%$search_query%"; // Add '%' for partial matches
    $parameters[] = $search_query;
    $parameters[] = $search_query;
    $parameters[] = $search_query;
}

$query .= " ORDER BY created_at DESC";

// Prepare statement
$stmt = $conn->prepare($query);

// Bind parameters
if (count($parameters) > 0) {
    $types = str_repeat('s', count($parameters)); // All parameters are strings ('s')
    $stmt->bind_param($types, ...$parameters);
}

// Execute the query
$stmt->execute();

// Get result
$result = $stmt->get_result();

// Get total orders for dashboard stats
$total_orders = $conn->query("SELECT COUNT(*) as count FROM orders")->fetch_assoc()['count'];
$pending_orders = $conn->query("SELECT COUNT(*) as count FROM orders WHERE status='Pending'")->fetch_assoc()['count'];
$completed_orders = $conn->query("SELECT COUNT(*) as count FROM orders WHERE status='Completed'")->fetch_assoc()['count'];
$processing_orders = $conn->query("SELECT COUNT(*) as count FROM orders WHERE status='Processing'")->fetch_assoc()['count'];
$cancelled_orders = $conn->query("SELECT COUNT(*) as count FROM orders WHERE status='Cancelled'")->fetch_assoc()['count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            const content = document.getElementById("content");
            sidebar.classList.toggle("active");
            content.classList.toggle("active");
        }
    </script>
</head>
<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #181818;
    margin: 0;
    display: flex;
}

/* Sidebar */
.sidebar {
    width: 250px;
    background: #1c1c1c;
    color: white;
    height: 100vh;
    position: fixed;
    left: 0;
    top: 0;
    padding-top: 30px;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
    z-index: 10;
    transition: 0.3s;
}

.sidebar ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar ul li {
    padding: 15px 20px;
    transition: 0.3s ease;
}

.sidebar ul li:hover {
    background-color: #333;
}

.sidebar ul li a {
    color: white;
    text-decoration: none;
    font-weight: 500;
}

/* Toggle Button */
.toggle-btn {
    display: none;
}

/* Main Content */
.content {
    margin-left: 250px;
    padding: 30px;
    width: calc(100% - 250px);
    background-color: #121212;
    color: #fff;
    transition: 0.3s;
}

h2 {
    color: #fff;
    margin-bottom: 20px;
    text-align: center;
}

/* Dashboard Stats */
.dashboard-stats {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 30px;
    justify-content: center;
}

.stat {
    flex: 1 1 150px;
    background: #333;
    padding: 20px;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    font-weight: 600;
    color: #fff;
}

.pending { background: #5a5a5a; color: #dcdcdc; }
.processing { background: #1e1e1e; color: #00bcd4; }
.completed { background: #1e1e1e; color: #4caf50; }
.cancelled { background: #1e1e1e; color: #f44336; }

/* Filter */
.filter-form {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    margin-bottom: 25px;
}

.filter-form select,
.filter-form input,
.filter-form button {
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #444;
    font-size: 14px;
    background: #222;
    color: #fff;
}

/* Table */
table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 12px rgba(0, 0, 0, 0.3);
    background-color: #333;
    color: #fff;
}

th, td {
    padding: 12px 15px;
    text-align: center;
    border-bottom: 1px solid #444;
}

th {
    background: #0d1b2a;
    color: white;
    font-weight: 600;
}

td select {
    padding: 6px;
    border-radius: 6px;
    border: 1px solid #444;
    background-color: #222;
    color: white;
}

tr:nth-child(even) {
    background-color: #444;
}

@media (max-width: 768px) {
    .sidebar {
        left: -250px;
        position: absolute;
    }

    .sidebar.active {
        left: 0;
    }

    .toggle-btn {
        display: block;
        position: absolute;
        top: 10px;
        left: 10px;
        background: #1c1c1c;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        z-index: 20;
    }

    .content {
        margin-left: 0;
        width: 100%;
        padding-top: 60px;
    }
}
</style>

<body>

<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <ul>
        <li><a href="admin_dashboard.php">Dashboard</a></li>
        <li><a href="admin_dashboard.php">Orders</a></li>
        <li><a href="manage_users.php">Manage Users</a></li>
        <li><a href="admin_add_product.html">Manage Products</a></li>
        <li><a href="reports.php">Reports</a></li>
        <li><a href="settings.php">Settings</a></li>
        <li><a href="admin_quotes.php">Quote</a></li>
        <li><a href="newsletter_admin.php">Newsletter</a></li>
        <li><a href="send-notification.php">Send Notification</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

<!-- Toggle Button -->
<button class="toggle-btn" onclick="toggleSidebar()">☰ Menu</button>

<!-- Main Content -->
<div id="content" class="content">

    <h2>Admin Dashboard - Order Management</h2>

    <div class="dashboard-stats">
        <div class="stat">Total Orders: <span><?= $total_orders ?></span></div>
        <div class="stat pending">Pending: <span><?= $pending_orders ?></span></div>
        <div class="stat processing">Processing: <span><?= $processing_orders ?></span></div>
        <div class="stat completed">Completed: <span><?= $completed_orders ?></span></div>
        <div class="stat cancelled">Cancelled: <span><?= $cancelled_orders ?></span></div>
    </div>

    <!-- Filter and Search -->
    <form method="GET" class="filter-form">
        <select name="status" onchange="this.form.submit()">
            <option value="">All Orders</option>
            <option value="Pending" <?= $status_filter == 'Pending' ? 'selected' : '' ?>>Pending</option>
            <option value="Processing" <?= $status_filter == 'Processing' ? 'selected' : '' ?>>Processing</option>
            <option value="Completed" <?= $status_filter == 'Completed' ? 'selected' : '' ?>>Completed</option>
            <option value="Cancelled" <?= $status_filter == 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
        </select>
        <input type="text" name="search" placeholder="Search by name, email, or phone" value="<?= $search_query ?>">
        <button type="submit">Search</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Delivery Method</th>
            <th>Address</th>
            <th>Pickup Location</th>
            <th>Total</th>
            <th>Order Summary</th>
            <th>Order Time</th>
            <th>Status</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['delivery_method'] ?></td>
            <td><?= $row['address'] ?></td>
            <td><?= $row['pickup_location'] ?></td>
            <td>₦<?= number_format($row['total'], 2) ?></td>
            <td><?= $row['order_summary'] ?></td>
            <td><?= $row['created_at'] ?></td>
            <td>
                <form method="POST" action="update_status.php">
                    <input type="hidden" name="order_id" value="<?= $row['id'] ?>">
                    <select name="status" onchange="this.form.submit()">
                        <option value="Pending" <?= $row['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                        <option value="Processing" <?= $row['status'] == 'Processing' ? 'selected' : '' ?>>Processing</option>
                        <option value="Completed" <?= $row['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
                        <option value="Cancelled" <?= $row['status'] == 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
                    </select>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>

</div>

<script>
$(document).ready(function () {
    function fetchOrders() {
        $.ajax({
            url: "fetch_orders.php",
            type: "GET",
            dataType: "json",
            success: function (data) {
                let tableContent = "";
                data.forEach(order => {
                    tableContent += ` 
                        <tr>
                            <td>${order.id}</td>
                            <td>${order.name}</td>
                            <td>${order.email}</td>
                            <td>${order.phone}</td>
                            <td>${order.delivery_method}</td>
                            <td>${order.address}</td>
                            <td>${order.pickup_location}</td>
                            <td>₦${parseFloat(order.total).toFixed(2)}</td>
                            <td>${order.order_summary}</td>
                            <td>${order.created_at}</td>
                            <td>
                                <form method="POST" class="status-form">
                                    <input type="hidden" name="order_id" value="${order.id}">
                                    <select name="status" onchange="this.form.submit()">
                                        <option value="Pending" ${order.status === 'Pending' ? 'selected' : ''}>Pending</option>
                                        <option value="Processing" ${order.status === 'Processing' ? 'selected' : ''}>Processing</option>
                                        <option value="Completed" ${order.status === 'Completed' ? 'selected' : ''}>Completed</option>
                                        <option value="Cancelled" ${order.status === 'Cancelled' ? 'selected' : ''}>Cancelled</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    `;
                });
                $("table tbody").html(tableContent);
            }
        });
    }

    fetchOrders();
});
</script>

</body>
</html>
