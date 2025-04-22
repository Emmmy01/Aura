<?php
header('Content-Type: application/json');
include 'db_connect.php';

// Initialize monthly sales array
$sales = [
    "January" => 0, "February" => 0, "March" => 0,
    "April" => 0, "May" => 0, "June" => 0,
    "July" => 0, "August" => 0, "September" => 0,
    "October" => 0, "November" => 0, "December" => 0
];

// Adjust table/column names to match your database
$sql = "SELECT MONTH(created_at) AS month, SUM(total) AS total_sales 
        FROM orders 
        WHERE YEAR(created_at) = YEAR(CURDATE())
        GROUP BY MONTH(created_at)";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $monthIndex = (int)$row['month'];
    $monthName = date("F", mktime(0, 0, 0, $monthIndex, 1));
    $sales[$monthName] = (int)$row['total_sales'];
}

echo json_encode([
    "labels" => array_keys($sales),
    "data" => array_values($sales)
]);
?>
