<?php
session_start();
include('db_connect.php');

if (!isset($_SESSION['auth_user'])) {
    header("Location: login.php");
    exit();
}

$user_email = $_SESSION['auth_user']['email'];

// Fetch user data
$query = "SELECT * FROM users WHERE email='$user_email' LIMIT 1";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if (isset($_POST['update_profile'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Update user profile
    $update_query = "UPDATE users SET name='$name', email='$email' WHERE email='$user_email'";
    if (mysqli_query($conn, $update_query)) {
        $_SESSION['status'] = "Profile updated successfully!";
        $_SESSION['auth_user']['name'] = $name;
        $_SESSION['auth_user']['email'] = $email;
    } else {
        $_SESSION['status'] = "Profile update failed!";
    }
    header("Location: profile-settings.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    
    <!-- Bootstrap CSS (For Styling) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
    
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-primary {
            background-color:rgb(8, 8, 8);
            border: none;
            transition: 0.3s;
        }
        .btn-primary:hover {
            background-color: #FFD700;
        }
        
        h2 {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 15px;
            border-bottom: 3px solid #FFD700;
            display: inline-block;
            padding-bottom: 5px;
        }
        .alert {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .alert button {
            background: none;
            border: none;
            font-size: 18px;
        }
        .container {
            background: white;
            width: 100%;
            max-width: 400px;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        body {
            background: #f8f8f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Profile Settings</h2>

        <?php if (isset($_SESSION['status'])): ?>
            <div class="alert alert-info">
                <?= $_SESSION['status']; ?>
                <button onclick="this.parentElement.style.display='none';">&times;</button>
            </div>
            <?php unset($_SESSION['status']); ?>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="<?= $user['name']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $user['email']; ?>" required>
            </div>

            <button type="submit" name="update_profile" class="btn btn-primary w-100">Update Profile</button>
        </form>
    </div>

</body>
</html>
