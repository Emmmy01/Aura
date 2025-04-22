
<?php
include 'authentication.php';
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
   
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

.order-container {
    max-width: 600px;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

.order-summary {
    background: #fff;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.order-summary p {
    font-size: 16px;
    margin: 8px 0;
}

input, select, textarea {
    width: 97%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}
input{
    width: 90%;
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
    color: #000;
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
.but {
    width: 80%;
    padding: 10px;
    background: #FFD700;
    color: rgb(3, 3, 3);
    border: none;
    cursor: pointer;
    font-size: 18px;
    border-radius: 50px;
}

.but:hover {
    background: rgb(251, 255, 19);
}
.text{
    border-bottom: 3px  solid #FFD700;
    display: inline-block; 
 
    font-size: 30px;
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
/* Center the form on the page */
.form-container {
    max-width: 450px;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 40px auto;
    font-family: 'Poppins', sans-serif;
}

/* Form title */
.form-container h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

/* Labels */
.form-container label {
    font-weight: 600;
    color: #444;
    display: block;
    margin: 10px 0 5px;
}

/* Input fields & dropdowns */
.form-container input, 
.form-container select {
    
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: 0.3s ease-in-out;
    outline: none;
}

/* Input focus effect */
.form-container input:focus,
.form-container select:focus {
    border-color: #ffb703;
    box-shadow: 0 0 5px rgba(255, 183, 3, 0.5);
}

/* Hide the address field by default */
#addressField {
    display: none;
}

/* Button styles */
.form-container button {
    width: 100%;
    background: #ffb703;
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    padding: 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 15px;
    transition: 0.3s ease;
}

.form-container button:hover {
    background: #ff9900;
}

/* Order Summary */
#order-summary {
    background: #f8f8f8;
    padding: 15px;
    border-radius: 5px;
    margin-top: 20px;
}

#order-summary h3 {
    color: #444;
    font-size: 18px;
    margin-bottom: 10px;
}

#order-summary p {
    font-size: 14px;
    color: #666;
    margin: 5px 0;
}

