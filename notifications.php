<?php
session_start();
include('db_connect.php');

if (!isset($_SESSION['auth_user'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['auth_user']['id'];
$query = "SELECT * FROM notifications WHERE user_id IS NULL OR user_id = $user_id ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

// Define category icons & colors
$icons = [
    "flight" => "✈️",
    "hotel" => "🏨",
    "offer" => "🎁",
    "transport" => "🚗",
    "general" => "🔔"
];
$colors = [
    "flight" => "#7B61FF",
    "hotel" => "#29CC7A",
    "offer" => "#FFAA33",
    "transport" => "#0099FF",
    "general" => "#666"
];

// Function to format timestamps (e.g., "2h ago", "Yesterday")
function timeAgo($datetime) {
    $time = strtotime($datetime);
    $diff = time() - $time;

    if ($diff < 60) {
        return "$diff sec ago";
    } elseif ($diff < 3600) {
        return floor($diff / 60) . " min ago";
    } elseif ($diff < 86400) {
        return floor($diff / 3600) . "h ago";
    } elseif ($diff < 172800) {
        return "Yesterday";
    } else {
        return date("M d, Y", $time);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            
        
        }

        .container {
            max-width: 400px;
            margin: 20px auto;
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            


            
        }

        h2 {
        
            margin-bottom: 20px;
            font-size: 22px;
            color: #333;
            border-bottom: 3px solid #FFD700;
        
            text-align: center;
        }

        /* Notification Box */
        .notification {
            display: flex;
            align-items: center;
            padding: 12px;
            border-bottom: 1px solid #eee;
            transition: background 0.3s;
        }

        .notification:hover {
            background: #f1f1f1;
        }

        /* Icon Styling */
        .icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: white;
            margin-right: 15px;
        }

        /* Notification Text */
        .text {
            flex: 1;
        }

        .title {
            font-weight: bold;
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
        }

        .message {
            font-size: 13px;
            color: #555;
        }

        /* Timestamp */
        .timestamp {
            font-size: 12px;
            color: gray;
            margin-top: 5px;
        }

        /* Unread Notification Styling */
        .unread .title {
            font-weight: bold;
            color: black;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Notifications</h2>

    <?php while ($row = mysqli_fetch_assoc($result)): 
        $category = $row['category'] ?? 'general'; // Default category
        $icon = $icons[$category] ?? $icons['general']; 
        $color = $colors[$category] ?? $colors['general'];
        $status_class = ($row['status'] == 'unread') ? 'unread' : '';
    ?>

    <div class="notification <?= $status_class ?>">
        <div class="icon" style="background-color: <?= $color ?>;">
            <?= $icon ?>
        </div>
        <div class="text">
            <div class="title"><?= htmlspecialchars($row['title']) ?></div>
            <div class="message"><?= htmlspecialchars($row['message']) ?></div>
            <div class="timestamp"><?= timeAgo($row['created_at']) ?></div>
        </div>
    </div>

    <?php endwhile; ?>

</div>

</body>
</html>
