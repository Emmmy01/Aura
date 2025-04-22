<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - MR SEE CHICKEN FOOD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Chewy&display=swap" rel="stylesheet">
    <style>
     * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body, html {
            height: 100%;
            background: url('pexels-willpicturethis-2641886.jpg') center/cover no-repeat;
           
            display: flex;
            width: 100%;
            align-items: center;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 900px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }


        /* Mobile View */
        .image-section {
            width: 100%;
            height: 42vh;
            background: url('a404a1ef-b9e6-4994-b969-7d96ec29fab5.jpg') bottom/cover no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align:center;
            white-space: wrap;
        }
        
      
        .form-section {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background: white;
            border-radius: 20px;
            text-align: center;
            margin-top: -50px;
            position: relative;
        }

        .form-section h2 {
            color: #090909;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .form-group {
            position: relative;
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            font-weight: 300;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            padding-left: 40px;
            border: 2px solid #a3a3a2;
            border-radius: 15px;
            font-size: 16px;
            outline: none;
            margin-top: 10px;
        }

        .form-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #a3a3a2;
        }

        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
            color: #9a9a9a;
        }

        .register-btn {
            width: 100%;
            padding: 12px;
            background: rgb(12, 12, 12);
            color: white;
            border: none;
            border-radius: 15px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }

        .register-btn:hover {
            background: rgb(59, 58, 58);
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
        }

        .login-link a {
            color: #ffcc00;
            text-decoration: none;
            font-weight: bold;
        }

        .alert {
            position: absolute;
            top: -250px;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            max-width: 500px;
            padding: 15px;
            color: red;
            font-size: 1rem;
            border-radius: 8px;
            text-align: center;
            animation: fadeOut 15s forwards;
        }

        @keyframes fadeOut {
            0% { opacity: 1; }
            80% { opacity: 0.5; }
            100% { opacity: 0; display: none; }
        }

        @media (max-width: 768px) {
            .image-section {
                height: 25vh;
            }
            .form-section {
                width: 100%;
                margin-top: 0px;
                border-radius:0px;
            }
         
        }

        /* Two-Column Layout for Large Screens */
        @media (min-width: 768px) {
            .container {
                height: 90vh;
                display: flex;
                flex-direction: row;
                align-items: stretch;
                background: white;
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            }
                .form-section h2 {
            color: #090909;
            font-size: 24px;
            margin-top: 15px;
        }


            .image-section {
                flex: 1;
                height: auto;
                background: url('a404a1ef-b9e6-4994-b969-7d96ec29fab5.jpg') center/cover no-repeat;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                position: relative;
                padding: 20px;
                height: 90vh;
            }

            .image-section::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.4); /* Dark overlay */
            }

           

            .form-section {
                flex: 1;
                padding: 50px;
                background: #f9f9f9;
                border-radius: 0;
                margin-top: -50px;
            }
        }
        .image-section h1{
  font-family: "Chewy", system-ui;
  font-weight: 400;
  font-style: normal;
  display: flex;
  justify-content:center;
  z-index: 999;

}

        .login-link {
            text-align: center;
            margin-top: 5px;
            font-size: 14px;
        }
.image-section span{
  font-family: "Chewy", system-ui;
  font-weight: 400;
  font-style: normal;

}
   .image-section::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.4); /* Dark overlay */
            }

            image-section h1:first-child{
                color:   yellow;
            }

        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
            color: #9a9a9a;
        }

    
        .agree-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
            font-size: 14px;
        }

        .agree-container input {
            transform: scale(1.2);
        }
        .agree-container a{
            color: #9a9a9a;
        }

        #password-error {
            color: red;
            font-size: 14px;
            display: none;
            text-align: center;
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
 /* Alert Styles */
 .alert {
        position: absolute;
        top: 10px;
        left: 50%;
        transform: translateX(-50%);
        width: 90%;
        max-width: 500px;
        padding: 15px;
        background-color:rgba(1, 2, 1, 0);
        border: 1px solid rgb(245, 252, 244);
        color: black;
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

 
    <div class="container">
    <div class="image-section">
        <h1 style="color: white;  background: none;">Order, Eat, Enjoy!</h1>

        </div>
        <div class="form-section">
            <h2>Create an Account</h2>
            <form action="code.php" method="POST" onsubmit="return validatePassword()">
                <div class="form-group">
                    <label for="name">Full Name</label>
                   
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                 
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group password-container">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"  required>
    
                </div>
                <div class="form-group password-container">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" required>
                
                </div>
                <p id="password-error">⚠️ Passwords do not match!</p>
                <div class="agree-container">
                    <input type="checkbox" id="agree" required>
                    <label for="agree">I agree to the <a href="#">terms and conditions</a></label>
                </div>
                <button type="submit" name="register-btn" class="register-btn">Register</button>
                <p class="login-link">Already have an account? <a href="login.php">Login</a></p>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(fieldId, icon) {
            const passwordField = document.getElementById(fieldId);
            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }

        function validatePassword() {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirm-password").value;
            const errorText = document.getElementById("password-error");

            if (password !== confirmPassword) {
                errorText.style.display = "block";
                return false; // Prevent form submission
            } else {
                errorText.style.display = "none";
                return true;
            }
        }
    </script>
</body>
</html>

