<?php
include 'authentication.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sushi - MR SEE CHICKEN</title>
   
   

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
  />
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background: #f5f5f5;
    margin: 0;
    padding: 0;
    text-align: center;
}

.top-bar {
    display: flex;
    justify-content: space-between;
    padding: 10px;
    background: none;
    margin: 10px;
  
}

.website-link {
    font-size: 12px;
    color: gray;
}

.location {
    font-size: 14px;
}

.user-icon {
    width: 30px;
    height: 30px;
    border-radius: 50%;
}

.search-bar input {
    width: 90%;
    padding: 10px;
    margin: 10px auto;
    display: block;
    border-radius: 20px;
    border: 1px solid lightgray;
}

footer {
    display: flex;
    justify-content: space-around;
    align-items: center;
    position: fixed;
    bottom: 0;
    width: 100%;
    background: #f6f5f5;
    padding: 10px 0;
    z-index: 1;
  }
  footer i {
    font-size: 0.2rem;
    color: gray;
    cursor: pointer;
    z-index: 1;
  }
  footer i:hover {
    color: #080808;
  }
  .solo i {
    color: #111111;
  }
  

footer {
position: fixed;
bottom: 0;
left: 0;
width: 100%;
background-color: rgb(254, 253, 253);
display: flex;
justify-content: space-around;
align-items: center;
padding: 10px 0;
border-top: 1px solid rgb(214, 213, 213);
box-shadow: 0 -1px 5px rgba(0, 0, 0, 0.1);
z-index: 1000;
}

footer a {
text-decoration: none;
color: #333;
text-align: center;
font-size: 10px;
flex: 1;
}

footer a i {
font-size: 18px;
display: block;
margin-bottom: 5px;
}

footer a span {
display: block;
font-size: 10px;
color: gray;
}
.solo span {
color: #050505;
}
/* HEADER STYLES */
.top-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 20px;
    background: #fafaf8; /* Yellow Theme */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    height: 35px;
}

.logo img {
    height: 50px;
}

.nav-menu {
    display: flex;
}

.nav-menu ul {
    display: flex;
    list-style: none;
    gap: 20px;
    padding: 0;
}

.nav-menu ul li a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
}

/* MENU TOGGLE BUTTON */
.menu-toggle {
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
    display: none; /* Hidden by default */
}

/* SIDEBAR MENU (FOR SMALL SCREENS) */
.sidebar {
    position: fixed;
    top: 0;
    left: -250px;
    width: 250px;
    height: 100%;
    background: #fefefd;
    padding-top: 60px;
    transition: left 0.3s ease;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.sidebar ul {
    list-style: none;
    padding: 0;
}

.sidebar ul li {
    padding: 15px;
    text-align: center;
}

.sidebar ul li a {
    text-decoration: none;
    color: black;
    font-size: 18px;
    font-weight: bold;
    display: block;
}

.close-btn {
    position: absolute;
    top: 15px;
    right: 15px;
    font-size: 24px;
    border: none;
    background: none;
    cursor: pointer;
}

/* RESPONSIVE DESIGN */
@media (max-width: 768px) {
    .nav-menu {
        display: none;
    }
    .menu-toggle {
        display: block;
    }
}
.logo img {
    height: 100px;
    width: 100px;
}



@media (min-width: 788px) {
.image-content img{
    width: 409px;
    height: 400px;
}
footer{
        display: none;
    }
    footer i {
       display: none;
      }
  
}
.site-footer {
    background: #FFD700;
    color: rgb(7, 7, 7);
    text-align: center;
    padding: 50px 0;
}
.site-footer .container {
    max-width: 1200px;
    margin: auto;
}
.footer-top h2 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
    border-bottom: 3px  solid ;
}
.footer-top p {
    font-size: 16px;
    opacity: 0.8;
}
.footer-links ul {
    list-style: none;
    padding: 0;
    display: flex;
    justify-content: center;
    gap: 20px;
    margin: 20px 0;
}
.footer-links ul li a {
    text-decoration: none;
    color: rgb(10, 10, 10);
    font-size: 16px;
}
.footer-links ul li a:hover {
    color: #FFD700;
}
.footer-social {
    margin-bottom: 20px;
}
.footer-social a {
    display: inline-block;
    margin: 0 10px;
}
.footer-social img {
    width: 30px;
    height: 30px;
}
.footer-copy {
    font-size: 14px;
    opacity: 0.7;
}

