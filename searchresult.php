<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "mrseechickenfood";


$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a search query is present
$searchQuery = isset($_GET["query"]) ? $_GET["query"] : "";
$sql = "SELECT * FROM products";

if (!empty($searchQuery)) {
    $sql = "SELECT * FROM products WHERE name LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchParam = "%" . $searchQuery . "%";
    $stmt->bind_param("s", $searchParam);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Food Store</title>
    <link rel="stylesheet" href="style2.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
  />
</head>
<body>

    <form action="searchresult.php" method="GET" class="search-form">
        <input type="text" name="query" placeholder="Search for food..." value="<?= htmlspecialchars($searchQuery) ?>">
        <button type="submit">Search</button>
    </form>
    <button onclick="goBack()" class="back-button">
    <i class="fas fa-arrow-left"></i> Back
</button>
<script>
    function goBack() {
    if (document.referrer) {
        window.history.back(); // Go back to the previous page
    } else {
        window.location.href = "index.php"; // Fallback to homepage if no history
    }
}

</script>

    <div class="product-container">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="food-item">
                    <button class="wishlist"><i class="fas fa-heart love-icon"></i></button>
                    <a href="<?= $row['details_page']; ?>">
                        <img src="uploads/<?= $row['image']; ?>" alt="<?= $row['name']; ?>">
                        <h3><?= $row['name']; ?></h3>
                    </a>
                    <div class="price-add">
                        <p>₦<?= number_format($row['price']); ?></p>
                        <button class="add-to-cart" onclick="addToCart('<?= $row['name']; ?>', '<?= $row['price']; ?>', 'uploads/<?= $row['image']; ?>')">
                            +
                        </button>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No products found for "<?= htmlspecialchars($searchQuery) ?>"</p>
        <?php endif; ?>
    </div>

</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    
    const wishlistButtons = document.querySelectorAll(".wishlist");
    const cartButtons = document.querySelectorAll(".add-to-cart");

    // Function to update wishlist icon state
    function updateWishlistIcons() {
        wishlistButtons.forEach(button => {
            let productName = button.parentElement.querySelector("h3").textContent;
            let isInWishlist = wishlist.some(item => item.name === productName);
            
            if (isInWishlist) {
                button.querySelector(".love-icon").classList.add("active");
                button.querySelector(".love-icon").style.color = "red"; // Make icon red
            } else {
                button.querySelector(".love-icon").classList.remove("active");
                button.querySelector(".love-icon").style.color = "black";
            }
        });
    }

    // Wishlist Button Click Event
    wishlistButtons.forEach(button => {
        button.addEventListener("click", function () {
            let productElement = button.parentElement;
            let productName = productElement.querySelector("h3").textContent;
            let productPrice = parseFloat(productElement.querySelector("p").textContent.replace("₦", "").replace(",", ""));
            let productImage = productElement.querySelector("img").src;
            let detailsPage = productElement.querySelector("a").href;

            let existingItem = wishlist.find(item => item.name === productName);
            if (existingItem) {
                wishlist = wishlist.filter(item => item.name !== productName);
            } else {
                wishlist.push({ name: productName, price: productPrice, image: productImage, detailsPage });
            }

            localStorage.setItem("wishlist", JSON.stringify(wishlist));
            updateWishlistIcons();
        });
    });

    updateWishlistIcons();

    // Function to Add Item to Cart
    function addToCart(name, price, image) {
        let existingItem = cart.find(item => item.name === name);
        
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({ name, price: parseFloat(price), image, quantity: 1 });
        }

        localStorage.setItem("cart", JSON.stringify(cart));
        alert("Item added to cart!");
    }

    // Add-to-Cart Button Click Event
    cartButtons.forEach(button => {
        button.addEventListener("click", function () {
            let productElement = button.parentElement.parentElement;
            let productName = productElement.querySelector("h3").textContent;
            let productPrice = parseFloat(productElement.querySelector("p").textContent.replace("₦", "").replace(",", ""));
            let productImage = productElement.querySelector("img").src;

            addToCart(productName, productPrice, productImage);
        });
    });
});

</script>
</html>

<?php $conn->close(); ?>
