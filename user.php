
<?php
include 'authentication.php';
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Page</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <style>
      body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: black;
      }
      .user-page {
        max-width: 400px;
        margin: auto;
      }
      header {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 15px;
        position: sticky;
        top: 0;
      }
      .profile-section {
        background-color: black;
        padding: 20px;
        text-align: center;
        color: white;
      }
      .profile-section img {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        margin-bottom: 10px;
        display: none;
      }
      .default-icon {
        font-size: 50px;
        color: gray;
        display: inline-block;
        background-color: rgb(88, 82, 82);
        padding: 48px;
        border-radius: 130px;
      }
      .profile-section h3 {
        margin: 5px 0;
      }
      .profile-section p {
        color: gray;
        margin: 5px 0;
      }
      .profile-section button {
        margin-top: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
      }
      .navigation-menu {
        margin-top: 20px;
        padding: 0;
        list-style: none;
      }
      .navigation-menu li {
        background-color: rgb(11, 11, 11);
        padding: 15px;
        display: flex;
        align-items: center;
        border-bottom: 1px solid #262525;
        cursor: pointer;
        color: white;
      }
      .navigation-menu li i {
        color: #007bff;
        margin-right: 10px;
      }
      .navigation-menu li:hover {
        background-color: #2f2d2d;
      }
      .quick-actions {
        text-align: center;
        margin: 20px 0;
      }
      .quick-actions button {
        margin: 5px;
        background-color: #333;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
      }
      .activity-dashboard {
        margin: 20px;
      }
      .activity-dashboard h3 {
        margin-bottom: 10px;
        color: white;
      }
      .activity-dashboard .order {
        display: flex;
        align-items: center;
        background-color: rgb(8, 8, 8);
        padding: 10px;
        color: white;
        border-radius: 5px;
        margin-bottom: 10px;
      }
      .activity-dashboard .order img {
        width: 50px;
        height: 50px;
        border-radius: 5px;
        margin-right: 10px;
      }
      .solo i {
        color: #007bff;
      }
      footer {
        display: flex;
        justify-content: space-around;
        align-items: center;
        position: fixed;
        bottom: 0;
        width: 100%;
        background: #000;
        padding: 10px 0;
        z-index: 1;
      }
      footer i {
        font-size: 1.5rem;
        color: #fff;
        cursor: pointer;
        z-index: 1;
      }
      footer i:hover {
        color: #007bff;
      }
      .connect {
        font-size: 10px;
      }
      .yellow {
        color: yellow;
      }
      .green {
        color: green;
      }
      a {
        text-decoration: none;
      }
      #user-name{
        font-size: 12px;
        
        border-bottom:  1px solid  #007bff;
        
        padding: 9px;
        
        
        
      }
      .solo span{
      color: #007bff;
      
    }
    
    footer {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background-color: black;
      display: flex;
      justify-content: space-around;
      align-items: center;
      padding: 10px 0;
      border-top: 1px solid rgb(5, 5, 5);
      box-shadow: 0 -1px 5px rgba(0, 0, 0, 0.1);
      z-index: 1000;
    }

    footer a {
      text-decoration: none;
      color: #333;
      text-align: center;
      font-size: 14px;
      flex: 1;
    }

    footer a i {
      font-size: 20px;
      display: block;
      margin-bottom: 5px;
    }

    footer a span {
      display: block;
      font-size: 12px;
      color: white;
    }
   
    #cart-count {
      position: absolute;
      top: -8px;
      right: 21%;
      background-color: red;
      color: white;
      border-radius: 50%;
      font-size: 12px;
      font-weight: bold;
      padding: 2px 6px;
      display: inline-block;
    }
    .space2 {
      position: relative;
      flex: 1;
      text-align: center;
    }
      
    </style>
  </head>
  <body>
    <br />
    
    <div class="user-page">
      <!-- Profile Section -->
      <div class="profile-section">
        <img id="profile-picture-preview" src="" alt="Profile Picture" />
        <i class="fas fa-user default-icon"></i>
      
        <h3 id="user-name">
        <tr>
        <?= $_SESSION['auth_user']['username']; ?>
      
      
          
        </h3>
        <br>

        <button id="edit-profile-button" onclick="uploadPicture()">
          Edit Profile
        </button>
      </div>

      <!-- Navigation Menu -->
      <ul class="navigation-menu">
        <li><i class="fas fa-history"></i> Order History</li>
        <a href="love.html"
          ><li><i class="fas fa-heart"></i> Wishlist</li></a
        >
        <li><i class="fas fa-map-marker-alt"></i> Address Book</li>
        <li><i class="fas fa-credit-card"></i> Payment Methods</li>
        <li><i class="fas fa-cog"></i> Settings</li>
      </ul>

      <!-- Quick Actions -->
      <div class="quick-actions">
        <button>Contact Support</button>
        <?php if(isset($_SESSION['authenticated'])) :  ?>
        <a href="logout.php"><button>Logout</button></a>
        <?php endif ?>
        <?php if(!isset($_SESSION['authenticated'])) :  ?>
        <a href="login.php"><button>Login</button></a>
        <?php endif ?>
      </div>

    

      <!-- Hidden Input for Upload -->
      <input
        type="file"
        id="profile-picture-input"
        accept="image/*"
        style="display: none"
      />
    </div>
    <br />
    <br />

    <footer>
    <a href="index.php">
      <i class="fas fa-home"></i>
      <span>Home</span>
    </a>
    <div class="space2">
      <a href="cart.html">
        <i class="fas fa-shopping-cart"></i>
        <span>Cart</span>
        <span id="cart-count">0</span>
      </a>
    </div>
    <a href="love.html">
      <i class="fas fa-heart"></i>
      <span>Favorite</span>
    </a>
    <a  class="solo" href="user.php">
      <i class="fas fa-user"></i>
      <span>Account</span>
    </a>
  </footer>
    <script>
      const profilePictureInput = document.getElementById(
        "profile-picture-input"
      );
      const profilePicturePreview = document.getElementById(
        "profile-picture-preview"
      );
      const defaultIcon = document.querySelector(".default-icon");

      // Load profile picture from localStorage if available
      window.onload = () => {
        const savedImage = localStorage.getItem("profilePicture");
        if (savedImage) {
          profilePicturePreview.src = savedImage;
          profilePicturePreview.style.display = "inline-block";
          defaultIcon.style.display = "none";
        }
      };

      function uploadPicture() {
        profilePictureInput.click();
      }

      profilePictureInput.addEventListener("change", (event) => {
        const file = event.target.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = (e) => {
            profilePicturePreview.src = e.target.result;
            profilePicturePreview.style.display = "inline-block";
            defaultIcon.style.display = "none";

            // Save the uploaded picture to localStorage
            localStorage.setItem("profilePicture", e.target.result);
          };
          reader.readAsDataURL(file);
        }
      });
    </script>

    <script>
      function uploadPicture() {
        profilePictureInput.click();
      }

      profilePictureInput.addEventListener("change", (event) => {
        const file = event.target.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = (e) => {
            profilePicturePreview.src = e.target.result;
            profilePicturePreview.style.display = "inline-block";
            defaultIcon.style.display = "none";
          };
          reader.readAsDataURL(file);
        }
      });

      if (!profilePicturePreview.src) {
        defaultIcon.style.display = "inline-block";
      }
      function updateCartCount() {
        const cart = JSON.parse(localStorage.getItem("cart")) || [];
        const totalItems = cart.length; // Get the number of unique items
        const cartCountElement = document.getElementById("cart-count");

        if (totalItems > 0) {
          cartCountElement.textContent = totalItems;
          cartCountElement.style.display = "inline"; // Show the count
        } else {
          cartCountElement.textContent = ""; // Clear the count
          cartCountElement.style.display = "none"; // Hide the count
        }
      }

      // Call updateCartCount initially to set the correct count on page load
      updateCartCount();
      // Initialize AOS
      AOS.init();
    </script>
  </body>
</html>
