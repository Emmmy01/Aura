<?php
include 'db.php'; // Include the database connection

// Handle form submission for adding/editing items
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $detail_page = trim($_POST['detail_page']); // Capture detail page

        // Check if the file is uploaded
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $target_dir = "uploads/";
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

            // Insert into database
            $stmt = $conn->prepare("INSERT INTO items (name, description, image_path, detail_page) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $description, $target_file, $detail_page);
            $stmt->execute();
            $stmt->close();
            
            // Redirect to the same page to see the new item
            header("Location: admin.php");
            exit; // Make sure to exit after the redirect
        } else {
            echo "File upload error or no file selected.";
        }
    }
    // Handle editing and deleting similarly...

} 

// Fetch all items from the database
$result = $conn->query("SELECT * FROM items");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css"> <!-- Optional CSS file for styling -->
    <style>
    body {
    font-family: 'Arial', sans-serif;
    background-color: #1a1a1a; /* Dark background */
    color: #ffffff; /* White text */
    margin: 0;
    padding: 20px;
}

h1 {
    color: #00bfff; /* Bright blue for headings */
    text-align: center;
    margin-bottom: 30px;
}

h2 {
    color: #00bfff; /* Bright blue for subheadings */
    margin-top: 20px;
}

form {
    background-color: #2a2a2a; /* Darker background for forms */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    margin-bottom: 30px;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #00bfff; /* Blue border */
    border-radius: 6px; /* Rounded corners */
    background-color: #333; /* Dark background for inputs */
    color: #ffffff; /* White text */
    box-sizing: border-box; /* Include padding and border in total width */
    transition: border 0.3s ease;
}

input[type="text"]:focus,
textarea:focus {
    border: 1px solid #0056b3; /* Darker blue on focus */
    outline: none; /* Remove default outline */
}

input[type="file"] {
    margin: 10px 0;
    border: none; /* Remove border */
}

button {
    background-color: #00bfff; /* Bright blue for buttons */
    color: #ffffff; /* White text */
    border: none;
    padding: 12px 15px;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-size: 16px;
}

button:hover {
    background-color: #0056b3; /* Darker blue on hover */
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #2a2a2a; /* Dark background for table */
    border-radius: 8px;
    overflow: hidden; /* Prevent border radius from being cut off */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
}

th, td {
    border: 1px solid #444; /* Darker gray border */
    padding: 12px;
    text-align: left;
}

th {
    background-color: #00bfff; /* Bright blue header */
    color: #ffffff; /* White text for header */
}

tr:nth-child(even) {
    background-color: #333; /* Dark gray for alternate rows */
}

tr:hover {
    background-color: #444; /* Darker gray on hover */
}

img {
    max-width: 100px; /* Limit image width */
    height: auto; /* Maintain aspect ratio */
    border-radius: 4px; /* Slightly rounded corners */
}

input[type="hidden"] {
    display: none; /* Hide hidden inputs */
}

    </style>
</head>
<body>
    <h1>Admin Panel</h1>
    <h2>Add New Item</h2>
    <form action="admin.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Item Name" required>
        <textarea name="description" placeholder="Item Description" required></textarea>
        <input type="file" name="image" accept="image/*" required>
        <input type="text" name="detail_page" placeholder="Detail Page (e.g., detail1.html)" required>
        <button type="submit" name="add">Add Item</button>
    </form>

    <h2>Existing Items</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['description']); ?></td>
                        <td>
                            <?php if (!empty($row['image_path'])): ?>
                                <img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" width="100">
                            <?php else: ?>
                                No image
                            <?php endif; ?>
                        </td>
                        <td>
                            <!-- Edit Form -->
                            <form action="admin.php" method="POST" enctype="multipart/form-data" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
                                <textarea name="description" required><?php echo htmlspecialchars($row['description']); ?></textarea>
                                <input type="file" name="image" accept="image/*">
                                <input type="text" name="detail_page" value="<?php echo htmlspecialchars($row['detail_page']); ?>" required>
                            
                                <button type="submit" name="edit">Edit</button>
                            </form>
                            <!-- Delete Form -->
                            <form class="del" action="admin.php" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <?php $conn->close(); // Close the database connection ?>

</body>
</html>
