
<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}


include('db_connect.php');

if (isset($_POST['send_notification'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $user_id = $_POST['user_id'] === 'all' ? 'NULL' : $_POST['user_id']; // Send to all or specific user

    $query = "INSERT INTO notifications (user_id, title, message) VALUES ($user_id, '$title', '$message')";
    if (mysqli_query($conn, $query)) {
        $_SESSION['status'] = "✅ Notification sent successfully!";
        $_SESSION['status_type'] = "success";
    } else {
        $_SESSION['status'] = "❌ Failed to send notification.";
        $_SESSION['status_type'] = "danger";
    }
    header("Location: send-notification.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <title>Send Notification</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
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
    font-family: Arial, sans-serif;
    background: #f5f5f5;
    margin: 0;
    display: flex;
}

/* Sidebar */
.sidebar {
    width: 250px;
    background: rgb(14, 6, 74);
    color: white;
    height: 100vh;
    position: fixed;
    left: -250px;
    transition: 0.3s;
    padding-top: 20px;
 
}

.sidebar.active {
    left: 0;
}

.sidebar ul {
    list-style: none;
    padding: 0;
    margin-top:13px;
}

.sidebar ul li {
    padding: 15px;
    text-align: center;
   
}

.sidebar ul li a {
    color: white;
    text-decoration: none;
    display: block;
  
}

.sidebar ul li:hover {
    background:rgb(14, 6, 74);
}

/* Toggle Button */
.toggle-btn {
    position: absolute;
    left: 10px;
    top: 10px;
    background: rgb(14, 6, 74);
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
    transition: 0.3s;
    
}

.toggle-btn:hover {
    background: rgb(14, 6, 74);
}

/* Main Content */
.content {
    margin-left: 20px;
    width: 100%;
    transition: margin-left 0.3s;
    padding: 20px;
}

.content.active {
    margin-left: 270px;
}

.dashboard-stats {
    display: flex;
    justify-content: space-around;
    margin-bottom: 20px;
}

.stat {
    background: #fff;
    padding: 15px;
    border-radius: 5px;
    font-size: 18px;
    text-align: center;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.pending { background: #ffcc00; }
.processing { background: #17a2b8; }
.completed { background: #28a745; }
.cancelled { background: #dc3545; }

.filter-form {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
  
}

.filter-form select, .filter-form input, .filter-form button {
    margin: 5px;
    padding: 8px;
    border-radius:10px;
}

table {
    width: 100%;
    background: #fff;
    border-collapse: collapse;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

th {
    background:rgb(14, 6, 74);
    color: white;
}

td select {
    padding: 5px;
}
h2{
    text-align: center;
}
 .container {
            max-width: 600px;
            margin-top: 50px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            width: 100%;
            font-size: 16px;
            padding: 10px;
            background-color: rgb(14, 6, 74);
        }
        .btn-primary:hover {
            background-color: rgb(14, 6, 74);
        }
</style>
<body>

<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <ul>
        <li><a href="admin_dashboard.php">Dashboard</a></li>
        <li><a href="admin_dashboard.php">Orders</a></li>
        <li><a href="manage_users.php">Manage Users</a></li>
        <li><a href="manage_products.php">Manage Products</a></li>
        <li><a href="reports.php">Reports</a></li>
        <li><a href="settings.php">Settings</a></li>
        <li><a href="send-notification.php">Send Notification</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

<!-- Toggle Button -->
<button class="toggle-btn" onclick="toggleSidebar()">☰ Menu</button>

<!-- Main Content -->
 
<div class="container">
    <h3 class="text-center mb-3">📢 Send Notification</h3>

    <?php if (isset($_SESSION['status'])): ?>
        <div class="alert alert-<?php echo $_SESSION['status_type']; ?> alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['status']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['status'], $_SESSION['status_type']); ?>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required placeholder="Enter title...">
        </div>

        <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea name="message" class="form-control" rows="4" required placeholder="Enter message..."></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Send To</label>
            <select name="user_id" class="form-select select2">
                <option value="all">All Users</option>
                <?php
                $users = mysqli_query($conn, "SELECT id, name FROM users");
                while ($user = mysqli_fetch_assoc($users)) {
                    echo "<option value='{$user['id']}'>{$user['name']}</option>";
                }
                ?>
            </select>
        </div>

        <button type="submit" name="send_notification" class="btn btn-primary">Send Notification</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({ width: '100%' });
    });
</script>


</body>
</html>
