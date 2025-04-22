<?php
session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_picture'])) {
    $user_id = $_SESSION['auth_user']['id'];
    $target_dir = "uploads/";
    
    // Generate a unique filename
    $file_name = time() . "_" . basename($_FILES["profile_picture"]["name"]);
    $target_file = $target_dir . $file_name;

    // Move uploaded file
    if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
        // Update the database
        $stmt = $conn->prepare("UPDATE users SET profile_picture = ? WHERE id = ?");
        $stmt->bind_param("si", $file_name, $user_id);
        $stmt->execute();

        // Update session variable
        $_SESSION['auth_user']['profile_picture'] = $file_name;

        // Return JSON response
        echo json_encode(["success" => true, "file" => $file_name]);
    } else {
        echo json_encode(["success" => false]);
    }
}
?>