.cart-container {
        max-width: 800px;
        margin: auto;
      height: auto;
        padding: 20px;
        background: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .cart-header {
        text-align: left;
        margin-bottom: 20px;
    }
    .cart-header h1{
       
        font-size: 21px;
        border-bottom: 2px  solid whitesmoke;
    }
    .cart-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px;
        border-bottom: 1px solid #ddd;
    }
    .cart-item img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 5px;
    }
    .item-details {
        flex: 1;
        margin-left: 15px;
    }
    .quantity-control button {
        background: #FFD700;
        border: none;
     
        cursor: pointer;
        border-radius: 40px;
        width: 18px;
        height: 18px;
        color: white;
    font-size: 13px;
    font-weight: bold;
    width: 30px;
    height: 30px;
  
   
    border-radius: 50%;
    }
    .remove {
        background: rgb(12, 11, 11);
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 40px;
    }
    .cart-summary {
        text-align: right;
        margin-top: 20px;
    }
    .order-now {
        width: 100%;
        padding: 10px;
        background: #FFD700;
        color: rgb(9, 8, 8);
        border: none;
        cursor: pointer;
        font-size: 18px;
        border-radius: 20px;
    }

    .cart-count-badge {
    position: absolute;
    top: -2px;
    right: 115px;
    background: red;
    color: white;
    font-size: 12px;
    font-weight: bold;
    width: 18px;
    height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    
}
#cart-count{
    color: #f6f5f5;
}
.tax2{
    border-top: 2px solid #ddd;
    
}
.bak a{
        color: #666;
       
    }
    .cart-count-badge {
    position: absolute;
    top: 0;
    right: 0;
    background: red;
    color: white;
    font-size: 10px;
    font-weight: bold;
    width: 18px;
    height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    
    transform: translate(50%, -50%); /* Center on top-right */
}
.cart-icon-container {
    position: relative; /* Ensures the badge positions correctly */
    display: inline-block; /* Keeps it inline */
}
.wishlist-icon-container {
    position: relative; /* Ensures the badge positions correctly */
    display: inline-block; /* Keeps it inline */
}

.love-icon.active {
    color: red;
    -webkit-text-stroke: 2px rgb(248, 5, 5); /* Gray border */
}
#wishlist-count {
    position: absolute;
    top: 0;
    right: 6px;
    background: red;
    color: white;
    font-size: 10px;
    font-weight: bold;
    width: 18px;
    height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    
    transform: translate(50%, -50%); /* Center on top-right */
}
</style>
<body>
    <header class="top-header">
        <div class="logo">
          <a href="index.php"><img src="Black_and_White_Modern_Minimalist_Streetwear_Logo-removebg-preview.png" alt="MR SEE CHICKEN Logo"></a>  
        </div>
              
    
       
        <button class="menu-toggle">&#9776;</button> <!-- ☰ Menu Button -->
  
        <nav class="nav-menu">
            
            <ul>
                <li><a href="about.html">About Us</a></li>
                <li><a href="menu.html">Menu</a></li>
                <li><a href="#">Order</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>

    </header>
    
    <!-- Sidebar Menu -->
    <div class="sidebar">
        <button class="close-btn">&times;</button> <!-- Close Button -->
        <ul>
            <li><a href="about.html">About Us</a></li>
            <li><a href="menu.html">Menu</a></li>
            <li><a href="#">Order</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </div>
    

    <section class="cart-container">
        <div class="cart-header">
            <h1>Your Cart</h1>
        </div>
        
    </div>
    
    <div class="cart-items" id="cart-items">
        <!-- Cart items will be dynamically added here -->
    </div>
    <div class="bak">
        <a href="index.php">⬅ Back to Home</a>
    </div>
    <div class="cart-summary">
        <p>Subtotal: <span id="subtotal">₦0</span></p>
        <p>Tax Fee: <span id="tax">₦30</span></p>
        <p  class="tax2">Total: <span id="total">₦30</span></p>
        <button class="order-now" onclick="proceedToOrder()">Order Now</button>

    </div>
    </section>
    
    

