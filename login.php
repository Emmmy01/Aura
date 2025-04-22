<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - MR SEE CHICKEN FOOD</title>
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
          
            display: flex;
            width: 100%;
            align-items: center;
            justify-content: center;
            
                 background: url('pexels-lum3n-44775-604969.jpg') center/cover no-repeat;
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
            background: url('ed3c9dd1-8211-474c-99aa-9dd3ddddde0c.jpg') center/cover no-repeat;
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
            margin-top: 65px;
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
                height: 45vh;
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
                display: flex;
                flex-direction: row;
                align-items: stretch;
                background: white;
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            }

            .image-section {
                flex: 1;
                height: auto;
                background: url('ed3c9dd1-8211-474c-99aa-9dd3ddddde0c.jpg') center/cover no-repeat;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                position: relative;
                padding: 20px;
                height: 80vh;
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
                margin-top: 0;
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
    </style>


</head>
<body>

    <div class="container">
        
        <!-- Left Side (Image Section) -->
        <div class="image-section">
        <h1 style="color: white;  background: none;">The Taste You Love,Delivered!</h1>

        </div>
        
        <!-- Right Side (Form Section) -->
        <div class="form-section">
            <h2>Sign In</h2>
            <div class="alert">
                <?php
                if (isset($_SESSION['status'])) {
                    echo "<h4>" . $_SESSION['status'] . "</h4>";
                    unset($_SESSION['status']);
                }
                ?>
            </div>
            <form action="logincode.php" method="POST">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group password-container">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" name="login_now_btn" class="register-btn">Sign In</button>
                <p class="login-link">Don't have an account? <a href="register.php">Register</a></p>
            </form>
        </div>
    </div>

    <script>
        setTimeout(function() {
            document.querySelector('.alert').style.display = 'none';
        }, 5000);
    </script>

</body>
</html>
