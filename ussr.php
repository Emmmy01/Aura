
<?php
include 'authentication.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sushi - MR SEE CHICKEN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<style>
<style>
    body {
    font-family: Arial, sans-serif;
    background:rgb(252, 251, 251);
    margin: 0;
    padding: 0;
    text-align: center;
}





.tax2{
    border-top: 2px solid #ddd;
    
}

.profile-pic-container {
    position: relative;
    width: 100px;
    height: 100px;
    margin: auto;
    margin-top:20px;
}

.profile-pic-container img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 50%;
    border: 3px solid #ddd;
}

.upload-btn {
    position: absolute;
    bottom: 0px;
    right: 0px;
    background: rgb(8, 8, 8);
    color: white;
    
    width: 23px;
    height: 23px;
    text-align: center;
    border-radius: 50%;
    cursor: pointer;
}

#profile-upload {
    display: none;
}

.badge {
    position: absolute;
 
   
    background: red;
    color: white;
    font-size: 5px;
    border-radius: 50%;
    width: 10px;
    right: -3px;
    height: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align:center;
}
.user-icon-container, .notification-container {
    position: relative;
    display: inline-block;
    background: #eee;
    padding: 10px;
    margin: 5px 0;
    border-radius: 5px;
    cursor: pointer;
    width: 94%;
}
* {
            margin: 0;
            padding: 0;
           
            font-family: Arial, sans-serif;
        }
        body {
            background: #f8f8f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            width: 90%;
            max-width: 400px;
            padding: 20px;
            border-radius: 20px;
            text-align: center;
            position: relative;
            top:-30px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
            
        }
        .profile {
            text-align: center;
            margin-top: 10px;
        }
        .profile img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }
        .profile h2 {
            margin-top: 10px;
            font-size: 18px;
        }
        .profile p {
            color: gray;
            font-size: 14px;
        }
        .edit-profile {
            background: #060606;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 10px;
            margin-top: 10px;
            cursor: pointer;
        }
        .menu2 {
            margin-top: 20px;
        }
        .menu-item {
            display: flex;
           justify-content: left;
            
            padding: 15px;
            font-size: 16px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
        }
        .menu-item i {
            margin-right: 15px;
            font-size: 18px;
        
        }
        .menu2 .arrow {
            color: gray;
            font-size: 16px;
        
            display: flex;
            justify-content: end;
            margin-top: 16px;
        }
        .logout {
            color: red;
            font-weight: bold;
        }
        .fa-chevron-right{
display: flex;
justify-content: end;
        }
        .menu2{
            display: flex;
            justify-content: space-between;
            
        
        }
        a{
            text-decoration: none;
            color: #060606;
        }
        .memu{
            margin-top: 100px;
        }
        #user-name{
            margin-top:15px
        }
        .batch {
    position: relative; /* Ensures the badge positions correctly */
    display: inline-block; /* Keeps it inline */
}
.user2{
    color: gray;
    font-size:12px;
}
.container {
    background: white;
    width: 100%;
    max-width: 600px; /* Increase max-width for larger screens */
    padding: 20px;
    border-radius: 20px;
    text-align: center;
    position: relative;
    top: -30px;
}

/* Adjust for larger screens */
@media (min-width: 768px) {
    .container {
        max-width: 800px; /* Medium screens like tablets */
    }
}

@media (min-width: 1024px) {
    .container {
        max-width: 2000px; /* Laptops and desktops */
    }
    .profile-section {
 display:  flex;
 justify-content:space-around;
 
}
.profile-pic-container img {
    width: 220px;
    height: 220px;
    object-fit: cover;
    border-radius: 50%;
    border: 3px solid #ddd;
}
#user-name{
            margin-top:155px;
            font-size:30px;
        }
        .profile-info{
            text-align: right;
        }
        .profile-pic-container{
            margin-top:80px;
        }
        .upload-btn {
    position: absolute;
    bottom: -104px;
    right: -110px;
    background: rgb(8, 8, 8);
    color: white;
    
    width: 33px;
    height: 33px;
    text-align: center;
    border-radius: 50%;
    cursor: pointer;
    font-size:22px;
}
.menu{
    margin-left: -420px;
}
span{
    font-size:30px;
}
}


</style>

<body>
<div class="container">
        <div class="header">
        <i class="fas fa-arrow-left" onclick="goBack()"></i>

<script>
    function goBack() {
        window.history.back();
    }
</script>


            <span>My Profile</span>
            <div class="batch">
            <a href="notifications.php" >
           
                <span id="notification-count" class="badge">0</span>
                <i class='far fa-bell' style='color:rgb(9, 9, 9)'></i>
            </a>
    </div>
         
        </div>
        <div class="profile-section">
        <div class="profile-info">
        <?php
