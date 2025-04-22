<?php
include 'db_connect.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $stmt = $conn->prepare("UPDATE newsletter_subscribers SET opened = opened + 1 WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->close();
}

// Return a transparent 1x1 pixel image
header("Content-Type: image/png");
$im = imagecreate(1, 1);
$white = imagecolorallocate($im, 255, 255, 255);
imagepng($im);
imagedestroy($im);
?>
