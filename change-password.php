<?php
session_start();
include('db_connect.php');

if (!isset($_SESSION['auth_user'])) {
    header("Location: login.php");
    exit();
}

$user_email = $_SESSION['auth_user']['email'];

if (isset($_POST['change_password'])) {
    $old_password = mysqli_real_escape_string($conn, $_POST['old_password']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    $query = "SELECT password FROM users WHERE email='$user_email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if (!password_verify($old_password, $user['password'])) {
        $_SESSION['status'] = "❌ Old password is incorrect!";
        $_SESSION['status_type'] = "error";
    } elseif ($new_password !== $confirm_password) {
        $_SESSION['status'] = "⚠️ New passwords do not match!";
        $_SESSION['status_type'] = "error";
    } else {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $update_query = "UPDATE users SET password='$hashed_password' WHERE email='$user_email'";
        
        if (mysqli_query($conn, $update_query)) {
            $_SESSION['status'] = "✅ Password changed successfully!";
            $_SESSION['status_type'] = "success";
        } else {
            $_SESSION['status'] = "⚠️ Password change failed!";
            $_SESSION['status_type'] = "error";
        }
    }
    header("Location: change-password.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password | MR SEE CHICKEN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            background: #f8f8f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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

        h2 {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 15px;
            border-bottom: 3px solid #FFD700;
            display: inline-block;
            padding-bottom: 5px;
        }

        .status-message {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            font-size: 14px;
        }

        .success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }

        .input-group {
            margin: 10px 0;
            position: relative;
        }

        input {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #999;
        }

        .password-toggle:hover {
            color: #333;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #000;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s;
        }

        button:hover {
            background: #FFD700;
            color: black;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Change Password</h2>

    <?php if (isset($_SESSION['status'])): ?>
        <div class="status-message <?= $_SESSION['status_type']; ?>">
            <?= $_SESSION['status']; ?>
        </div>
        <?php unset($_SESSION['status'], $_SESSION['status_type']); ?>
    <?php endif; ?>

    <form method="POST">
        <div class="input-group">
            <input type="password" name="old_password" id="old_password" placeholder="Old Password" required minlength="6">
            <i class="fas fa-eye password-toggle" onclick="togglePassword('old_password')"></i>
        </div>

        <div class="input-group">
            <input type="password" name="new_password" id="new_password" placeholder="New Password" required minlength="6">
            <i class="fas fa-eye password-toggle" onclick="togglePassword('new_password')"></i>
        </div>

        <div class="input-group">
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm New Password" required minlength="6">
            <i class="fas fa-eye password-toggle" onclick="togglePassword('confirm_password')"></i>
        </div>

        <button type="submit" name="change_password">Change Password</button>
    </form>
</div>

<script>
    function togglePassword(fieldId) {
        const input = document.getElementById(fieldId);
        const icon = input.nextElementSibling;
        if (input.type === "password") {
            input.type = "text";
            icon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.replace("fa-eye-slash", "fa-eye");
        }
    }
</script>

</body>
</html>
