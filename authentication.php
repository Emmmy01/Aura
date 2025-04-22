<?php
session_start();
include 'db_connect.php';

if (isset($_SESSION['auth_user']['id'])) {
    $user_id = $_SESSION['auth_user']['id'];

    $query = $conn->prepare("SELECT profile_picture FROM users WHERE id = ?");
    $query->bind_param("i", $user_id);
    $query->execute();
    $result = $query->get_result();
    $row = $result->fetch_assoc();

    $_SESSION['auth_user']['profile_picture'] = $row['profile_picture'] ?? 'Premium_Vector___Young_man_Face_Avater_Vector_illustration_design-removebg-preview.png';
}

if(!isset($_SESSION['authenticated']))
{  
     $_SESSION['status'] = "please login.!";
    header('location: login.php');
    exit(0);
}





