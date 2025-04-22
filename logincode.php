<?php
session_start();
include('db_connect.php');

if (isset($_POST['login_now_btn'])) {
    if (!empty(trim($_POST['email'])) && !empty(trim($_POST['password']))) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = $_POST['password']; // No need to escape, it's not used in SQL

        // ✅ Fetch user based on email
        $login_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $login_query_run = mysqli_query($conn, $login_query);

        if (mysqli_num_rows($login_query_run) > 0) {
            $row = mysqli_fetch_array($login_query_run);

            // ✅ Verify hashed password
            if (password_verify($password, $row['password'])) {
                // ✅ Check verification status
                if ($row['verify_status'] == "1") {
                    $_SESSION['authenticated'] = true;
                    $_SESSION['auth_user'] = [
                        'id' => $row['id'],  // ✅ Save User ID
                        'username' => $row['name'],
                        'email' => $row['email']
                    ];
                    $_SESSION['email'] = $row['email']; // Store email separately if needed
                    
                    header("Location: index.php"); // Redirect to dashboard
                    exit();
                } else {
                    $_SESSION['status'] = "Please verify your email to login.";
                    header("Location: login.php");
                    exit();
                }
            } else {
                $_SESSION['status'] = "Invalid Email or Password";
                header("Location: login.php");
                exit();
            }
        } else {
            $_SESSION['status'] = "Invalid Email or Password";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['status'] = "All fields are mandatory";
        header("Location: login.php");
        exit();
    }
}
 
                    // Send user ID and email to JavaScript
                    echo json_encode([
                        'status' => 'success',
                        'id' => $row['id'],  // ✅ Send ID instead of user_id
                        'email' => $row['email']
                    ]);
                

?>



let tax = subtotal * 0.05; // ✅ 5% of subtotal
    let total = subtotal + tax; // ✅ Total = Subtotal + 5% tax