$profilePicPath = 'uploads/' . ($_SESSION['auth_user']['profile_picture'] ?? '');
$defaultAvatar = 'Premium_Vector___Young_man_Face_Avater_Vector_illustration_design-removebg-preview.png';

$profilePic = (isset($_SESSION['auth_user']['profile_picture']) && file_exists($profilePicPath)) 
    ? $profilePicPath 
    : $defaultAvatar;
?>
<div class="profile-info">
    <div class="profile-pic-container">
        <img id="profile-pic" src="<?= $profilePic; ?>" alt="Profile">
        <label for="profile-upload" class="upload-btn"><i class="fa fa-pencil" style="font-size:10px"></i></label>
        <input type="file" id="profile-upload" accept="image/*">
    </div>
</div>

            <h3 id="user-name">
                <div class="user">
                    <?= $_SESSION['auth_user']['username']; ?> <br>
                    <div class="user2">
                        <?= $_SESSION['auth_user']['email']; ?>
                    </div>
                </div>
            </h3>
    
           <a href="profile-settings.php"> <button class="edit-profile">Edit Profile</button></a>
        </div>
        <div class="menu">
          <a href="love.html">  <div class="menu2"> <div class="menu-item"><i class='far fa-heart' style='color:rgb(7, 7, 7)'></i> Favourites </div> <i class="fas fa-chevron-right arrow"></i></div></a>
           <a href="profile-settings.php"><div class="menu2"> <div class="menu-item"><i class="fa fa-cog fa-spin" ></i></i> Profile Settings</div>  <i class="fas fa-chevron-right arrow"></i></div></a> 

           <a href="saved_addresses.php"> <div class="menu2"> <div class="menu-item"><i class='far fa-address-book'></i> Delivery Address </div>  <i class="fas fa-chevron-right arrow"></i></div></a>
            <div class="menu2"> <div class="menu-item"><i class="fa fa-credit-card"></i> Subscription </div>  <i class="fas fa-chevron-right arrow"></i></div>
            <a href="change-password.php"><div class="menu2"> <div class="menu-item"><i class="fa fa-edit"></i> Change Password </div>  <i class="fas fa-chevron-right arrow"></i></div></a>
           <a href="order-history.php"><div class="menu2"> <div class="menu-item"><i class="fa fa-history"></i> Order History </div>  <i class="fas fa-chevron-right arrow"></i></div></a> 
      
            <?php if(isset($_SESSION['authenticated'])) : ?>
            <a href="logout.php"><div class="menu2"> <div class="menu-item logout"><i class="fas fa-sign-out-alt"></i> Log out </div><i class="fas fa-chevron-right arrow"></i></div></a>
        
        <?php endif; ?>
            
        </div>
    </div>
  
    </div>
<!-- AJAX Script for Upload -->
<script>
document.getElementById("profile-upload").addEventListener("change", function(event) {
    const file = event.target.files[0];
    if (file) {
        const formData = new FormData();
        formData.append("profile_picture", file);

        fetch("upload_profile_pic.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById("profile-pic").src = "uploads/" + data.file;
                localStorage.setItem("profilePic", "uploads/" + data.file);
            } else {
                alert("Failed to upload image.");
            }
        })
        .catch(error => console.error("Error:", error));
    }
});
</script>
<script>

document.addEventListener("DOMContentLoaded", function () {
    const profilePic = document.getElementById("profile-pic");
    const profileUpload = document.getElementById("profile-upload");


   // Function to update notifications
function updateNotificationCount() {
    fetch('fetch_notification_count.php')
        .then(response => response.text())
        .then(count => {
            let badge = document.getElementById("notification-count");
            
            // Store count in localStorage
            localStorage.setItem("notificationCount", count);

            if (count > 0) {
                badge.innerText = count;
                badge.style.display = "inline"; // Show badge if there are notifications
            } else {
                badge.style.display = "none"; // Hide badge if no notifications
            }
        })
        .catch(error => console.error('Error fetching notifications:', error));
}

// Function to load notification count from localStorage
function loadNotificationCount() {
    let storedCount = localStorage.getItem("notificationCount");
    let badge = document.getElementById("notification-count");

    if (storedCount && storedCount > 0) {
        badge.innerText = storedCount;
        badge.style.display = "inline"; // Show badge if there are notifications
    } else {
        badge.style.display = "none"; // Hide badge if no notifications
    }
}

// Load stored notification count on page load
document.addEventListener("DOMContentLoaded", loadNotificationCount);

// Run initially and then every 10 seconds
updateNotificationCount();
setInterval(updateNotificationCount, 10000);

});
</script>

</body>
</html>
