<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up - AURA</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <style>
      /* General Styles */
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: "Arial", sans-serif;
        background: #f5f5f5;
        color: #333;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }

      /* Alert Styles */
      .alert {
        position: absolute;
        top: 10px;
        left: 50%;
        transform: translateX(-50%);
        width: 90%;
        max-width: 500px;
        padding: 15px;
        background-color:rgba(24, 149, 53, 0.56);
        border: 1px solid rgb(23, 241, 12);
        color: white;
        font-size: 1rem;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        animation: fadeOut 15s forwards;
      }

      .alert h4 {
        margin: 0;
      }

      @keyframes fadeOut {
        0% {
          opacity: 1;
        }
        80% {
          opacity: 0.5;
        }
        100% {
          opacity: 0;
          display: none;
        }
      }

      /* Wrapper */
      .signup-wrapper {
        display: flex;
        flex-direction: row;
        width: 75%;
        border-radius: 50px;
        max-width: 1200px;
        height: 95vh;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        position: relative;
      }

      /* Image Section */
      .image-section {
        flex: 1;
        position: relative;
        background-size: cover;
        background-position: center;
      }

      .image-section img {
        height: 100%;
        width: 100%;
        object-fit: cover;
      }

      .overlay-text {
        position: absolute;
        top: 50%;
        left: 54%;
        transform: translate(-50%, -50%);
        color: #fff;
        font-size: 1.5rem;
        width: 100%;
        font-weight: bold;
        text-shadow: 0px 4px 6px rgba(0, 0, 0, 0.4);
        text-align: start;
      }

      /* Logo */
      .logo {
        position: absolute;
        top: 20px;
        left: 1px;
      }

      .logo img {
        width: 100px;
        height: auto;
      }

      /* Form Section */
      .form-section {
        flex: 1;
        padding: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f5f5f5;
      }

      .form-container {
        width: 100%;
        max-width: 400px;
      }

      .form-header {
        text-align: center;
        margin-bottom: 30px;
      }

      .form-header h1 {
        font-size: 2rem;
        color: #222;
      }

      .form-header .login-link {
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
      }

      .form-header .login-link:hover {
        text-decoration: underline;
      }

      .form-group {
        margin-bottom: 20px;
      }

      label {
        display: block;
        font-size: 0.9rem;
        margin-bottom: 5px;
        color: #666;
      }

      input[type="text"],
      input[type="email"],
      input[type="password"] {
        width: 100%;
        padding: 12px;
        font-size: 1rem;
        border: 1px solid #ddd;
        border-radius: 50px;
      }

      input:focus {
        outline: none;
        color: #007bff;
      }

      .terms {
        display: flex;
        align-items: center;
        font-size: 0.85rem;
      }

      .terms input {
        margin-right: 10px;
      }

      .terms-link {
        color: #007bff;
        text-decoration: none;
      }

      .terms-link:hover {
        text-decoration: underline;
      }

      .btn-submit {
        color: rgb(246, 248, 251);
        padding: 12px;
        font-size: 1rem;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        width: 100%;
        transition: background-color 0.3s ease;
        background-color: #007bff;
      }

      .btn-submit:hover {
        background-color: rgb(255, 255, 255);
        color: #007bff;
      }

      /* Responsive Design */
      @media (max-width: 768px) {
        .signup-wrapper {
          flex-direction: column;
          height: auto;
          width: 100%;
          border-radius: 0;
        }

        .image-section {
          height: 30%;
        }

        .overlay-text {
          top: 60%;
          left: 45%;
          width: 80%;
          text-align: start;
          transform: translate(-50%, -50%);
          font-size: 1.7rem;
        }

        .form-section {
          padding: 20px;
        }

        .logo {
          top: 170px;
          left: 1.5px;
          justify-content: center;
        }

        .logo img {
          width: 80px;
          height: 80px;
        }
      }
      
      .alert {
            position: fixed;
            top: 50px;
            left: 50%;
            transform: translateX(-50%);
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            font-weight: bold;
            z-index: 1000;
        }
        .alert-success {
            background-color: #dff0d8;
            color: #3c763d;
        }
        .alert-error {
            background-color: #f2dede;
            color: #a94442;
        }

    </style>
  </head>
  <body>
  <?php if (isset($_SESSION['status'])): ?>
    <div class="alert" id="alert-message">
        <?php
        echo $_SESSION['status'];
        unset($_SESSION['status']); // Clear the session message
        ?>
    </div>
    <script>
        // Set a timer to hide the alert after 10 seconds (10000 milliseconds)
        setTimeout(function() {
            var alertMessage = document.getElementById("alert-message");
            if (alertMessage) {
                alertMessage.style.display = "none"; // Hide the alert
            }
        }, 10000); // Adjust the time (in milliseconds) as needed
    </script>
<?php endif; ?>

      
      
   
 

    <div class="signup-wrapper">
      <!-- Left Section for Image -->
      <div class="image-section">
        <img
          src="Stationery & Books.jpg"
          alt="Promotional Image"
        />
        <div class="overlay-text">
          Everything you need, <br />
          as a student. Sign up to Explor!
        </div>
      </div>

      <!-- Logo -->
      <div class="logo">
        <img src="Gray_and_Black_Simple_Studio_Logo__2_-removebg-preview.png" alt="ByteBox Logo" />
      </div>

      <!-- Right Section for Sign-Up Form -->
      <div class="form-section">
        <div class="form-container">
          <div class="form-header">
            <h1>Create Account</h1>
            <p>
              Already a member?
              <a href="login.php" class="login-link">Log In</a>
            </p>
          </div>
          <form action="code.php" method="POST">
            <div class="form-group">
              <label for="name">Name</label>
              <input
                type="text"
                id="name"
                name="name"
                placeholder="Enter your name"
                required
              />
            </div>
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input
                type="text"
                id="phone"
                name="phone"
                placeholder="Enter your phone number"
                required
              />
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input
                type="email"
                id="email"
                name="email"
                placeholder="Enter your email or phone number"
                required
              />
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input
                type="password"
                id="password"
                name="password"
                placeholder="Enter your password"
                required
              />
            </div>
            <div class="form-group terms">
              <input type="checkbox" id="terms" name="terms" required />
              <label for="terms">
                I agree to Aura's
                <a href="term.html" target="_blank" class="terms-link"
                  >terms and conditions</a
                >
              </label>
            </div>
            <div class="form-group">
              <button type="submit" name="register_btn" class="btn-submit">Sign Up</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
