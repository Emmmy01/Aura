document.addEventListener("DOMContentLoaded", function () {
    fetch("get_products.php")
        .then(response => response.json())
        .then(products => {
            let productList = document.getElementById("productList");
            productList.innerHTML = ""; // Clear previous items

            products.forEach((product) => {
                let productHTML = `
                    <div class="food-item">
                        <button class="wishlist" onclick="toggleWishlist('${product.name}', '${product.price}', '${product.image}', '${product.details_page}')">
                            <i class="fas fa-heart love-icon"></i>
                        </button>
                        <a href="${product.details_page}">
                            <img src="${product.image}" alt="${product.name}">
                            <h3>${product.name}</h3>
                        </a>
                        <div class="price-rating">
                            <p>₦${product.price}</p>
                            <span class="rating">⭐ ${product.rating}</span>
                        </div>
                        <button class="add-to-cart" onclick="addToCart('${product.name}', '${product.price}', '${product.image}')">Add to Cart</button>
                    </div>
                `;
                productList.innerHTML += productHTML;
            });
        });
});

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
            let detailsPage = button.parentElement.querySelector("a").getAttribute("href"); // Get the product page link

            let existingItem = wishlist.find(item => item.name === name);
            if (existingItem) {
                wishlist = wishlist.filter(item => item.name !== name);
                button.querySelector(".love-icon").classList.remove("active");
            } else {
                wishlist.push({ name, price, image, rating, detailsPage});
                button.querySelector(".love-icon").classList.add("active");
            }

            localStorage.setItem("wishlist", JSON.stringify(wishlist));
            updateWishlistCount(); // Update count when items are added/removed
        });
    });

    updateWishlistCount(); // Call on page load
});

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