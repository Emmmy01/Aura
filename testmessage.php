

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

</style>
<body>
    <header class="top-header">
        <div class="logo">
          <a href="index.html"><img src="Black_and_White_Modern_Minimalist_Streetwear_Logo-removebg-preview.png" alt="MR SEE CHICKEN Logo"></a>  
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
    
        <h2>Delivery Form</h2>
        <form id="orderForm" action="order_submit.php" method="POST">
    <label for="name">Full Name</label>
    <input type="text" id="name" name="name" required />

    <label for="email">Email Address</label>
    <input type="email" id="email" name="email" required />

    <label for="phone">Phone Number</label>
    <input type="text" name="phone" id="phone" required />

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

    <button type="submit">Confirm</button>
</form>

<h3>Order Summary</h3>
      <div id="order-summary"></div>
    <div class="form-container">
<script>
    document.getElementById("delivery-method").addEventListener("change", function () {
        let method = this.value;
        let addressField = document.getElementById("addressField");
        let pickupStations = document.getElementById("pickupStations");

        if (method === "delivery") {
            addressField.style.display = "block";
            pickupStations.style.display = "none";
        } else if (method === "pickup") {
            pickupStations.style.display = "block";
            addressField.style.display = "none";
        } else {
            addressField.style.display = "none";
            pickupStations.style.display = "none";
        }
    });

    document.getElementById("order-form").addEventListener("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        formData.append("orderCart", localStorage.getItem("cart")); // Send cart items

        fetch("process_order.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                alert("Success!");
                localStorage.removeItem("cart"); // Clear cart after order
            
            } else {
                alert(data.message);
            }
        })
        .catch(error => console.error("Error:", error));
    });
</script>
<script>
        document.addEventListener("DOMContentLoaded", function () {
          let cart = JSON.parse(localStorage.getItem("cart")) || [];
          const orderSummaryEl = document.getElementById("order-summary");
          const totalAmountEl = document.getElementById("total");
          let subtotal = 0;
          let taxFee = 300;
  
          if (cart.length === 0) {
            orderSummaryEl.innerHTML = "<p>Your cart is empty.</p>";
            totalAmountEl.value = "0.00";
          } else {
            orderSummaryEl.innerHTML = cart
              .map((item) => {
                let itemTotal = item.price * item.quantity;
                subtotal += itemTotal;
                return `<p>${item.name} x ${item.quantity} - ₦${itemTotal}</p>`;
              })
              .join("");
          }
  
          let total = subtotal + taxFee;
          totalAmountEl.value = total.toFixed(2);
          localStorage.setItem("total", total.toFixed(2));
        });
  
        // DELIVERY METHOD HANDLING
        document.addEventListener("DOMContentLoaded", function () {
          const deliveryMethod = document.getElementById("delivery-method");
          const addressField = document.getElementById("addressField");
          const pickupStations = document.getElementById("pickupStations");
  
          deliveryMethod.addEventListener("change", function () {
            if (this.value === "delivery") {
              addressField.style.display = "block";
              pickupStations.style.display = "none";
            } else if (this.value === "pickup") {
              addressField.style.display = "none";
              pickupStations.style.display = "block";
            } else {
              addressField.style.display = "none";
              pickupStations.style.display = "none";
            }
          });
        });
      </script>
          <script>
document.getElementById("delivery-method").addEventListener("change", function() {
    let method = this.value;
    document.getElementById("addressField").style.display = (method === "delivery") ? "block" : "none";
    document.getElementById("pickupStations").style.display = (method === "pickup") ? "block" : "none";
});
</script>
      </body>
</html>