/* Responsive Design */
@media (max-width: 500px) {
    .form-container {
        width: 90%;
        padding: 15px;
    }

    .form-container button {
        font-size: 14px;
        padding: 10px;
    }
}

    #loadingOverlay {
        display: none;
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .spinner-circle {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        border: 6px solid #f3f3f3;
        border-top: 6px solid #3498db;
        animation: spin 1s linear infinite;
        position: relative;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .checkmark {
        display: none;
        width: 70px;
        height: 70px;
        border-radius: 50%;
        border: 6px solid #2ecc71;
        position: relative;
        animation: pop 0.3s ease-in-out forwards;
    }
    .checkmark::after {
    content: '';
    position: absolute;
    left: 50%;
    top: 50%;
    width: 15px;
    height: 30px;
    border-right: 4px solid #2ecc71;
    border-bottom: 4px solid #2ecc71;
    transform: translate(-50%, -50%) rotate(45deg);
    opacity: 0;
    animation: checkmark-stroke 0.4s ease forwards 0.2s;
}


    @keyframes checkmark-stroke {
        to {
            opacity: 1;
        }
    }

    @keyframes pop {
        0% { transform: scale(0.5); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
    }



</style>
<body>

<header class="top-header">
    <div class="logo">
        <a href="index.php">
            <img src="Black_and_White_Modern_Minimalist_Streetwear_Logo-removebg-preview.png" alt="MR SEE CHICKEN Logo">
        </a>  
    </div>
    <button class="menu-toggle">&#9776;</button>
    <nav class="nav-menu">
        <ul>
            <li><a href="about.html">About Us</a></li>
            <li><a href="menu.html">Menu</a></li>
            <li><a href="#">Order</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </nav>
</header>

<div class="sidebar" style="display:none">
    <button class="close-btn">&times;</button>
    <ul>
        <li><a href="about.html">About Us</a></li>
        <li><a href="menu.html">Menu</a></li>
        <li><a href="#">Order</a></li>
        <li><a href="contact.html">Contact</a></li>
    </ul>
</div>
<div id="loadingOverlay">
    <div id="spinnerContainer">
        <div id="spinner" class="spinner-circle"></div>
        <div id="checkmark" class="checkmark"></div>
    </div>
</div>


<div id="successMessage"></div>

<!-- DELIVERY FORM -->
<div class="form-container">
    <h2>Delivery Form</h2>
    <form id="orderForm" action="order_submit.php" method="POST">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone Number</label>
        <input type="text" id="phone" name="phone" required>

        <label for="delivery-method">Delivery Method</label>
        <select id="delivery-method" name="delivery-method" required>
            <option value="">Select Method</option>
            <option value="pickup">Pickup</option>
            <option value="delivery">Home Delivery</option>
        </select>

        <div id="addressField" style="display: none">
            <label for="address">Enter Your Home Address</label>
            <input type="text" id="address" name="address" placeholder="123 Street, Osogbo" />
        </div>

        <div id="pickupStations" style="display: none">
            <label for="pickup-location">Select Pickup Station</label>
            <select id="pickup-location" name="pickup-location">
                <option value="station1">📍 Second Gate Opposite Q09 Hotel</option>
                <option value="station2">📍 Small Gate Opposite Uncle K Hostel</option>
            </select>
        </div>

        <input type="hidden" name="order-summary" id="order-summary-input">
        <input type="hidden" name="total" id="total-input">

        <button id="confirmButton" type="submit">Confirm</button>
    </form>
</div>

<!-- ORDER SUMMARY -->
<h3>Order Summary</h3>
<div id="order-summary"></div>

<!-- PAYMENT FORM -->
<div id="Paymentform" class="form-container">
    <h2>Payment Form</h2>
    <form id="order-payment-form">
        <label for="payerName">Full Name</label>
        <input type="text" id="payerName" name="payerName" required>

        <label for="payerEmail">Email</label>
        <input type="email" id="payerEmail" name="payerEmail" required>

        <label for="totalAmount">Total Amount (₦)</label>
        <input type="text" id="total" name="totalAmount" readonly>

        <button type="button" onclick="payWithPaystack()">Pay</button>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const deliveryMethod = document.getElementById("delivery-method");
    const addressField = document.getElementById("addressField");
    const pickupStations = document.getElementById("pickupStations");
    const orderSummaryEl = document.getElementById("order-summary");
    const orderSummaryInput = document.getElementById("order-summary-input");
    const totalInput = document.getElementById("total-input");
    const totalAmountEl = document.getElementById("total");
    const savedAddress = localStorage.getItem("selectedAddress");
   

    if (savedAddress) {
        document.getElementById("address").value = savedAddress;
        deliveryMethod.value = "delivery";
        addressField.style.display = "block";
        localStorage.removeItem("selectedAddress");
    }

    deliveryMethod.addEventListener("change", () => {
        if (deliveryMethod.value === "delivery") {
            addressField.style.display = "block";
            pickupStations.style.display = "none";
        } else if (deliveryMethod.value === "pickup") {
            pickupStations.style.display = "block";
            addressField.style.display = "none";
        } else {
            addressField.style.display = "none";
            pickupStations.style.display = "none";
        }
    });

    // Load cart from localStorage
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    let subtotal = 0;
    let summaryText = "";

    if (cart.length === 0) {
        orderSummaryEl.innerHTML = "<p>Your cart is empty.</p>";
        totalAmountEl.value = "0.00";
    } else {
        orderSummaryEl.innerHTML = cart.map(item => {
            const itemTotal = item.price * item.quantity;
            subtotal += itemTotal;
            summaryText += `${item.name} x ${item.quantity} - ₦${itemTotal}\n`;
            return `<p>${item.name} x ${item.quantity} - ₦${itemTotal}</p>`;
        }).join("");
    }
    let tax = subtotal * 0.05; // ✅ 5% of subtotal
    let total = subtotal + tax; // ✅ Total = Subtotal + 5% tax
    totalInput.value = total.toFixed(2);
    totalAmountEl.value = total.toFixed(2);
    orderSummaryInput.value = summaryText;
    localStorage.setItem("total", total.toFixed(2));
});
    
    // PAYSTACK INTEGRATION
    function payWithPaystack() {
    let payerName = document.getElementById("payerName").value.trim();
    let payerEmail = document.getElementById("payerEmail").value.trim();
    let totalAmount = document.getElementById("total").value.trim();

    if (!totalAmount || isNaN(totalAmount) || totalAmount <= 0) {
        alert("Invalid amount. Please ensure your total amount is set.");
        return;
    }

    let amountInKobo = parseInt(totalAmount) * 100;

    var handler = PaystackPop.setup({
        key: "pk_test_e1f63a3ba7522fab44967e242e26e0cd1d6fbdd2",
        email: payerEmail,
        amount: amountInKobo,
        currency: "NGN",
        ref: "TXN_" + Math.floor(Math.random() * 1000000000 + 1),
        callback: function (response) {
            let paymentRef = response.reference;

            // Verify payment via PHP
            fetch("payment_callback.php?reference=" + paymentRef)
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    alert("Payment successful! Your order has been placed.");

                    // Clear local storage after server confirmation
                    localStorage.removeItem("cart");

                    // Redirect to Thank You page
                    window.location.href = data.redirect;
                } else {
                    alert("Payment verification failed. Please try again.");
                }
            })
            .catch(error => console.error("Error verifying payment:", error));
        },
        onClose: function () {
            alert("Transaction was not completed. Please try again.");
        },
    });

    handler.openIframe();
}

    
  
    </script>
    <script>
document.getElementById("delivery-method").addEventListener("change", function() {
    let method = this.value;
    document.getElementById("addressField").style.display = (method === "delivery") ? "block" : "none";
    document.getElementById("pickupStations").style.display = (method === "pickup") ? "block" : "none";
});
</script>

    
    <script src="https://js.paystack.co/v1/inline.js"></script>
    
    
    
    <br>
    <br>
    <br>



<script>
document.getElementById("orderForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const form = e.target;
    const loadingOverlay = document.getElementById("loadingOverlay");
    const spinner = document.getElementById("spinner");
    const checkmark = document.getElementById("checkmark");

    // Show spinner
    loadingOverlay.style.display = "flex";
    spinner.style.display = "block";
    checkmark.style.display = "none";

    // Send AJAX request
    const formData = new FormData(form);
    fetch("order_submit.php", {
        method: "POST",
        body: formData
    })
    .then(response => {
        if (!response.ok) throw new Error("Submission failed");
        return response.text();
    })
    .then(data => {
        // Show checkmark animation
        spinner.style.display = "none";
        checkmark.style.display = "block";

        // Wait 1s, then scroll and hide overlay
        setTimeout(() => {
            loadingOverlay.style.display = "none";
            document.getElementById("Paymentform").scrollIntoView({ behavior: "smooth" });
        }, 1500);
    })
    .catch(error => {
        loadingOverlay.style.display = "none";
        alert("Something went wrong. Please try again.");
        console.error(error);
    });
});
</script>

</body>
</html>
