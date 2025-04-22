document.addEventListener("DOMContentLoaded", function () {
    const cartIcon = document.getElementById("cart-icon");
    const cartSidebar = document.getElementById("cart-sidebar");
    const closeCart = document.getElementById("close-cart");
    const cartOverlay = document.getElementById("cart-overlay");

    // Open cart sidebar
    cartIcon.addEventListener("click", function () {
        cartSidebar.classList.add("open");
        cartOverlay.classList.add("active");
    });

    // Close cart sidebar
    closeCart.addEventListener("click", function () {
        cartSidebar.classList.remove("open");
        cartOverlay.classList.remove("active");
    });

    // Close cart sidebar when clicking outside
    cartOverlay.addEventListener("click", function () {
        cartSidebar.classList.remove("open");
        cartOverlay.classList.remove("active");
    });

   
    // Function to load cart items into the sidebar
    function loadCartItems() {
        const cartItemsContainer = document.getElementById("cart-items");
        cartItemsContainer.innerHTML = ""; // Clear existing items
        let totalItems = 0;

        cartItems.forEach(item => {
            const cartItemDiv = document.createElement("div");
            cartItemDiv.classList.add("cart-item");
            cartItemDiv.innerHTML = `
                <img src="${item.image}" alt="${item.name}">
                <div class="details">
                    <p>${item.name}</p>
                    <p>₦${item.price}</p>
                </div>
                <span class="remove" onclick="removeItem(${item.id})">&times;</span>
            `;
            cartItemsContainer.appendChild(cartItemDiv);
            totalItems++;
        });

        // Update cart count badge
        const cartCount = document.getElementById("cart-count");
        if (totalItems > 0) {
            cartCount.style.display = "flex";
            cartCount.textContent = totalItems;
        } else {
            cartCount.style.display = "none";
        }
    }

    // Remove item function (placeholder)
    window.removeItem = function (id) {
        alert("Remove item with ID: " + id);
    };

    // Load cart items on page load
    loadCartItems();
});

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

