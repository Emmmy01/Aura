<?php
session_start();
   unset($_SESSION['authenticated']);
   unset($_SESSION['auth_user']);
   $_SESSION['status'] = "You are Logged out successfully";
   header("location: login.php");
?>