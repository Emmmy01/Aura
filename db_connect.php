<?php
$host = "localhost"; // Change this if your database is on another server
$user = "root"; // Change this if your MySQL user is different
$password = ""; // Set your database password if any
$database = "mrseechickenfood"; // Replace with your actual database name

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
