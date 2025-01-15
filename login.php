
<?php
session_start();
if(isset($_SESSION['authenticated']))
{  
     $_SESSION['status'] = "You are already loggeg in.!";
    header('location: index.php');
    exit(0);
}




?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In - ByteBox</title>
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
        background: white;
        color: #333;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
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


      /* Wrapper */
      .signup-wrapper {
        display: flex;
        flex-direction: row;
        width: 75%;
        border-radius: 50px;
        max-width: 1200px;
        height: 95vh;
        overflow: hidden;
        background-color: #007bff;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        position: relative;
      }

      /* Image Section */
      .image-section {
        flex: 1;
        position: relative;
        background-size: cover;
        background-position: center;
        background-color:#007bff;
      }

      .image-section img {
        height: 100%;
        width: 100%;
        object-fit: cover;
        border-bottom-right-radius: 50px;
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
        background-color:rgb(253, 250, 250);
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

      .form-header .signup-link {
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
      }

      .form-header .signup-link:hover {
        text-decoration: underline;
        color:rgb(3, 83, 169);

      }

      .form-group {
        margin-bottom: 20px;
        position: relative;
        border-radius: 50px;
      }

      label {
        display: block;
        font-size: 0.9rem;
        margin-bottom: 5px;
        color: #666;
        border-radius: 50px;
      }

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
        border-color: #007bff;
      }
      #password {
        width: 100%;
        padding: 12px;
        font-size: 1rem;
        border: 1px solid #ddd;
        border-radius: 50px;
      }

      .password-toggle {
        position: absolute;
        top: 67%;
        right: 15px;
        transform: translateY(-50%);
        cursor: pointer;
        border-radius: 50px;
        color: #666;
      }

      .btn-submit {
        background-color: #007bff;
        color: #fff;
        padding: 12px;
        font-size: 1rem;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        width: 100%;
        transition: background-color 0.3s ease;
      }

      .btn-submit:hover {
        background-color: white;
        color: #007bff;
        
      }

      /* Custom Alert */
      .custom-alert {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #222;
        color: #fff;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        z-index: 1000;
      }

      .custom-alert button {
        background: red;
        color: #fff;
        border: none;
        padding: 10px 20px;
        margin-top: 10px;
        cursor: pointer;
        border-radius: 5px;
        transition: background 0.3s ease;
      }

      .custom-alert button:hover {
        background: #007bff;
      }

      /* Overlay */
      .alert-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
      }
      /* Responsive Design */
      @media (max-width: 768px) {
        body {
          font-family: "Arial", sans-serif;
          background: white;
          color: #333;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 84vh;
        }
        .signup-wrapper {
          flex-direction: column;
          height: 190vh;
          width: 100%;

          border-radius: 50px;
        }
        .signup-wrapper {
          flex-direction: column;
          height: auto;
          width: 100%;

          border-radius: 0px;
        }

        .image-section {
          height: 10%;
          border-radius: 50px;
          background-color: #007bff;
          
        }
        .image-section img {
          height: 320px;
          width: 100%;
          object-fit: cover;
          border-bottom-right-radius: 60px;
        }

        .overlay-text {
          top: 60%;
          left: 45%;
          width: 80%;
          text-align: start;
          transform: translate(-50%, -50%);
          font-size: 1.7rem;
          border-radius: 50px;
        }

        .form-section {
          padding: 20px;
        }

        .logo {
          top: 22px;
          left: 1.5px;
          justify-content: center;
        }

        .logo img {
          width: 80px;
          height: 80px;
          border-radius: 0px;
        }
      }
    </style>
  </head>
  <body>
  <?php
        

        if(isset($_SESSION['status']))
       {
         ?>
         <div class="alert alert-success">
             <h5><?= $_SESSION['status']; ?></h5>
         </div>
         <?php
         unset($_SESSION['status']);
        }
     ?>
    <div class="signup-wrapper">
      <!-- Left Section for Image -->
      <div class="image-section">
        <img
          src="Golden Coil.jpg"
          alt="Promotional Image"
        />
        <div class="overlay-text">
          Welcome back to AURA,<br />
          sign in to continue shopping!
        </div>
      </div>

      <!-- Logo -->
      <div class="logo">
        <img src="Gray_and_Black_Simple_Studio_Logo__2_-removebg-preview.png" alt="ByteBox Logo" />
      </div>

      <!-- Right Section for Sign-In Form -->
    
      <div  class="form-section">
        <div class="form-container">
          <div class="form-header">
            <h1>Sign In</h1>
            <div class="alert">
            <?php
            if(isset($_SESSION['status']))
            {
              echo "<h4>".$_SESSION['status']."</h4>";
              unset($_SESSION['status']);
            }
            ?>

        </div>
            <p>
              Don't have an account?
              <a href="sign.php" class="signup-link">Sign Up</a>
            </p>
          </div>
          <form action="logincode.php" method="POST">
            <div class="form-group">
              <label for="email">Email</label>
              <input
                type="email"
                id="email"
                name="email"
                placeholder="Enter your email"
              
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
              <i
                class="fas fa-eye password-toggle"
                onclick="togglePassword()"
              ></i>
            </div>
            <div class="form-group">
              <button name="login_now_btn" type="submit" class="btn-submit">Sign In</button>
            </div>
          </form>
        </div>
      </div>
      </form>
    </div>
  

    <script>
      const form = document.getElementById("signinForm");
      const alertBox = document.querySelector(".custom-alert");
      const overlay = document.querySelector(".alert-overlay");

      form.addEventListener("submit", (e) => {
        e.preventDefault();
        overlay.style.display = "block";
        alertBox.style.display = "block";
      });

      function closeAlert() {
        overlay.style.display = "none";
        alertBox.style.display = "none";
      }

      function togglePassword() {
        const passwordField = document.getElementById("password");
        const toggleIcon = document.querySelector(".password-toggle");
        if (passwordField.type === "password") {
          passwordField.type = "text";
          toggleIcon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
          passwordField.type = "password";
          toggleIcon.classList.replace("fa-eye-slash", "fa-eye");
        }
      }
    </script>
        <script>
        // Hide alert after 5 seconds
        setTimeout(function() {
            document.querySelector('.alert').style.display = 'none';
        }, 5000);
    </script>

  </body>
</html>