<br>
<br>
<br>
<footer>
    <a href="index.php">
      <i class="fas fa-home"></i>
      <span>Home</span>
    </a>
    
    
    <a href="love.html">
        <div class="wishlist-icon-container">
      <i class="fas fa-heart"></i>
      <span id="wishlist-count">0</span>
      <span>Favorite</span>
      </div>
    </a>
    <a class="solo" href="cart.php">
        <div class="cart-icon-container">
        <i class="fa fa-shopping-cart"></i>
        <span id="cart-count" class="cart-count-badge" style="display: none;">0</span>
        <span>Cart</span>
    </div>
      </a>
    <a href="ussr.php">
      <i class="fas fa-user"></i>
      <span>Account</span>
    </a>
  </footer>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        const cartItemsContainer = document.getElementById("cart-items");
        const subtotalEl = document.getElementById("subtotal");
        const totalEl = document.getElementById("total");
       

    
 // Create a message element for an empty cart
 const emptyMessage = document.createElement("p");
    emptyMessage.id = "empty-cart-message";
    emptyMessage.textContent = "Your cart is empty.";
    emptyMessage.style.textAlign = "center";
    emptyMessage.style.fontSize = "18px";
    emptyMessage.style.color = "black";
    cartItemsContainer.appendChild(emptyMessage);

    function updateCartDisplay() {
    cartItemsContainer.innerHTML = ""; // Clear previous content
    let subtotal = 0;

    if (cart.length === 0) {
        cartItemsContainer.appendChild(emptyMessage); // Show empty message
    } else {
        cart.forEach((item, index) => {
            let cartItem = document.createElement("div");
            cartItem.classList.add("cart-item");
            cartItem.innerHTML = `
                <img src="${item.image}" alt="${item.name}">
                <div class="item-details">
                    <h3>${item.name}</h3>
                    <p>₦${item.price}</p>
                    <div class="quantity-control">
                        <button class="decrease" onclick="changeQuantity(${index}, -1)">-</button>
                        <span class="quantity">${item.quantity}</span>
                        <button class="increase" onclick="changeQuantity(${index}, 1)">+</button>
                    </div>
                </div>
                <button class="remove" onclick="removeItem(${index})">×</button>
            `;
            cartItemsContainer.appendChild(cartItem);
            subtotal += item.price * item.quantity;
        });
    }

    let tax = subtotal * 0.05; // ✅ 5% of subtotal
    let total = subtotal + tax; // ✅ Total = Subtotal + 5% tax

    subtotalEl.textContent = `₦${subtotal.toFixed(2)}`;
    document.getElementById("tax").textContent = `₦${tax.toFixed(2)}`; // ✅ Tax display
    totalEl.textContent = `₦${total.toFixed(2)}`;
}


        window.changeQuantity = function (index, change) {
            cart[index].quantity += change;
            if (cart[index].quantity <= 0) {
                cart.splice(index, 1);
            }
            localStorage.setItem("cart", JSON.stringify(cart));
            updateCartDisplay();
        };

        window.removeItem = function (index) {
            cart.splice(index, 1);
            localStorage.setItem("cart", JSON.stringify(cart));
            updateCartDisplay();
        };

        updateCartDisplay();
     
        const cartCountEl = document.getElementById("cart-count");

        function updateCartCount() {
            let totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            if (totalItems > 0) {
                cartCountEl.style.display = "flex";
                cartCountEl.textContent = totalItems;
            } else {
                cartCountEl.style.display = "none";
            }
        }

        updateCartCount(); // Call on page load

        // Modify "Add to Cart" function to update count dynamically
        document.querySelectorAll(".add-to-cart").forEach(button => {
            button.addEventListener("click", function () {
                let name = this.getAttribute("data-name");
                let price = parseInt(this.getAttribute("data-price").replace(",", ""));
                let image = this.getAttribute("data-image");

                let existingItem = cart.find(item => item.name === name);
                if (existingItem) {
                    existingItem.quantity += 1;
                } else {
                    cart.push({ name, price, image, quantity: 1 });
                }

                localStorage.setItem("cart", JSON.stringify(cart));
                updateCartCount();
            });
        });

        // Modify "Remove Item" function to update count when an item is removed
        window.removeItem = function(index) {
            cart.splice(index, 1);
            localStorage.setItem("cart", JSON.stringify(cart));
            updateCartDisplay();
            updateCartCount();
        };

        // Modify "Change Quantity" function to update count
        window.changeQuantity = function(index, change) {
            cart[index].quantity += change;
            if (cart[index].quantity <= 0) {
                cart.splice(index, 1);
            }
            localStorage.setItem("cart", JSON.stringify(cart));
            updateCartDisplay();
            updateCartCount();
        };
    });

        

</script>
<script>
    function proceedToOrder() {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];

        if (cart.length === 0) {
            alert("Your cart is empty! Add items before proceeding.");
            return;
        }

        // Save cart data before redirecting
        localStorage.setItem("orderCart", JSON.stringify(cart));

        // Redirect to the order page
        window.location.href = "order.php";
    }
</script>

<script src="script.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];
    const wishlistCountEl = document.getElementById("wishlist-count");

    // Function to update the wishlist count
    function updateWishlistCount() {
        wishlistCountEl.textContent = wishlist.length;
        wishlistCountEl.style.display = wishlist.length > 0 ? "flex" : "none";
    }

    // Check existing wishlist items and update icons on page load
    document.querySelectorAll(".wishlist").forEach(button => {
        let name = button.parentElement.querySelector("h3").textContent;
        let isInWishlist = wishlist.some(item => item.name === name);
        
        if (isInWishlist) {
            button.querySelector(".love-icon").classList.add("active");
        }

        button.addEventListener("click", function () {
            let price = parseInt(button.parentElement.querySelector("p").textContent.replace("₦", "").replace(",", ""));
            let image = button.parentElement.querySelector("img").src;
            let rating = button.parentElement.querySelector(".rating").textContent.replace("⭐ ", "");

            let existingItem = wishlist.find(item => item.name === name);
            if (existingItem) {
                wishlist = wishlist.filter(item => item.name !== name);
                button.querySelector(".love-icon").classList.remove("active");
            } else {
                wishlist.push({ name, price, image, rating });
                button.querySelector(".love-icon").classList.add("active");
            }

            localStorage.setItem("wishlist", JSON.stringify(wishlist));
            updateWishlistCount(); // Update count when items are added/removed
        });
    });

    updateWishlistCount(); // Call on page load
});

</script>

</body>


</html>
































