document.querySelectorAll(".wishlist").forEach(button => {
    button.addEventListener("click", () => {
        button.style.color = button.style.color === "red" ? "black" : "red";
    });
});
document.querySelectorAll(".category").forEach(button => {
    button.addEventListener("click", () => {
        document.querySelectorAll(".category").forEach(btn => btn.classList.remove("active"));
        button.classList.add("active");
    });
});
const menuToggle = document.querySelector(".menu-toggle");
const sidebar = document.querySelector(".sidebar");
const closeBtn = document.querySelector(".close-btn");

menuToggle.addEventListener("click", () => {
    sidebar.style.left = "0";
});

closeBtn.addEventListener("click", () => {
    sidebar.style.left = "-250px";
});
document.addEventListener("DOMContentLoaded", function () {
    const fadeInElements = document.querySelectorAll(".fade-in");

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = 1;
                entry.target.style.transform = "translateY(0)";
            }
        });
    }, { threshold: 0.2 });

    fadeInElements.forEach(element => {
        observer.observe(element);
    });
});
const menuData = {
    burger: [
        { img: "crack_burgers_--removebg-preview.png", name: "Cheese Burger", price: "₦2,000" },
        { img: "40_Dinner_Ideas_for_Tonight__+_Easy_Recipes_-removebg-preview.png", name: "Double Beef Burger", price: "₦2,000"},
        { img: "Classic_Cheeseburger__25_Minutes_-removebg-preview.png", name: "Spicy Chicken Burger", price: "₦2,000"},
        { img: "𝗙_𝗪_𝘀_𝗨𝗹𝘁𝗶𝗺𝗮𝘁𝗲_𝗕𝘂𝗿𝗴𝗲𝗿____Meat_-removebg-preview.png", name: "Classic Burger", price: "₦2,000"}
    ],
    pizza: [
        { img: "c9ad6624-ec79-4e25-83c9-4e9b5b21fd22-removebg-preview.png", name: "Pepperoni Pizza", price: "₦6,000"},
        { img: "Crispy_Pictures___Freepik-removebg-preview.png", name: "Veggie Pizza", price: "₦4,000" },
        { img: "Generative_AI_pizza_isolated_on_white_background___Premium_photo-removebg-preview.png", name: "BBQ Chicken Pizza", price: "₦5,000",  },
        { img: "Crispy_Pictures___Freepik-removebg-preview.png", name: "Margarita Pizza", price: "₦4,900"}
    ],
    drinks: [
        { img: "FANTA__300ml____Imported_from_India___Refreshing_Drink-removebg-preview.png", name: "Fanta Soft Drink", price: "₦900",  },
        { img: "Sprite_Undergoes_Global_Brand_Refresh-removebg-preview.png", name: "Sprite Soft Drink", price: "₦500"},
        { img: "280ml_Premium_Falooda_milk_Drink_with_Latte_flavour_canada-removebg-preview.png", name: "Falooda milk Drink", price: "₦900"},
        { img: "Can_Zobo_drink_branding-removebg-preview.png", name: "Zobo Drink", price: "₦2,000"}
    ]
};

function showMenu(type) {
    let menuDisplay = document.getElementById("menu-display");
    menuDisplay.innerHTML = "";

    menuData[type].forEach(item => {
        menuDisplay.innerHTML += `
            <div class="food-item2">
               
                <img src="${item.img}" alt="${item.name}">
                <h3>${item.name}</h3>
                <div class="food-info2">
                    <span class="price2">${item.price}</span>
          
                    <button class="add-btn2">+</button>
                </div>
            </div>
        `;
    });

    document.querySelectorAll(".menu-btn2").forEach(btn => btn.classList.remove("active"));
    document.querySelector(`[onclick="showMenu('${type}')"]`).classList.add("active");
}
document.addEventListener("DOMContentLoaded", function() {
    const cateringSection = document.querySelector(".catering-section");

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                cateringSection.classList.add("show");
            }
        });
    }, { threshold: 0.3 });

    observer.observe(cateringSection);
});
document.addEventListener("DOMContentLoaded", function() {
    const orderingSection = document.querySelector(".ordering-process");

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                orderingSection.classList.add("show");
            }
        });
    }, { threshold: 0.3 });

    observer.observe(orderingSection);
});
$(document).ready(function() {
    $(".menu-category").click(function() {
        $(this).next(".menu-items").slideToggle(300);
    });
});






    document.addEventListener("DOMContentLoaded", function() {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];

        document.querySelectorAll(".add-to-cart").forEach(button => {
            button.addEventListener("click", function() {
                let name = this.getAttribute("data-name");
                let price = parseInt(this.getAttribute("data-price"));
                let image = this.getAttribute("data-image");

                let existingItem = cart.find(item => item.name === name);
                if (existingItem) {
                    existingItem.quantity += 1;
                } else {
                    cart.push({ name, price, image, quantity: 1 });
                }

                localStorage.setItem("cart", JSON.stringify(cart));
                alert("Item added to cart!");
            });
        });
    });

    
   


document.addEventListener("DOMContentLoaded", function () {
    const cartIcon = document.getElementById("cart-icon");
    const cartSidebar = document.getElementById("cart-sidebar");
    const closeCart = document.getElementById("close-cart");
    const cartOverlay = document.getElementById("cart-overlay");

    // Open cart sidebar
    cartIcon.addEventListener("click", function () {
        console.log("Cart icon clicked"); // Debugging
        cartSidebar.classList.add("open");
        cartOverlay.classList.add("active");
    });

    // Close cart sidebar
    closeCart.addEventListener("click", function () {
        console.log("Close cart clicked"); // Debugging
        cartSidebar.classList.remove("open");
        cartOverlay.classList.remove("active");
    });

    // Close cart sidebar when clicking outside
    cartOverlay.addEventListener("click", function () {
        console.log("Overlay clicked"); // Debugging
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

