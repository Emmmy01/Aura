<?php
if ($_FILES['file']['name']) {
    $filename = 'uploads/' . time() . '_' . $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $filename);
    echo json_encode(['location' => $filename]);
}
?>
