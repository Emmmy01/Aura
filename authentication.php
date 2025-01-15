<?php
session_start();

if(!isset($_SESSION['authenticated']))
{  
     $_SESSION['status'] = "please login.!";
    header('location: login.php');
    exit(0);
}






?>