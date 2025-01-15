


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AURA</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    <style>
      /* General Reset */
      
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        
      }
      body {
        font-family: Arial, sans-serif;
        background: #000;
        color: #fff;
        
      }

      /* Header */
      header {
        background: #007bff; /* Blue */
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 20px;
        height: 70px;
      }
      header .logo {
        font-size: 0.5rem;
        font-weight: bold;
        color: #fff;
      }
      header .cart-icon {
        font-size: 1.2rem;
        color: #fff;
        cursor: pointer;
      }

      /* Search Bar */
      .search-bar {
        margin: 20px auto;
        display: flex;
        justify-content: center;
        gap: 10px;
      }
      .search-bar input {
        width: 70%;
        padding: 10px;
        border-radius: 50px;
        border: none;
      }
      .search-bar button {
        padding: 10px 20px;
        border-radius: 50px;
        background: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
      }

      /* Slider */
      .slider {
        position: relative;
        overflow: hidden;
        height: 300px;
      }
      .slides {
        display: flex;
        transition: transform 0.5s ease-in-out;
      }
      .slide {
        min-width: 100%;
        height: 300px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        text-align: center;
        font-size: 30px;
      }
      
      .slide button {
        margin-top: 10px;
        padding: 10px 20px;
        background: #007bff;
        color: #fff;
        border: none;
        border-radius: 50px;
        cursor: pointer;
      }

      /* Slider Dots */
      .slider-dots {
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 10px;
      }
      .slider-dots span {
        width: 10px;
        height: 10px;
        background: #fff;
        border-radius: 50%;
        cursor: pointer;
      }
      .slider-dots span.active {
        background: #007bff; /* Active dot */
      }
    
      /* Categories */
      .categories {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin: 20px 0;
        border-radius: 25px;
      }
      .categories div {
        padding: 10px 20px;
        border: 1px solid #fff;
        cursor: pointer;
        transition: background 0.3s;
        border-radius: 25px;
      }
      .categories div:hover {
        background: #007bff;
      }

      /* Products */
      .products {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        padding: 20px;
      }
      .product {
        width: 45%; /* Two per row */
        text-align: center;
        background: #333;
        justify-content: center;
        padding: 20px;
        border-radius: 10px;
        position: relative;
      }
      .product img {
        width: 130%;
        height: 90px;
        border-radius: 10px;
      }
      .product .name {
        font-size: 0.9rem;
        margin: 10px 0;
        text-align: center;
      }
      .product .price {
        color: #0364c4;
        font-weight: bold;
        text-align: center;
      }
     
      
      /* Footer */
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
      /* Wave Background */

      .featured-product {
        position: relative;
        padding: 30px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        background: linear-gradient(90deg, #333, #000);
        clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%);
      }

      .product-image {
        flex: 1;
        max-width: 400px;
        margin: 20px;
        text-align: center;
        position: relative;
      }

      .product-image img {
        width: 100%;
        height: 270px;
        border-radius: 10px;
      }

      /* Dots for image navigation */
      .image-dots {
        position: absolute;
        bottom: -30px;
        display: flex;
        gap: 10px;
        justify-content: center;
        width: 100%;
      }

      .image-dots span {
        width: 15px;
        height: 15px;
        background: #fff;
        border-radius: 50%;
        cursor: pointer;
        transition: transform 0.3s ease;
      }

      .image-dots span.active {
        background: #007bff;
        transform: scale(1.2);
      }

      .product-details {
        flex: 1;
        max-width: 500px;
        margin: 20px;
        text-align: center;
      }

      .product-details h2 {
        font-size: 2rem;
        margin-bottom: 10px;
        text-align: center;
      }

      .product-details .prices {
        margin: 10px 0;
        text-align: center;
      }

      .prices .old-price {
        text-decoration: line-through;
        color: #aaa;
        margin-right: 10px;
        text-align: center;
      }

      .prices .new-price {
        color: #007bff;
        font-size: 1.5rem;
        text-align: center;
      }

      .rating {
        margin: 10px 0;
        color: #007bff;
        align-items: center;
        text-align: center;
      }

      .description {
        margin: 15px 0;
        line-height: 1.5;
        text-align: center;
      }

      .selectors {
        display: flex;
        gap: 20px;
        margin: 20px 0;
      }

      .selectors select,
      .selectors input {
        padding: 10px;
        border-radius: 5px;
        border: none;
        font-size: 1rem;
      }

      .add-to-cart {
        margin-top: 20px;
        z-index: 1;
        text-align: center;
        align-items: center;
      }

      .add-to-cart button {
        padding: 15px 30px;
        border: none;
        border-radius: 50px;
        background: #007bff;
        color: #000;
        font-size: 1rem;
        cursor: pointer;
        transition: 0.3s;
      }

      .add-to-cart button:hover {
        background: #007bff;
      }

      .best-seller-section {
        padding: 10px;
        background: black;
        height: 250px;
      }

      .best-seller-header {
        font-size: 1rem;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
        color: #fff;
        background: #094585;
        padding: 13px;
        border-radius: 20px;

        padding: 10px 30px; /* Adjust padding as needed */
        width: 100%;
      }

      .product-slider {
        position: relative;
        overflow: hidden;
        white-space: nowrap;
        display: flex;
        align-items: center;
        display: flex;
        overflow-x: auto;
      }

      .product-slider .slider-track {
        display: flex;
        transition: transform 0.5s ease-in-out;
        display: flex;
        gap: none;
        overflow-x: auto;
        margin-left: -10px;
        
      }

      .product-card {
        flex: 0 0 auto;
        width: 180px;
        height: 190px;
        margin: 2px 3px;
        background-color: black;
        border-radius: 10px;
        
        text-align: center;
        position: relative;
        color: #fff;
        gap: 10px;
        overflow-x: auto;
        
      }

      .product-card img {
        width: 55%;
        height: 90px;
        border-radius: 10px;
      }

      .product-card .discount {
        position: absolute;
        top: 0px;
        left: 36px;
        background-color: #000;
        color: #fff;
        font-size: 0.5rem;
        padding: 5px;
        border-radius: 5px;
      }

      .product-card .name {
        margin: 10px 0;
        font-size: 0.5rem;
        flex-wrap: wrap;
      }

      .product-card .price {
        font-weight: bold;
        color: #007bff;
        font-size: 9px;
        text-align: center;
      }

      .slider-controls {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 100%;
        display: flex;
        justify-content: space-between;
        display: none;
      }

      .slider-controls button {
        background: none;
        display: none;
        border: none;
        color: #fff;
        padding: 20px;
        border-radius: 50%;
        cursor: pointer;
        font-size: 1.2rem;
        margin-top: 70px;
        display: flex;
        justify-content: center;
      }

      .slider-controls button:hover {
        background: none;
        color: #007bff;
      }
      /* Basic styling for the category buttons */
      .category-buttons {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin: 20px 0;
        border-radius: 25px;
        transition: background-color 0.3s ease, color 0.3s ease;
      }

      .category-btn {
        padding: 10px 20px;
        border: 1px solid #fff;
        cursor: pointer;
        transition: background 0.3s;
        border-radius: 25px;
      }

      /* Hover effect */
      .category-btn:hover {
        background-color: #007bff;
        color: white;
      }

      /* Active category */
      .category-btn.active {
        background-color: #007bff;
        color: white;
      }
      /* Section Styles */
      .top-phone-deals-section {
        padding: 20px;
        background-color: #000;
        color: #fff;
      }

      .top-phone-deals-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #094585;
        border-radius: 20px;
        padding: 13px;

        padding: 10px 30px; /* Adjust padding as needed */
        width: 100%;
      }

      .top-phone-deals-title {
        font-size: 1rem;
        margin: 0;
      }

      .see-all-link {
        color: black;
        text-decoration: none;
        font-weight: bold;
      }

      .see-all-link:hover {
        text-decoration: underline;
      }

      /* Slider Container */
      .phone-slider-container {
        position: relative;
        overflow: hidden;
        margin-top: 20px;

        overflow-x: auto;
      }

      .phone-slider-track {
        display: flex;
        transition: transform 0.5s ease;
        display: flex;
        transition: transform 0.5s ease-in-out;
        display: flex;
        gap: none;
        overflow-x: auto;
        margin-left: -30px;
      }
      .name{
        margin-left: 40px;
      }

      .phone-product-card {
        width: 55%;
        margin-right: 75px;
        background: black;
        padding: 6px;
        border-radius: 10px;
        text-align: center;
        position: relative;
       margin-top: 60px;
       margin: 20px 0;
      }
      .phone-product-card img {
        width: 55%;
      }
      .phone-image {
        width: 80%;
        height: 100px;
        object-fit: cover;
        border-radius: 10px;
      }

      .phone-discount-tag {
        position: absolute;
        top: -5px;
        left: 50px;
        background: #ff0000;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 0.5rem;
      }

      .phone-product-info h3 {
       
        margin-right: 95px;
        font-size: 0.5rem;
        display: flex;
        white-space: nowrap;
        text-align: center;
        justify-content: center;
        margin-top: 10px;
      }
      .phone-product-name{
        margin-left: 100px;
      }

      .phone-price {
        color: #007bff;
        font-weight: bold;
        font-size: 10px;
        margin-left: 37px
      }

      /* Slider Controls */
      .phone-slider-controls {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
      }

      .phone-slider-controls button {
        background: none;
        border: none;
        color: #fff;
        font-size: 1rem;
        cursor: pointer;
      }

      .phone-slider-controls button:hover {
        color: #007bff;
      }
      .flash-sales {
        padding: 20px;
        background-color: #050404;
        border-radius: 10px;
        margin: 20px 0;
      }

      .flash-sales-header {
        display: flex;

        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        background: #094585;
        padding: 13px;
        border-radius: 20px;

        padding: 10px 30px; /* Adjust padding as needed */
        width: 100%;
      }

      .flash-sales-header h2 {
        font-size: 15px;
        color: white;
      }

      .timer {
        color: white;
        font-size: 15px;
      }

      .see-all {
        color: black;
        text-decoration: none;
        font-weight: bold;
        font-size: 16px;
      }

      .flash-sales-products {
        display: flex;
        gap: 15px;
        overflow-x: auto;
        display: flex;
        transition: transform 0.5s ease-in-out;
        display: flex;
        gap: none;
        overflow-x: auto;
        margin-left: 8px;
      }

      .product {
        min-width: 150px;
        background-color: black;

        border-radius: 10px;
        text-align: center;
        padding: 10px;
        position: relative;
      }

      .discount-tag2 {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: #ff0000;
        color: #fff;
        font-size: 9px;
        padding: 5px;
        border-radius: 5px;
      }

      .product img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        margin-bottom: 10px;
      }

      .product-name {
        font-size: 10px;
        color: white;
      }

      .product-price {
        font-size: 10px;
        color: #007bff;
        font-weight: bold;
      }
      .logo img {
        width: 100px;
        height: 100px;
      }
      /* Sidebar styles */
      .sidebar {
        position: fixed;
        top: -450px;
        left: 0;
        width: 100%;
        height: 50vh;
        background-color: #007bff;
        color: #fff;
        overflow-y: auto;
        transition: top 0.8s ease-in-out;
        z-index: 1000;
        padding: 40px;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
      }

      .sidebar h3 {
        font-size: 24px;
        margin-bottom: 20px;
      }

      .sidebar-links {
        list-style: none;
        padding: 0;
      }

      .sidebar-links li {
        margin-bottom: 15px;
      }

      .sidebar-links a {
        text-decoration: none;
        color: #fff;
        font-size: 18px;
      }

      .sidebar-links a:hover {
        color: blue;
      }

      .close-btn {
        position: absolute;
        top: 10px;
        right: 15px;
        background: none;
        border: none;
        color: #fff;
        font-size: 24px;
        cursor: pointer;
      }

      header .open-sidebar-btn {
        border: none;
        font-size: 22px;

        cursor: pointer;
        z-index: 999;
      }

      .open-sidebar-btn:hover {
        background-color: None;
      }
      /* Product display inside the sidebar */
      .sidebar-products2 {
        margin-top: 20px;
      }

      .product2 {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        border-bottom: 1px solid #555;
        padding-bottom: 10px;
      }

      .product2-image img {
        width: 50px;
        height: 50px;
        border-radius: 5px;
        margin-right: 10px;
      }

      .product2-info {
        flex: 1;
      }

      .product2-name {
        font-size: 14px;
        font-weight: bold;
        color: #fff;
        margin: 0;
      }

      .product2-price {
        font-size: 12px;
        color: #007bff;
        margin: 0;
      }
      .seasonal-offers {
        padding: 40px 20px;
        background-color: #0d0d0d;
        text-align: center;
      }

      .offers-header h2 {
        font-size: 24px;
        color: #007bff;
        margin-bottom: 10px;
      }

      .offers-header p {
        font-size: 16px;
        color: #fffdfd;
        margin-bottom: 30px;
      }

      .offers-container {
        display: flex;
        justify-content: space-around;
        gap: 20px;
        flex-wrap: wrap;
      }

      .offer-card {
        background: rgb(28, 27, 27);
        border: 1px solid #232121;
        border-radius: 8px;
        width: 300px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      }

      .offer-image {
        position: relative;
      }

      .offer-image img {
        width: 100%;
        height: 30vh;
      }
      .discount-tag {
        position: absolute;
        top: 10px;
        left: 10px;
        background: #007bff;
        color: #fff;
        font-size: 14px;
        padding: 5px 10px;
        border-radius: 4px;
      }
      .offer-details {
        padding: 15px;
        text-align: left;
      }

      .offer-details h3 {
        font-size: 18px;
        color: #fffdfd;
        margin-bottom: 10px;
      }

      .offer-details .price {
        font-size: 16px;
        color: #007bff;
        margin-bottom: 15px;
      }

      .shop-now-btn {
        display: inline-block;
        padding: 10px 20px;
        background: #007bff;
        color: black;
        text-decoration: none;
        font-size: 14px;
        border-radius: 4px;
      }

      .shop-now-btn:hover {
        background: #007bff;
      }
      .product a {
        text-decoration: none;
        text-transform: none;
        color: #fff;
      }
      /* Student Favorites Section */
      .student-favorites {
        background-color: #000; /* Black background */
        color: #fff; /* White text */
        padding: 50px 20px;
        text-align: center;
        background-image: url(b14.png);
      }

      .student-favorites h2 {
        font-size: 2rem;
        margin-bottom: 30px;
        color: #1e90ff; /* Bright blue title */
      }

      .favorites-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
      }

      .favorite-item {
        background-color: #111; /* Darker black for contrast */
        border: 1px solid #242b33; /* Blue border */
        border-radius: 8px;
        width: 220px;
        height: 270px;
        padding: 15px;
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
      }

      .favorite-item img {
        width: 80%;
        height: 18vh;
        border-radius: 8px;
      }

      .favorite-item h3 {
        font-size: 1.2rem;
        color: #0364c4; /* Bright blue heading */
        margin: 10px 0;
      }

      .favorite-item p {
        font-size: 1rem;
        margin-bottom: 15px;
      }

      .favorite-item button {
        background-color: #26292c; /* Bright blue button */
        color: #fff;
        border: 2px solid #1e90ff;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
      }

      .favorite-item button:hover {
        background-color: #104e8b; /* Darker blue on hover */
      }

      .favorite-item:hover {
        transform: scale(1.05); /* Slight zoom on hover */
        box-shadow: 0 0 15px #1e90ff; /* Blue glow */
      }

      /* Responsive Design */
      @media (max-width: 768px) {
        .favorites-container {
          flex-direction: column;
          align-items: center;
        }
      }
      /* Referral Program Section */
      .referral-program {
        background-color: #000; /* Black background */
        color: #fff; /* White text */
        padding: 50px 20px;
        text-align: center;
      }

      .referral-program .referral-content {
        max-width: 600px;
        margin: 0 auto;
        
        border-radius: 10px;
        padding: 20px;
        background-color: #111; /* Slightly lighter black */
      }

      .referral-program h2 {
        font-size: 2rem;
        color: #1e90ff; /* Bright blue */
        margin-bottom: 20px;
      }

      .referral-program p {
        font-size: 1rem;
        margin-bottom: 20px;
      }

      .referral-program button {
        background-color: #1e90ff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
      }

      .referral-program button:hover {
        background-color: #104e8b; /* Darker blue on hover */
      }
      /* Reviews Section */
      .reviews {
        background-color: #000; /* Black background */
        color: #fff; /* White text */
        padding: 50px 20px;
        text-align: center;
      }

      .reviews h2 {
        font-size: 2rem;
        color: #1e90ff; /* Bright blue */
        margin-bottom: 30px;
      }

      .reviews-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
      }

      .review {
        background-color: #111; /* Slightly lighter black */
        
        border-radius: 10px;
        padding: 20px;
        width: 300px;
        text-align: left;
        box-shadow: 0 0 15px rgba(30, 144, 255, 0.3); /* Blue glow */
      }

      .review p {
        font-size: 1rem;
        margin-bottom: 10px;
        color: #ddd; /* Light gray for text */
      }

      .review h3 {
        font-size: 1rem;
        
        text-align: right;
      }
      #share-options {
        display: none;
        margin-top: 20px;
      }

      #referral-link {
        width: 80%;
        padding: 5px;
        margin: 10px 0;
        
        border-radius: 5px;
        background-color: #111;
        color: #fff;
      }
      .review-form {
    margin-top: 60px;
    text-align: center;
    max-width: 600px;
    margin: 0 auto;
    color: #fff;
}

.review-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    
    border-radius: 5px;
    background-color: #111;
    color: #fff;
}

.star-rating {
    display: flex;
    justify-content: flex-start;
    gap: 6px;
    cursor: pointer;
    margin-bottom: 10px;
    justify-content: center;
}

.star-rating span {
    font-size: 1.8rem;
    color: #ddd;
}

.star-rating span.active {
    color: #1e90ff; /* Blue for active stars */
}

#submit-review {
    background-color: #1e90ff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 1rem;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

#submit-review:hover {
    background-color: #104e8b;
}
.open-sidebar-btn{
  padding: 10px;
}
.slider-container2 {
  overflow: hidden;
  width: 100%;
  position: relative;
}

.slider2 {
  display: flex;
  transition: transform 0.3s ease-in-out;
  will-change: transform;
}

.featured-product {
  min-width: 100%;
  padding: 20px;
  box-sizing: border-box;
}

.product-image img {
  max-width: 100%;
  display: block;
}

.image-dots {
  display: flex;
  justify-content: center;
  margin-top: 10px;
}

.image-dots span {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background-color: #ccc;
  margin: 0 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.image-dots span.active {
  background-color: #333;
}

.toast {
  position: fixed;
  bottom: 20px;
  right: 20px;
  background: #333;
  color: white;
  padding: 10px 20px;
  border-radius: 5px;
  opacity: 0;
  transition: opacity 0.3s, transform 0.3s;
  transform: translateY(20px);
}

.toast.show {
  opacity: 1;
  transform: translateY(0);
}
.socials {
      
      margin: 10px 0;
    }
    .socials h2{
      font-size: 1rem;
    }

    .socials a {
      font-size: 1.6rem;
      color: #060606;
      margin: 0 5px;
      transition: transform 0.3s ease;
    }

    .socials a:hover {
      transform: scale(1.2);
    }
.cart-container {
    position: relative;
    display: inline-block;
}

#cart-count {
    position: absolute;
    top: -5px; /* Adjust this value to position the count */
    right: 100px; /* Adjust this value to position the count */
    background-color: red; /* Background color */
    color: white; /* Text color */
    border-radius: 50%; /* Make it round */
    padding: 2px 5px; /* Padding around the text */
    font-size: 14px; /* Font size */
}
.solo i {
      color: #007bff;
    }
    
.search-bar2{
  display: none;
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
.solo span {
  color: #007bff;
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

#cart-count2 {
  position: absolute;
  top: -8px;
  right: 41%;
  background-color: red;
  color: white;
  border-radius: 50%;
  font-size: 12px;
  font-weight: bold;
  padding: 2px 6px;
  display: inline-block;
}
.set{
  display:none;
}
.header-icons{
  display:none;
}
.mens-collection {
  background-color: black;
  color: white;
  padding: 50px 20px;
  justify-content: center;
  align-items: center;
}

.mens-collection-content {
  display: block;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
  gap: 20px;
  justify-content: center;
  align-items: center;
}

.mens-text {
  flex: 1;
  padding: 20px;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.mens-text h2 {
  font-size: 2rem;
  margin-bottom: 10px;
  color:#0875d5;
  justify-content: center;
  align-items: center;
}

.mens-text p {
  font-size: 1.1rem;
  justify-content: center;
  align-items: center;
  margin-bottom: 20px;
}

.shop-now-btn {
  background-color: #0875d5;
  color: white;
  padding: 10px 20px;
  font-size: 1rem;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  justify-content: center;
  align-items: center;
}

.shop-now-btn:hover {
  background-color: white;
  color: #0875d5;
  justify-content: center;
  align-items: center;
}

.mens-image {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  
}

.mens-image img {
  max-width: 100%;
  height: 109px;
  border-radius: 10px;
  transition: transform 0.3s ease;
}

.mens-image img:hover {
  transform: scale(1.05);
}


    @media (min-width: 768px) {
        .slider {
        position: relative;
        overflow: hidden;
        height: 95vh;
      }
      .slides {
        display: flex;
        transition: transform 0.5s ease-in-out;
      }
      .slide {
        min-width: 100%;
        height: 90vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        text-align: center;
        font-size: 60px;
      }
      
      .slide button {
        margin-top: 10px;
        padding: 20px 30px;
        background: #007bff;
        color: #fff;
        border: none;
        border-radius: 50px;
        cursor: pointer;
      }

      /* Slider Dots */
      .slider-dots {
        position: absolute;
        bottom: 50px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 10px;
      }
      .slider-dots span {
        width: 8px;
        height: 8px;
        background: #fff;
        border-radius: 50%;
        cursor: pointer;
      }
      .slider-dots span.active {
        background: #007bff; /* Active for dot */
      }
      footer {
        display: none;
        justify-content: space-around;
        align-items: center;
        position: fixed;
        bottom: 0;
        width: 100%;
        background: #000;
        padding: 10px 0;
        z-index: 1;
      }
          /* Search Bar */
          .search-bar {
        margin: 5px auto;
        display: none;
        justify-content: center;
        gap: 10px;
        width: 70%;
      }
      .search-bar input {
        width: 90%;
        display: none;
        padding: 10px;
        border-radius: 50px;
        border: none;
      }
      .search-bar button {
        padding: 10px 20px;
        display: none;
        border-radius: 50px;
        background: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
      }




       /* Search Bar */
       .search-bar2 {
        margin: 5px auto;
        display: flex;
        justify-content: center;
        gap: 10px;
        width: 70%;
        height: 7vh;
        z-index: 999;
      }
      .search-bar2 input {
        width: 70%;
        padding: 10px;
        border-radius: 50px;
        border: none;
      }
      .search-bar2 button {
        padding: 10px 20px;
        border-radius: 50px;
        background: #007bff;
        color: #fff;
        border: 2px solid white;
        cursor: pointer;
      }
      header {
        background: #007bff; /* Blue */
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 20px;
        height: 80px;
      }
.space{
  display:none;
}

/* General icon styles */
.header-icons {
  display: flex;
  align-items: center;
  gap: 40px;
  margin-right: 9px;
}

.header-icons a {
  color: white;
  text-decoration: none;
  font-size: 16px;
  position: relative;
  display: flex;
  align-items: center;
}

.header-icons i {
  margin-right: 7px;
  font-size: 25px;
}

/* Dropdown container */
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-toggle {
  display: flex;
  align-items: center;
  cursor: pointer;
}

.dropdown-toggle .arrow {
  margin-left: 5px;
  font-size: 12px;
  transition: transform 0.3s ease;
}

.dropdown-content {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  background-color: white;
  border: 1px solid #ddd;
  border-radius: 4px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  z-index: 10;
  min-width: 150px;
}

.dropdown-content a {
  display: block;
  padding: 10px;
  color: black;
  text-decoration: none;
  font-size: 16px;
  transition: background-color 0.3s ease;
}

.dropdown-content a:hover {
  background-color: #f4f4f4;
}

/* Show dropdown on toggle */
.dropdown.open .dropdown-content {
  display: block;
}
.dropdown i{
  font-size: 25px;
}

/* Arrow rotation */
.dropdown.open .dropdown-toggle .arrow {
  transform: rotate(180deg);
}
.open-sidebar-btn{
  display:none;
}

 /* Basic styling for the category buttons */
 .category-buttons {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: nowrap;
        margin: 40px 30px;
        border-radius: 25px;
        transition: background-color 0.3s ease, color 0.3s ease;
      }

      .category-btn {
        padding: 10px 20px;
        border: 1px solid #fff;
        cursor: pointer;
        transition: background 0.3s;
        border-radius: 25px;
        font-size: 20px;
      }

      /* Hover effect */
      .category-btn:hover {
        background-color: #007bff;
        color: white;
      }

      /* Active category */
      .category-btn.active {
        background-color: #007bff;
        color: white;
      }








      .categories {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin: 20px 0;
        border-radius: 25px;
      }
      .categories div {
        padding: 10px 20px;
        border: 1px solid #fff;
        cursor: pointer;
        transition: background 0.3s;
        border-radius: 25px;
      }
      .categories div:hover {
        background: #007bff;
      }

      /* Products */
      .products {
        display: flex;
        flex-wrap: nowrap;
        justify-content: center;
        gap: 20px;
        padding: 20px;
      }
      .product {
        width: 100%; /* Two per row */
        text-align: center;
        background: #333;
        justify-content: center;
        padding: 20px;
        border-radius: 10px;
        position: relative;
      }
      .product img {
        width: 100%;
        height: 150px;
        border-radius: 10px;
      }
      .product .name {
        font-size: 1rem;
        margin: 10px 0;
        text-align: left;
      }
      .product .price {
        color: #0364c4;
        font-size:1.2rem;
        font-weight: bold;
        text-align: left;
      }
      .featured-product {
        position: relative;
        padding: 30px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        background: linear-gradient(90deg, #333, #000);
        clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%);
        height: 500px;
      }

      .product-image {
        flex: 1;
        max-width: 400px;
        margin: 20px;
        text-align: center;
        position: relative;
      }

      .product-image img {
        width: 100%;
        height: 340px;
        border-radius: 10px;
      }

      /* Dots for image navigation */
      .image-dots {
        position: absolute;
        bottom: -30px;
        display: flex;
        gap: 10px;
        justify-content: center;
        width: 100%;
      }

      .image-dots span {
        width: 15px;
        height: 15px;
        background: #fff;
        border-radius: 50%;
        cursor: pointer;
        transition: transform 0.3s ease;
      }

      .image-dots span.active {
        background: #007bff;
        transform: scale(1.2);
      }

      .product-details {
        flex: 1;
        max-width: 500px;
        margin: 20px;
        text-align: center;
      }

      .product-details h2 {
        font-size: 2rem;
        margin-bottom: 10px;
        text-align: center;
      }

      .product-details .prices {
        margin: 10px 0;
        text-align: center;
      }

      .prices .old-price {
        text-decoration: line-through;
        color: #aaa;
        margin-right: 10px;
        text-align: center;
      }

      .prices .new-price {
        color: #007bff;
        font-size: 1.5rem;
        text-align: center;
      }

      .rating {
        margin: 10px 0;
        color: #007bff;
        align-items: center;
        text-align: center;
      }

      .description {
        margin: 15px 0;
        line-height: 1.5;
        text-align: center;
      }

      .selectors {
        display: flex;
        gap: 20px;
        margin: 20px 0;
      }

      .selectors select,
      .selectors input {
        padding: 10px;
        border-radius: 5px;
        border: none;
        font-size: 1rem;
        display: flex;
        justify-content: center;
      }

      .add-to-cart {
        margin-top: 20px;
        z-index: 1;
        text-align: center;
        align-items: center;
      }

      .add-to-cart button {
        padding: 15px 30px;
        border: none;
        border-radius: 50px;
        background: #007bff;
        color: #000;
        font-size: 1rem;
        cursor: pointer;
        transition: 0.3s;
      }

      .add-to-cart button:hover {
        background: #007bff;
      }
     
      
      


      
      .top-phone-deals-section {
        padding: 20px;
        background-color: #000;
        color: #fff;
       margin-top: 100px;
      }

      .top-phone-deals-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #094585;
        border-radius: 20px;
        padding: 13px;
        margin-top: 100px;
        padding: 10px 30px; /* Adjust padding as needed */
        width: 100%;
      }

      .top-phone-deals-title {
        font-size: 1rem;
        margin: 0;
        margin-top: 100px;
      }

      .see-all-link {
        color: black;
        text-decoration: none;
        font-weight: bold;
      }

      .see-all-link:hover {
        text-decoration: underline;
      }

      /* Slider Container */
      .phone-slider-container {
        position: relative;
        overflow: hidden;
        margin-top: 20px;

        overflow-x: auto;
      }

      .phone-slider-track {
        display: flex;
        transition: transform 0.5s ease;
        display: flex;
        transition: transform 0.5s ease-in-out;
        display: flex;
        gap: none;
        overflow-x: auto;
        margin-left: -30px;
      }
      .name{
        margin-left: 40px;
      }

      .phone-product-card {
        width: 170px;
        margin-right: 75px;
        background: black;
        padding: 6px;
        border-radius: 10px;
        text-align: center;
        position: relative;
       margin-top: 200px;
       margin: 20px 0;
      }
      .phone-product-card img {
        width: 200px;
      }
      .phone-image {
        width: 60%;
        height: 80px;
        object-fit: cover;
        border-radius: 10px;
      }

      .phone-discount-tag {
        position: absolute;
        top: -5px;
        left: 50px;
        background: #ff0000;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 0.5rem;
      }

      .phone-product-info h3 {
       
        margin-right: 95px;
        font-size: 0.5rem;
        display: flex;
        white-space: nowrap;
        text-align: center;
        justify-content: center;
        margin-top: 10px;
      }
      .phone-product-name{
        margin-left: 100px;
      }

      .phone-price {
        color: #007bff;
        font-weight: bold;
        font-size: 10px;
        margin-left: 37px
      }

      /* Slider Controls */
      .phone-slider-controls { 
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
      }

      .phone-slider-controls button {
        background: none;
        border: none;
        color: #fff;
        font-size: 1rem;
        cursor: pointer;
      }

      .phone-slider-controls button:hover {
        color: #007bff;
      }
      

.best-seller-section {
        padding: 10px;
        background: black;
        height: 250px;
      }
      /* For Chrome, Edge, and Safari */
.best-seller-section::-webkit-scrollbar {
  width: 0; /* Width of the scrollbar */
  border-radius:30%;
}

.best-seller-section::-webkit-scrollbar-track {
  background:rgb(7, 7, 7); /* Background of the scrollbar track */
  color:rgb(7, 7, 7);
  width:3px;
}


.best-seller-section::-webkit-scrollbar-thumb {
  background: #888; /* Scrollbar thumb color */
  border-radius: 30px; /* Makes the thumb rounded */
  width:3px;
}

.best-seller-section::-webkit-scrollbar-thumb:hover {
  background: #007bff; /* Changes thumb color on hover */
}

/* For Firefox */
.best-seller-section {
  scrollbar-width: 0; /* Makes the scrollbar thin */
  scrollbar-color: #007bff rgb(11, 11, 11); /* Thumb and track colors */
  
  
}
.product-slider::-webkit-scrollbar{
  width: 2px;
}


      .best-seller-header {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
        color: #fff;
        background: #094585;
        padding: 13px;
        border-radius: 20px;

        padding: 10px 30px; /* Adjust padding as needed */
        width: 100%;
      }

      .product-slider {
        position: relative;
        overflow: hidden;
        white-space: nowrap;
        display: flex;
        align-items: center;
        display: flex;
        overflow-x: auto;
      }

      .product-slider .slider-track {
        display: flex;
        transition: transform 0.5s ease-in-out;
        display: flex;
        gap: none;
        overflow-x: auto;
        margin-left: -10px;
        
      }

      .product-card {
        flex: 0 0 auto;
        width: 250px;
        height: 290px;
        margin: 2px 3px;
        background-color: black;
        border-radius: 10px;
        
        text-align: center;
        position: relative;
        color: #fff;
        gap: 50px;
        overflow-x: auto;
        min-width: 150px;
        background-color: rgba(94, 91, 91, 0.5);

        border-radius: 10px;
        text-align: center;
        padding: 40px;
        position: relative;
        overflow: hidden;
        
      }

      .product-card img {
        width: 100%;
        height: 160px;
        border-radius: 10px;
      }

      .product-card .discount {
        position: absolute;
        top: 0px;
        left: 3px;
        background-color: #000;
        color: #fff;
        font-size: 0.6rem;
        padding: 5px;
        border-radius: 5px;
      }

      .product-card .name {
        margin: 10px 0;
        font-size: 1rem;
        flex-wrap: wrap;
        text-align: left;
      } 

      .product-card .price {
        font-weight: bold;
        color: #007bff;
        font-size: 1.1rem;
        text-align: left;
      }

   

      
      /* Basic styling for the category buttons */
      .category-buttons {
        display: none;
        justify-content: center;
        gap: 20px;
        margin: 20px 0;
        border-radius: 25px;
        transition: background-color 0.3s ease, color 0.3s ease;
      }

      .category-btn {
        padding: 10px 20px;
        border: 1px solid #fff;
        cursor: pointer;
        transition: background 0.3s;
        border-radius: 25px;
      }

      /* Hover effect */
      .category-btn:hover {
        background-color: #007bff;
        color: white;
      }

      /* Active category */
      .category-btn.active {
        background-color: #007bff;
        color: white;
      }






      .top-phone-deals-section {
        padding: 20px;
        background-color: #000;
        color: #fff;
        top:200px;
      }

      .top-phone-deals-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #094585;
        border-radius: 20px;
        padding: 13px;

        padding: 10px 30px; /* Adjust padding as needed */
        width: 100%;
      }

      .top-phone-deals-title {
        font-size: 1.5rem;
        margin: 0;
      }

      .see-all-link {
        color: black;
        text-decoration: none;
        font-weight: bold;
        font-size: 1.5rem;
      }
      .slider-track a {
        text-decoration: none;
      }

      .see-all-link:hover {
        text-decoration: underline;
      }

      /* Slider Container */
      .phone-slider-container {
        position: relative;
        overflow: hidden;
        margin-top: 20px;

        overflow-x: auto;
      }

      .phone-slider-track {
        display: flex;
        transition: transform 0.5s ease;
        transition: transform 0.5s ease-in-out;
        gap: none;
        overflow-x: auto;
        margin-left: -30px;
      }
      .name{
        margin-left: 40px;
      }

      .phone-product-card {
    
        width: 250px;
        margin: 3px 8px;
        border-radius: 10px;
        text-align: center;
        padding: 10px;
        position: relative;
        
        
        gap: 50px;
        background-color: rgba(39, 38, 38, 0.5);
       
      }
      .phone-product-card img {
        width: 100%;
      }
      .phone-image {
        width: 130%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
      }

      .phone-discount-tag {
        position: absolute;
        top: -5px;
        left: 50px;
        background: #ff0000;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 0.5rem;
      }

      .phone-product-info h3 {
       
        margin-right: 95px;
        font-size: 0.8rem;
        display: flex;
        white-space: nowrap;
        text-align: center;
        justify-content: center;
        margin-top: 10px;
      }
      .phone-product-name{
        margin-left: 80px;
        font-size: 12px;
      }

      .phone-price {
        color: #007bff;
        font-weight: bold;
        font-size: 15px;
        margin-left: -5px
      }

      /* Slider Controls */
      .phone-slider-controls { 
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
      }

      .phone-slider-controls button {
        background: none;
        border: none;
        color: #fff;
        font-size: 1rem;
        cursor: pointer;
      }

      .phone-slider-controls button:hover {
        color: #007bff;
      }
      .products {
       
        margin-top: 50px;
      }
      .mens-collection-content {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
  gap: 20px;
}
      }
      .space2 {
  position: relative;
  flex: 1;
  text-align: center;
}
.slider-track a {
        text-decoration: none;
      }
   
/* General Styles */



/* Footer Styles */
.aura-footer {
  background-color: #222;
  color:rgb(141, 144, 147);
  padding: 20px 10px;
  text-align: center;
}

.footer-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 30px;
  margin-bottom: 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.footer-logo {
  max-width: 100px;
  margin-bottom: 10px;
}

.footer-about h2 {
  font-size: 24px;
  margin: 10px 0;
  color:rgb(249, 250, 251);
}

.footer-about p {
  font-size: 14px;
  color: #bbb;
}

.footer-links h3,
.footer-support h3,
.footer-social h3 {
  font-size: 18px;
  color:rgb(245, 247, 249);
  margin-bottom: 10px;
}

.footer-links ul,
.footer-support ul {
  list-style: none;
  padding: 0;
}

.footer-links ul li,
.footer-support ul li {
  margin-bottom: 8px;
}

.footer-links ul li a,
.footer-support ul li a {
  color:rgb(141, 144, 147);
  text-decoration: none;
  font-size: 14px;
  transition: color 0.3s;
}

.footer-links ul li a:hover,
.footer-support ul li a:hover {
  color: #007bff;
}

.footer-social p {
  font-size: 14px;
  color: #bbb;
  margin-bottom: 10px;
}

.social-icons a {
  color: #fff;
  font-size: 18px;
  margin-right: 15px;
  transition: transform 0.3s, color 0.3s;
}

.social-icons a:hover {
  transform: scale(1.2);
  color: #007bff;
}

.footer-bottom {
  text-align: center;
  border-top: 1px solid #444;
  padding-top: 15px;
  font-size: 14px;
  color: #bbb;
}

.footer-bottom a {
  color: #007bff;
  text-decoration: none;
  font-weight: bold;
}

.footer-bottom a:hover {
  text-decoration: underline;
}
/* Brand Carousel Styles */
.brand-carousel {
  background-color:rgb(4, 3, 3);
  padding: 20px 0;
  overflow: hidden;
}

.carousel-container {
  display: flex;
  align-items: center;
  animation: scroll 25s linear infinite; /* Smooth scrolling effect */
}

.brand-logo {
  flex-shrink: 0;
  width: 80px;
  height: 80px;
  margin: 0 15px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
  background-color: #fff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  border: 2px solid #ddd;
  transition: transform 0.3s;
}

.brand-logo img {
  width: 60%;
  height: auto;
}

.brand-logo:hover {
  transform: scale(1.1);
  box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
}

@keyframes scroll {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-100%);
  }
} 





     
    </style>
  </head>
  <body>
    <!-- Header -->
    <header>
      <div class="logo">
        <img
          src="Gray_and_Black_Simple_Studio_Logo__2_-removebg-preview.png"
          alt=""
        />
      </div>

      <form class="search-bar2"  id="search-form" action="search.php" method="GET"   onsubmit="showLoading()">
        <input type="text" id="search-input" name="query" placeholder="Search for products..." required>
        <button type="submit">Search</button>
    </form>
    <div class="header-icons">
  <!-- Cart -->
  <a href="cart.html">
    <i class="fas fa-shopping-cart"></i> Cart
    <span id="cart-count2">0</span>
  </a>

  <!-- Help Dropdown -->
  <div class="dropdown" id="help-dropdown">
    <div class="dropdown-toggle" onclick="toggleDropdown('help-dropdown')">
      <i class="fas fa-info-circle"></i> Help
      <span class="arrow">&#x25BC;</span>
    </div>
    <div class="dropdown-content">
      <a href="contact.html">Contact</a>
      <a href="faq.html">FAQ</a>
    </div>
  </div>

  <!-- Account Dropdown -->
  <div class="dropdown" id="account-dropdown">
    <div class="dropdown-toggle" onclick="toggleDropdown('account-dropdown')">
      <i class="fas fa-user"></i>  Account
      <span class="arrow">&#x25BC;</span>
    </div>
    <div class="dropdown-content">
      <a href="profile.html">User</a>
      <a href="cart.html">My Cart</a>
      <a href="favorites.html">Favorites</a>
    </div>
  </div>
</div>
<script>
  function toggleDropdown(id) {
  const dropdown = document.getElementById(id);
  dropdown.classList.toggle('open');
}

</script>

   

   
        <span class="open-sidebar-btn" onclick="toggleSidebar()">☰</span>
        
      </div>
    
    </header>
    <div class="sidebar" id="sidebar">
      <button class="close-btn" onclick="toggleSidebar()">×</button>
      <ul class="sidebar-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.html">About Us</a></li>
      
        <li><a href="contact.html">Contact</a></li>
        <li><a href="fag.html">FAQs</a></li>
        <li><a href="terms.html">Terms & Conditions</a></li>
        <li><a href="policies.html">Policies</a></li>
      </ul>
      <br>
      <br>
      <div class="socials">
        <h2>Connect With Us</h2>
        <br />
  
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
    <script>
      // Function to toggle the sidebar
      function toggleSidebar() {
        const sidebar = document.getElementById("sidebar");
        if (sidebar.style.top === "0px") {
          sidebar.style.top = "-450px"; // Close sidebar
        } else {
          sidebar.style.top = "0"; // Open sidebar
        }
      }
    </script>

    <!-- Search Bar -->
  
  
      <form class="search-bar"  id="search-form" action="search.php" method="GET"   onsubmit="showLoading()">
        <input type="text" id="search-input" name="query" placeholder="Search for products..." required>
        <button type="submit">Search</button>
    </form>
  
    <!-- Loading Animation -->
   


    <!-- Sliding Banner -->
    <div class="slider">
      <div class="slides">
        <div
          class="slide"
          style="
            background: url(raphael-nogueira-qHlsndlzXds-unsplash.jpg) no-repeat center
              center;
            background-size: cover;
          "
        >
          <h2>Nike Collection</h2>
          <p>Get up to 25% OFF!</p>
          <a href="nike.html"> <button>Show Now</button></a>
        </div>
        <div
          class="slide"
          style="
            background: url(trifon-yurukov-a46hk9S8bgI-unsplash.jpg) no-repeat
              center center;
            background-size: cover;
          "
        >
          <h2>Christmas Gifts</h2>
          <p>Holiday Deals Await!</p>
          <button>Explore Gifts</button>
        </div>
        <div
          class="slide"
          style="
            background: url(viktor-hesse-yTmOqR7l_io-unsplash.jpg) no-repeat center
              center;
            background-position: top;
            background-size: cover;
          "
        >
          <h2>Women's Fashion</h2>
          <p>Style Yourself: 25% OFF!</p>
         <a href="girls.html"> <button>Discover More</button></a>
        </div>
      </div>
      <div class="slider-dots">
        <span class="active" onclick="changeSlide(0)"></span>
        <span onclick="changeSlide(1)"></span>
        <span onclick="changeSlide(2)"></span>
      </div>
    </div>

    <!-- Categories -->
    <div class="category-buttons">
      <button class="category-btn" id="all" onclick="location.href='all.html'">
        All
      </button>
      <button
        class="category-btn"
        id="all"
        onclick="location.href='boys.html'"
      >
        Boys
      </button>
      <button
        class="category-btn"
        id="girls"
        onclick="location.href='girls.html'"
      >
        Girls
      </button>
      <button
        class="category-btn"
        id="gifts"
        onclick="location.href='gifts.html'"
      >
        Gifts
      </button>
    </div>
    <div class="category-buttons">
      <button
        class="category-btn"
        id="boys"
        onclick="location.href='boys.html'"
      >
        Gadgets
      </button>
      <button
        class="category-btn"
        id="girls"
        onclick="location.href='stationery.html'"
      >
        Stationery
      </button>
    </div>

    <!-- Products -->
    <div class="products">
      <div class="product">
        <a href="details.php">
        <img src="Best Shoes For Men Nike.jpg" alt="Nike Air Max" />
         <div class="name">Nike Air Max</div>

        <div class="price">₦60,000</div>
      </a>
      
      </div>
      <div class="product">
        <a href="vintagegown.html">
        <img src="Sexy.jpg" alt="Women's Blazer" />
        <div class="name">Vintage Gown</div>
        <div class="price">₦60,000</div>
        </a>
      
      </div>
      <div class="product">
        <img src="Tênis Infantil Dinossauro Tecido - Vermelho _ 28.jpg" alt="Nike Air Max" />
        <div class="name">Nike Air Max</div>
        <div class="price">₦30,000</div>
      
      </div>
      <div class="product">
        <img src="Sunflower Women Short Pleated Skirts Cotton High Waist Lemon Floral Polka Dot Printed HepburnY2K JK School Casual Skater.jpg" alt="Women's Blazer" />
        <div class="name">Sunflower Pleated Skirts</div>
        <div class="price">₦30,000</div>
  
      </div>
      <div class="product">
        <img
          src="Round Pointer Quartz Watch.jpg"
          alt="Nike Air Max"
        />
        <div class="name">Women's Quartz Watch</div>
        <div class="price">₦90,000</div>
        
      </div>
      <div class="product">
        <img
          src="Pure Linen Shirt Men.jpg"
          alt="Women's Blazer"
        />
        
        <div class="name">Linen Shirt Men
          
        </div>
        <div class="price">₦5,000</div>
        
      </div>
    </div>
  
  
    <!-- Footer -->
    <footer>
    <a class="solo" href="#">
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
    <a href="user.php">
      <i class="fas fa-user"></i>
      <span>Account</span>
    </a>
  </footer>
    

    <script>
      // Slider Functionality
      let currentSlide = 0;
      const slides = document.querySelector(".slides");
      const dots = document.querySelectorAll(".slider-dots span");
      const totalSlides = dots.length;

      function changeSlide(index) {
        slides.style.transform = `translateX(-${index * 100}%)`;
        dots.forEach((dot) => dot.classList.remove("active"));
        dots[index].classList.add("active");
        currentSlide = index;
      }

      // Auto Slide Functionality
      function autoSlide() {
        currentSlide = (currentSlide + 1) % totalSlides; // Go to the next slide, loop back to the first
        changeSlide(currentSlide);
      }

      setInterval(autoSlide, 5000); // Auto slide every 5 seconds

      // Toggle Like Button
      function toggleLike(icon) {
        icon.classList.toggle("liked");
      }
    </script>
    <div class="brand-carousel">
  <div class="carousel-container">
    <a href="nike.html"><div class="brand-logo"><img src="nike-seeklogo.png" alt="Nike"></div></a>
    <a href="adidas.html"><div class="brand-logo"><img src="adidas-seeklogo.png" alt="Adidas"></div></a>
    <div class="brand-logo"><img src="puma-seeklogo.png" alt="Puma"></div>
    <div class="brand-logo"><img src="gucci_logo.png" alt="Gucci"></div>
    <div class="brand-logo"><img src="Prada-Symbol.png" alt="Prada"></div>
    <div class="brand-logo"><img src="Air-Jordan-Logo-120x67.png" alt="Air-Jordan"></div>
    <div class="brand-logo"><img src="Louis-Vuitton-Logo-120x67.png" alt="Louis-Vuitton-"></div>
    <a href="nike.html"><div class="brand-logo"><img src="nike-seeklogo.png" alt="Nike"></div></a>
    <a href="adidas.html"><div class="brand-logo"><img src="adidas-seeklogo.png" alt="Adidas"></div></a>
    <div class="brand-logo"><img src="puma-seeklogo.png" alt="Puma"></div>
    <div class="brand-logo"><img src="gucci_logo.png" alt="Gucci"></div>
    <div class="brand-logo"><img src="Prada-Symbol.png" alt="Prada"></div>
    <div class="brand-logo"><img src="Air-Jordan-Logo-120x67.png" alt="Air-Jordan"></div>
    <div class="brand-logo"><img src="Louis-Vuitton-Logo-120x67.png" alt="Louis-Vuitton-"></div>
    <a href="nike.html"><div class="brand-logo"><img src="nike-seeklogo.png" alt="Nike"></div></a>
    <a href="adidas.html"><div class="brand-logo"><img src="adidas-seeklogo.png" alt="Adidas"></div></a>
    <div class="brand-logo"><img src="puma-seeklogo.png" alt="Puma"></div>
    <div class="brand-logo"><img src="gucci_logo.png" alt="Gucci"></div>
    <div class="brand-logo"><img src="Prada-Symbol.png" alt="Prada"></div>
    <div class="brand-logo"><img src="Air-Jordan-Logo-120x67.png" alt="Air-Jordan"></div>
    <div class="brand-logo"><img src="Louis-Vuitton-Logo-120x67.png" alt="Louis-Vuitton-"></div>
    <a href="nike.html"><div class="brand-logo"><img src="nike-seeklogo.png" alt="Nike"></div></a>
    <a href="adidas.html"><div class="brand-logo"><img src="adidas-seeklogo.png" alt="Adidas"></div></a>
    <div class="brand-logo"><img src="puma-seeklogo.png" alt="Puma"></div>
    <div class="brand-logo"><img src="gucci_logo.png" alt="Gucci"></div>
    <div class="brand-logo"><img src="Prada-Symbol.png" alt="Prada"></div>
    <div class="brand-logo"><img src="Air-Jordan-Logo-120x67.png" alt="Air-Jordan"></div>
    <div class="brand-logo"><img src="Louis-Vuitton-Logo-120x67.png" alt="Louis-Vuitton-"></div>
  </div>
  
</div>
<script>
  const carouselContainer = document.querySelector('.carousel-container');

// Duplicate the logos to make an infinite loop
const clone = carouselContainer.cloneNode(true);



</script>
    <div class="slider-container2">
  <div class="slider2">
    <!-- Product 1 -->
    <section class="featured-product">
      <div class="product-image">
        <img src="nikeshoe.jpg" alt="Featured Product" />
        <div class="image-dots">
          <span class="active" data-image="nikeshoe.jpg"></span>
          <span data-image="Best Shoes For Men Nike.jpg"></span>
          <span data-image="pat-kwon-EJTjetc8tPs-unsplash.jpg"></span>
        </div>
      </div>
      <div class="product-details">
        <h2>Nike Air Max 2024</h2>
        <div class="prices">
          <span class="old-price">₦58,000</span>
          <span class="new-price">₦50,000</span>
        </div>
        <div class="rating">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i>
          (4.0)
        </div>
        <p class="description">
          Step into comfort with the all-new Nike Air Max 2024. Designed for
          performance and style, this shoe is perfect for every occasion.
        </p>
        <div class="selectors">
          <select id="color-selector">
            <option value="black">Black</option>
            <option value="white">White</option>
            <option value="blue">Blue</option>
          </select>
          <input type="number" id="quantity-selector" min="1" value="1" />
        </div>
        <div class="add-to-cart">
          <button class="add-to-cart-button">Add to Cart</button>
        </div>
      </div>
    </section>

   
    <section class="featured-product">
      <div class="product-image">
        <img src="campus (1).jpeg" alt="Samsung Sound Box Pro" />
        <div class="image-dots">
          <span class="active" data-image="campus (1).jpeg"></span>
          <span data-image="Adidas Campus 00s.jpeg"></span>
          <span data-image="Adidas Campus 00s (1).jpeg"></span>
        </div>
      </div>
      <div class="product-details">
        <h2>Adidas Campus 00s</h2>
        <div class="prices">
          <span class="old-price">₦38,000</span>
          <span class="new-price">₦30,000</span>
        </div>
        <div class="rating">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i>
          <i class="far fa-star"></i>
          (3.0)
        </div>
        <p class="description">
          Step into comfort with the all-new Adidas Campus 00s. Designed for
          performance and style, this shoe is perfect for every occasion.
        </p>
        <div class="selectors">
          <select id="color-selector">
            <option value="black">Black</option>
            <option value="white">Green</option>
            <option value="white">Blue</option>
            <option value="white">Red</option>
            
          </select>
          <input type="number" id="quantity-selector" min="1" value="1" />
        </div>
        <div class="add-to-cart">
          <button class="add-to-cart-button">Add to Cart</button>
        </div>
      </div>
    </section>


    
    <section class="featured-product">
      <div class="product-image">
        <img src="Laptop.jpg" alt="Mac Book LIte 2018" />
        <div class="image-dots">
          <span class="active" data-image="pat-kwon-EJTjetc8tPs-unsplash.jpg"></span>
          <span data-image="https://via.placeholder.com/400x400/FFFFFF/000000?text=Nike+Air+Max"></span>
          <span data-image="https://via.placeholder.com/400x400/0000FF/FFFFFF?text=Nike+Air+Max"></span>
        </div>
      </div>
      <div class="product-details">
        <h2>Mac Book LIte 2018</h2>
        <div class="prices">
          <span class="old-price">₦1,580,000</span>
          <span class="new-price">₦1,430,000</span>
        </div>
        <div class="rating">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          (5.0)
        </div>
        <p class="description">
          The mac book lite 2018 is just what you need to start that tech journey.
        </p>
        <div class="selectors">
          <select id="color-selector">
            <option value="black">Black</option>
            <option value="white">White</option>
            <option value="blue">Blue</option>
          </select>
          <input type="number" id="quantity-selector" min="1" value="1" />
        </div>
        <div class="add-to-cart">
          <button class="add-to-cart-button">Add to Cart</button>
        </div>
      </div>
    </section>


    
    <section class="featured-product">
      <div class="product-image">
        <img src="evgeny-opanasenko-cZye2sFqu5o-unsplash.jpg" alt="Samsung Galaxy Flip 6" />
        <div class="image-dots">
          <span class="active" data-image="pat-kwon-EJTjetc8tPs-unsplash.jpg"></span>
          <span data-image="https://via.placeholder.com/400x400/FFFFFF/000000?text=Nike+Air+Max"></span>
          <span data-image="https://via.placeholder.com/400x400/0000FF/FFFFFF?text=Nike+Air+Max"></span>
        </div>
      </div>
      <div class="product-details">
        <h2>Samsung Galaxy Flip 6</h2>
        <div class="prices">
          <span class="old-price">₦808,000</span>
          <span class="new-price">₦780,000</span>
        </div>
        <div class="rating">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          (5.0)
        </div>
        <p class="description">
          Step into comfort with the all-new Nike Air Max 2024. Designed for
          performance and style, this shoe is perfect for every occasion.
        </p>
        <div class="selectors">
          <select id="color-selector">
            <option value="black">Black</option>
            <option value="white">White</option>
            <option value="blue">Blue</option>
          </select>
          <input type="number" id="quantity-selector" min="1" value="1" />
        </div>
        <div class="add-to-cart">
          <button class="add-to-cart-button">Add to Cart</button>
        </div>
      </div>
    </section>
  </div>
</div>
<script>
  const slider = document.querySelector(".slider2");
const products = document.querySelectorAll(".featured-product");
const imageDots = document.querySelectorAll(".image-dots span");
const toast = document.getElementById("toast");

let isDragging = false;
let startPos = 0;           
let currentTranslate = 0;
let prevTranslate = 0;
let animationID;
let currentIndex = 0;

// Swipe Logic
slider.addEventListener("touchstart", touchStart);
slider.addEventListener("touchend", touchEnd);
slider.addEventListener("touchmove", touchMove);

slider.addEventListener("mousedown", touchStart);
slider.addEventListener("mouseup", touchEnd);
slider.addEventListener("mousemove", touchMove);
slider.addEventListener("mouseleave", () => (isDragging = false));

function touchStart(event) {
  isDragging = true;
  startPos = getPositionX(event);
  animationID = requestAnimationFrame(animation);
}

function touchEnd() {
  isDragging = false;
  cancelAnimationFrame(animationID);

  const movedBy = currentTranslate - prevTranslate;

  if (movedBy < -100 && currentIndex < products.length - 1) currentIndex += 1;
  if (movedBy > 100 && currentIndex > 0) currentIndex -= 1;

  setPositionByIndex();
}

function touchMove(event) {
  if (isDragging) {
    const currentPosition = getPositionX(event);
    currentTranslate = prevTranslate + currentPosition - startPos;
  }
}

function getPositionX(event) {
  return event.type.includes("mouse") ? event.pageX : event.touches[0].clientX;
}

function animation() {
  slider.style.transform = `translateX(${currentTranslate}px)`;
  if (isDragging) requestAnimationFrame(animation);
}

function setPositionByIndex() {
  currentTranslate = currentIndex * -window.innerWidth;
  prevTranslate = currentTranslate;
  slider.style.transform = `translateX(${currentTranslate}px)`;
}

// Product Logic
imageDots.forEach((dot) => {
  dot.addEventListener("click", () => {
    const activeDot = dot.parentElement.querySelector(".active");
    if (activeDot) activeDot.classList.remove("active");
    dot.classList.add("active");

    const productImage = dot.closest(".product-image").querySelector("img");
    productImage.src = dot.dataset.image;
  });
});

document.querySelectorAll(".add-to-cart-button").forEach((button) => {
  button.addEventListener("click", (event) => {
    const product = event.target.closest(".featured-product");
    const selectedColor = product.querySelector("#color-selector").value;
    const selectedQuantity = product.querySelector("#quantity-selector").value;

    // Show toast notification
    toast.textContent = `Added ${selectedQuantity} item(s) to your cart.`;
    toast.classList.add("show");

    setTimeout(() => {
      toast.classList.remove("show");
    }, 3000);
  });
});

</script>
<div class="toast" id="toast"></div>

    <section class="student-favorites">
      <h2>Student Favorites</h2>
      <div class="favorites-container">
        <!-- Product 1 -->
        <div class="favorite-item">
          <img src="DSTELIN Soft Cover Spiral Notebook Journal 2-Pack, Blank Sketch Book Pad, Wirebound Memo Notepads Diary Notebook Planner with Unlined Paper, 100 Pages_ 50 Sheets, 7Inchx 4_75Inch (Brown and Black).jpg" alt="Product 1" />
          <h3>Notebook Pack</h3>
          <p>₦3,000</p>
          <button>Buy Now</button>
        </div>
        <!-- Product 2 -->
        <div class="favorite-item">
          <img src="🔥NEW DEAL ALERT!!!🔥.jpg" alt="Product 2" />
          <h3>Wireless Earbuds</h3>
          <p>₦40,000</p>
          <button>Buy Now</button>
        </div>
        <!-- Product 3 -->
        <div class="favorite-item">
          <img src="Personal Special Water Private Custom-made Gift Thermos Cup Creative Printing Photo Logo - Blue _ Digital display _ 500ml.jpg" alt="Product 3" />
          <h3> Water Bottle</h3>
          <p>₦5,000</p>
          <button>Buy Now</button>
        </div>
      </div>
    </section>

    <div class="best-seller-section">
      <div class="best-seller-header">Best Sellers</div>

      <div class="product-slider">
        <div class="slider-track">
          <a href="details.php">
          <div class="product-card">
            <div class="discount">30% OFF</div>
            <img src="Best Shoes For Men Nike.jpg" alt="Product 1" />
            <div class="name">Nike Flyknit</div>
            <div class="price">₦30,000</div>
          </div>
          </a>
          <div class="product-card">
            <div class="discount">20% OFF</div>
            <img src="Marehaven Fashion Simple Small Square Bag Mini Nylon Zipper Leisure Messenger Bag Women Phone Storage Shoulder Bag Yellow.jpg" alt="Product 2" />
            <div class="name">Marehaven Bag</div>
            <div class="price">₦15,000</div>
          </div>

          <div class="product-card">
            <div class="discount">40% OFF</div>
            <img
              src="1pc Flap Pocket Overalls.jpg"
              alt="Product 3"
            />
            <div class="name">Women Track-suit</div>
            <div class="price">₦20,000</div>
          </div>

          <div class="product-card">
            <div class="discount">10% OFF</div>
            <img
              src="f47dc59d-9614-4fcd-8db7-df02c612bb7d.jpeg"
              alt="Product 4"
            />
            <div class="name">Golden Glow Hoops</div>
            <div class="price">₦3,000</div>
          </div>
          <div class="product-card">
            <div class="discount">30% OFF</div>
            <img src="NikeSbDunk.jpg" alt="Product 1" />
            <div class="name">Nike Flyknit Force</div>
            <div class="price">₦30,000</div>
          </div>

          <div class="product-card">
            <div class="discount">20% OFF</div>
            <img src="glasses.jpg" alt="Product 2" />
            <div class="name">Urban Dark Glass</div>
            <div class="price">₦10,000</div>
          </div>

          <div class="product-card">
            <div class="discount">6% OFF</div>
            <img
              src="d0192579008db983f3c24a49c14381ae.jpg"
              alt="Product 3"
            />
            <div class="name">Adidas Campus 0s</div>
            <div class="price">₦24,000</div>
          </div>

          <div class="product-card">
            <div class="discount">3% OFF</div>
            <img
              src="d59b17b31f66caf5643b0a763b936f28.jpg"
              alt="Product 4"
            />
            <div class="name">Adidas Men top</div>
            <div class="price">₦2,000</div>
          </div>
          <div class="product-card">
            <div class="discount">30% OFF</div>
            <img src="NikeSbDunk.jpg" alt="Product 1" />
            <div class="name">Nike Flyknit Force</div>
            <div class="price">₦30,000</div>
          </div>

          <div class="product-card">
            <div class="discount">20% OFF</div>
            <img src="vic-domic-RvYwaBjo83M-unsplash.jpg" alt="Product 2" />
            <div class="name">Urban Goddess Tracksuit</div>
            <div class="price">₦13,000</div>
          </div>

          <div class="product-card">
            <div class="discount">40% OFF</div>
            <img
              src="joshua-rawson-harris-6PROVhY2Yq4-unsplash.jpg"
              alt="Product 3"
            />
            <div class="name">Urban Chic Crop</div>
            <div class="price">₦5,000</div>
          </div>

          <div class="product-card">
            <div class="discount">10% OFF</div>
            <img
              src="nataliya-melnychuk-5ngCICAXiH0-unsplash.jpg"
              alt="Product 4"
            />
            <div class="name">Golden Glow Hoops</div>
            <div class="price">₦10,000</div>
          </div>
          <div class="product-card">
            <div class="discount">30% OFF</div>
            <img src="domino-studio-164_6wVEHfI-unsplash.jpg" alt="Product 1" />
            <div class="name">Nike Flyknit Force</div>
            <div class="price">₦30,000</div>
          </div>

          <div class="product-card">
            <div class="discount">20% OFF</div>
            <img src="vic-domic-RvYwaBjo83M-unsplash.jpg" alt="Product 2" />
            <div class="name">Urban Goddess Tracksuit</div>
            <div class="price">₦15,000</div>
          </div>

          <div class="product-card">
            <div class="discount">40% OFF</div>
            <img
              src="joshua-rawson-harris-6PROVhY2Yq4-unsplash.jpg"
              alt="Product 3"
            />
            <div class="name">Urban Chic Crop</div>
            <div class="price">₦5,000</div>
          </div>

          <div class="product-card">
            <div class="discount">10% OFF</div>
            <img
              src="nataliya-melnychuk-5ngCICAXiH0-unsplash.jpg"
              alt="Product 4"
            />
            <div class="name">Golden Glow Hoops</div>
            <div class="price">₦3,000</div>
          </div>
          <div class="product-card">
            <div class="discount">30% OFF</div>
            <img src="domino-studio-164_6wVEHfI-unsplash.jpg" alt="Product 1" />
            <div class="name">Nike Flyknit Force</div>
            <div class="price">₦30,000</div>
          </div>

          <div class="product-card">
            <div class="discount">20% OFF</div>
            <img src="vic-domic-RvYwaBjo83M-unsplash.jpg" alt="Product 2" />
            <div class="name">Urban Goddess Tracksuit</div>
            <div class="price">₦10,000</div>
          </div>

          <div class="product-card">
            <div class="discount">40% OFF</div>
            <img
              src="joshua-rawson-harris-6PROVhY2Yq4-unsplash.jpg"
              alt="Product 3"
            />
            <div class="name">Urban Chic Crop</div>
            <div class="price">₦5,000</div>
          </div>

          <div class="product-card">
            <div class="discount">10% OFF</div>
            <img
              src="nataliya-melnychuk-5ngCICAXiH0-unsplash.jpg"
              alt="Product 4"
            />
            <div class="name">Golden Glow Hoops</div>
            <div class="price">₦5,000</div>
          </div>
          <div class="product-card">
            <div class="discount">30% OFF</div>
            <img src="domino-studio-164_6wVEHfI-unsplash.jpg" alt="Product 1" />
            <div class="name">Nike Flyknit Force</div>
            <div class="price">₦30,000</div>
          </div>

          <div class="product-card">
            <div class="discount">20% OFF</div>
            <img src="vic-domic-RvYwaBjo83M-unsplash.jpg" alt="Product 2" />
            <div class="name">Urban Goddess Tracksuit</div>
            <div class="price">₦13,000</div>
          </div>

          <div class="product-card">
            <div class="discount">40% OFF</div>
            <img
              src="joshua-rawson-harris-6PROVhY2Yq4-unsplash.jpg"
              alt="Product 3"
            />
            <div class="name">Urban Chic Crop</div>
            <div class="price">₦5,000</div>
          </div>

          <div class="product-card">
            <div class="discount">10% OFF</div>
            <img
              src="nataliya-melnychuk-5ngCICAXiH0-unsplash.jpg"
              alt="Product 4"
            />
            <div class="name">Golden Glow Hoops</div>
            <div class="price">₦10,000</div>
          </div>
          <div class="product-card">
            <div class="discount">30% OFF</div>
            <img src="domino-studio-164_6wVEHfI-unsplash.jpg" alt="Product 1" />
            <div class="name">Nike Flyknit Force</div>
            <div class="price">₦30,000</div>
          </div>

          <div class="product-card">
            <div class="discount">20% OFF</div>
            <img src="vic-domic-RvYwaBjo83M-unsplash.jpg" alt="Product 2" />
            <div class="name">Urban Goddess Tracksuit</div>
            <div class="price">₦15,000</div>
          </div>

          <div class="product-card">
            <div class="discount">40% OFF</div>
            <img
              src="joshua-rawson-harris-6PROVhY2Yq4-unsplash.jpg"
              alt="Product 3"
            />
            <div class="name">Urban Chic Crop</div>
            <div class="price">₦5,000</div>
          </div>

          <div class="product-card">
            <div class="discount">10% OFF</div>
            <img
              src="nataliya-melnychuk-5ngCICAXiH0-unsplash.jpg"
              alt="Product 4"
            />
            <div class="name">Golden Glow Hoops</div>
            <div class="price">₦3,000</div>
          </div>
          <div class="product-card">
            <div class="discount">30% OFF</div>
            <img src="domino-studio-164_6wVEHfI-unsplash.jpg" alt="Product 1" />
            <div class="name">Nike Flyknit Force</div>
            <div class="price">₦30,000</div>
          </div>

          <div class="product-card">
            <div class="discount">20% OFF</div>
            <img src="vic-domic-RvYwaBjo83M-unsplash.jpg" alt="Product 2" />
            <div class="name">Urban Goddess Tracksuit</div>
            <div class="price">₦10,000</div>
          </div>

          <div class="product-card">
            <div class="discount">40% OFF</div>
            <img
              src="joshua-rawson-harris-6PROVhY2Yq4-unsplash.jpg"
              alt="Product 3"
            />
            <div class="name">Urban Chic Crop</div>
            <div class="price">₦5,000</div>
          </div>

          <div class="product-card">
            <div class="discount">10% OFF</div>
            <img
              src="nataliya-melnychuk-5ngCICAXiH0-unsplash.jpg"
              alt="Product 4"
            />
            <div class="name">Golden Glow Hoops</div>
            <div class="price">₦5,000</div>
          </div>
          <div class="product-card">
            <div class="discount">30% OFF</div>
            <img src="domino-studio-164_6wVEHfI-unsplash.jpg" alt="Product 1" />
            <div class="name">Nike Flyknit Force</div>
            <div class="price">₦30,000</div>
          </div>

          <div class="product-card">
            <div class="discount">20% OFF</div>
            <img src="vic-domic-RvYwaBjo83M-unsplash.jpg" alt="Product 2" />
            <div class="name">Urban Goddess Tracksuit</div>
            <div class="price">₦13,000</div>
          </div>

          <div class="product-card">
            <div class="discount">40% OFF</div>
            <img
              src="joshua-rawson-harris-6PROVhY2Yq4-unsplash.jpg"
              alt="Product 3"
            />
            <div class="name">Urban Chic Crop</div>
            <div class="price">₦5,000</div>
          </div>

          <div class="product-card">
            <div class="discount">10% OFF</div>
            <img
              src="nataliya-melnychuk-5ngCICAXiH0-unsplash.jpg"
              alt="Product 4"
            />
            <div class="name">Golden Glow Hoops</div>
            <div class="price">₦10,000</div>
          </div>
        </div>

       
      </div>
    </div>

    <script>
      const sliderTrack = document.querySelector(".slider-track");
      const prevSlide = document.querySelector(".prev-slide");
      const nextSlide = document.querySelector(".next-slide");
      const cards = document.querySelectorAll(".product-card");
      const cardWidth = cards[0].offsetWidth + 20; // Card width + margin
      let currentSlide2 = 0;

      function updateSlider() {
        sliderTrack.style.transform = `translateX(-${
          currentSlide2 * cardWidth
        }px)`;
      }

      nextSlide.addEventListener("click", () => {
        if (currentSlide2 < cards.length - 1) {
          currentSlide2++;
          updateSlider();
        }
      });

      prevSlide.addEventListener("click", () => {
        if (currentSlide2 > 0) {
          currentSlide2--;
          updateSlider();
        }
      });

      // Auto-slide functionality
      setInterval(() => {
        if (currentSlide2 < cards.length - 1) {
          currentSlide2++;
        } else {
          currentSlide2 = 0;
        }
        updateSlider();
      }, 5000);
    </script>
    <section class="top-phone-deals-section">
      <div class="top-phone-deals-header">
        <h2 class="top-phone-deals-title">Top Phone Deals</h2>
        <a href="#see-all" class="see-all-link">See All</a>
      </div>

      <!-- Slider Container -->
      <div class="phone-slider-container">
        <div class="phone-slider-track">
          <!-- Product Card 1 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-20%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 1"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦50,000</p>
            </div>
          </div>

          <!-- Product Card 2 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-15%</div>
            <img
              src="f1.jpg"
              alt="Phone 2"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦45,000</p>
            </div>
          </div>

          <!-- Product Card 3 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-10%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 3"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦60,000</p>
            </div>
          </div>

          <div class="phone-product-card">
            <div class="phone-discount-tag">-20%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 1"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦50,000</p>
            </div>
          </div>

          <!-- Product Card 2 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-15%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 2"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦45,000</p>
            </div>
          </div>

          <!-- Product Card 3 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-10%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 3"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦60,000</p>
            </div>
          </div>
          <div class="phone-product-card">
            <div class="phone-discount-tag">-20%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 1"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦50,000</p>
            </div>
          </div>

          <!-- Product Card 2 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-15%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 2"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦45,000</p>
            </div>
          </div>

          <!-- Product Card 3 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-10%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 3"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦60,000</p>
            </div>
          </div>
          <div class="phone-product-card">
            <div class="phone-discount-tag">-20%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 1"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦50,000</p>
            </div>
          </div>

          <!-- Product Card 2 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-15%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 2"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦45,000</p>
            </div>
          </div>

          <!-- Product Card 3 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-10%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 3"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦60,000</p>
            </div>
          </div>

          <div class="phone-product-card">
            <div class="phone-discount-tag">-20%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 1"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦50,000</p>
            </div>
          </div>

          <!-- Product Card 2 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-15%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 2"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦45,000</p>
            </div>
          </div>

          <!-- Product Card 3 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-10%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 3"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦60,000</p>
            </div>
          </div>
          <div class="phone-product-card">
            <div class="phone-discount-tag">-20%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 1"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦50,000</p>
            </div>
          </div>

          <!-- Product Card 2 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-15%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 2"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦45,000</p>
            </div>
          </div>

          <!-- Product Card 3 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-10%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 3"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦60,000</p>
            </div>
          </div>
          <div class="phone-product-card">
            <div class="phone-discount-tag">-20%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 1"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦50,000</p>
            </div>
          </div>

          <!-- Product Card 2 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-15%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 2"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦45,000</p>
            </div>
          </div>

          <!-- Product Card 3 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-10%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 3"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦60,000</p>
            </div>
          </div>

          <div class="phone-product-card">
            <div class="phone-discount-tag">-20%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 1"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦50,000</p>
            </div>
          </div>

          <!-- Product Card 2 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-15%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 2"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦45,000</p>
            </div>
          </div>

          <!-- Product Card 3 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-10%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 3"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦60,000</p>
            </div>
          </div>
          <div class="phone-product-card">
            <div class="phone-discount-tag">-20%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 1"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦50,000</p>
            </div>
          </div>

          <!-- Product Card 2 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-15%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 2"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦45,000</p>
            </div>
          </div>

          <!-- Product Card 3 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-10%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 3"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦60,000</p>
            </div>
          </div>
          <div class="phone-product-card">
            <div class="phone-discount-tag">-20%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 1"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦50,000</p>
            </div>
          </div>

          <!-- Product Card 2 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-15%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 2"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦45,000</p>
            </div>
          </div>

          <!-- Product Card 3 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-10%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 3"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦60,000</p>
            </div>
          </div>

          <div class="phone-product-card">
            <div class="phone-discount-tag">-20%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 1"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦50,000</p>
            </div>
          </div>

          <!-- Product Card 2 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-15%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 2"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦45,000</p>
            </div>
          </div>

          <!-- Product Card 3 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-10%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 3"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦60,000</p>
            </div>
          </div>
          <div class="phone-product-card">
            <div class="phone-discount-tag">-20%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 1"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦50,000</p>
            </div>
          </div>

          <!-- Product Card 2 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-15%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 2"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦45,000</p>
            </div>
          </div>

          <!-- Product Card 3 -->
          <div class="phone-product-card">
            <div class="phone-discount-tag">-10%</div>
            <img
              src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
              alt="Phone 3"
              class="phone-image"
            />
            <div class="phone-product-info">
              <h3 class="phone-product-name">Samsung Galaxy Z Fold 5</h3>
              <p class="phone-price">₦60,000</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Slider Controls -->
    
    </section>
    <script>
      // Select elements
      const phoneSliderTrack = document.querySelector(".phone-slider-track");
      const phonePrevButton = document.querySelector(".phone-prev");
      const phoneNextButton = document.querySelector(".phone-next");

      // Manual Slider Control
      let phoneSlideIndex = 0;

      // Function to move the slider to the next or previous slide
      function movePhoneSlider() {
        const totalPhoneSlides = document.querySelectorAll(
          ".phone-product-card"
        ).length;
        const phoneSlideWidth =
          document.querySelector(".phone-product-card").offsetWidth + 15; // width + margin
        phoneSliderTrack.style.transform = `translateX(-${
          phoneSlideIndex * phoneSlideWidth
        }px)`;
      }

      phoneNextButton.addEventListener("click", () => {
        const totalPhoneSlides = document.querySelectorAll(
          ".phone-product-card"
        ).length;
        phoneSlideIndex = (phoneSlideIndex + 1) % totalPhoneSlides;
        movePhoneSlider();
      });

      phonePrevButton.addEventListener("click", () => {
        const totalPhoneSlides = document.querySelectorAll(
          ".phone-product-card"
        ).length;
        phoneSlideIndex =
          (phoneSlideIndex - 1 + totalPhoneSlides) % totalPhoneSlides;
        movePhoneSlider();
      });

      // Automatic Slider
      let autoPhoneSlideInterval = setInterval(() => {
        const totalPhoneSlides = document.querySelectorAll(
          ".phone-product-card"
        ).length;
        phoneSlideIndex = (phoneSlideIndex + 1) % totalPhoneSlides;
        movePhoneSlider();
      }, 3000); // Change slide every 3 secondss
    </script>

    <div class="flash-sales">
      <div class="flash-sales-header">
        <h2>Flash Sales</h2>
        <div class="timer">
          <span id="hours">00</span>:<span id="minutes">00</span>:<span
            id="seconds"
            >00</span
          >
        </div>
        <a href="#" class="see-all">See All Deals</a>
      </div>
      <div class="flash-sales-products">
        <div class="product">
          <div class="discount-tag2">-50%</div>
          <img src="Free Shipping On Orders R3720+✓Get R44 Off On Your….jpg" alt="Product 1" />
          <p class="product-name">Huns Jacket</p>
          <p class="product-price">₦60,000</p>
        </div>
        <div class="product">
          <div class="discount-tag2">-40%</div>
          <img
            src="mostafa-mahmoudi-J4DnKxz_3sA-unsplash.jpg"
            alt="Product 2"
          />
          <p class="product-name">Mostafa Bad</p>
          <p class="product-price">₦20,000</p>
        </div>
        <div class="product">
          <div class="discount-tag2">-30%</div>
          <img
            src="amanz-hhniivY7iyw-unsplash-removebg-preview (1).png"
            alt="Product 3"
          />
          <p class="product-name">Redmi Note 12</p>
          <p class="product-price">₦250,000</p>
        </div>
        <div class="product">
          <div class="discount-tag2">-50%</div>
          <img src="b7c8c6bf-41be-4b94-9f4f-78baf9a14967.jpg" alt="Product 1" />
          <p class="product-name">Vintage Sirt</p>
          <p class="product-price">₦30,000</p>
        </div>
        <div class="product">
          <div class="discount-tag2">-40%</div>
          <img
            src="i+w x musgrave traditional pencil 12-pack.jpg"
            alt="Product 2"
          />
          <p class="product-name">IWX Pencil</p>
          <p class="product-price">₦160</p>
        </div>
        <div class="product">
          <div class="discount-tag2">-30%</div>
          <img
            src="Gucci GG Supreme Canvas Shoulder Bag - Uni.jpg"
            alt="Product 3"
          />
          <p class="product-name">Gucci Hand Bag</p>
          <p class="product-price">₦40,000</p>
        </div>
      </div>
    </div>
    <script>
      // Set the end time for the flash sales
      const endTime = new Date().getTime() + 6 * 60 * 60 * 1000; // 6 hours from now

      function updateTimer() {
        const now = new Date().getTime();
        const remainingTime = endTime - now;

        if (remainingTime <= 0) {
          document.getElementById("hours").textContent = "00";
          document.getElementById("minutes").textContent = "00";
          document.getElementById("seconds").textContent = "00";
          clearInterval(timerInterval);
          return;
        }

        const hours = Math.floor(remainingTime / (1000 * 60 * 60));
        const minutes = Math.floor(
          (remainingTime % (1000 * 60 * 60)) / (1000 * 60)
        );
        const seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

        document.getElementById("hours").textContent = hours
          .toString()
          .padStart(2, "0");
        document.getElementById("minutes").textContent = minutes
          .toString()
          .padStart(2, "0");
        document.getElementById("seconds").textContent = seconds
          .toString()
          .padStart(2, "0");
      }

      // Update the timer every second
      const timerInterval = setInterval(updateTimer, 1000);
      updateTimer();
    </script>
    <section class="mens-collection" id="mens-collection">
  <div class="mens-collection-content">
  <div class="mens-image">
      <img src="b1.jpg" alt="Men's Collection">
    </div>
    <div class="mens-text">
      <h2>Men's Collection</h2>
      <p>Explore the latest trends and timeless styles in our exclusive men's collection. From casual wear to formal attire, we have it all!</p>
      <button onclick="navigateToMenPage()" class="shop-now-btn">Shop Now</button>
    </div>
   
  </div>
</section>
<script>
  function navigateToMenPage() {
  window.location.href = "boys1.html";
}

</script>
    <section class="seasonal-offers">
      <div class="offers-header">
        <h2>Special Offers</h2>
        <p>Special Offers with exclusive discounts just for you!</p>
      </div>

      <div class="offers-container">
        <div class="offer-card">
          <div class="offer-image">
            <img
              src="mostafa-mahmoudi-J4DnKxz_3sA-unsplash.jpg"
              alt="Winter Sale"
            />
            <div class="discount-tag">50% OFF</div>
          </div>
          <div class="offer-details">
            <h3>Hand Bags</h3>
            <p class="price">From ₦20,000</p>
            <a href="#shop-now" class="shop-now-btn">Shop Now</a>
          </div>
        </div>

        <div class="offer-card">
          <div class="offer-image">
            <img
              src="93 Valentines Day Gifts For Him That Will Show How Much You Care!.jpeg"
              alt="Valentine Sale"
            />
            <div class="discount-tag">40% OFF</div>
          </div>
          <div class="offer-details">
            <h3>Valentine Gifts</h3>
            <p class="price">From ₦15,000</p>
            <a href="#shop-now" class="shop-now-btn">Shop Now</a>
          </div>
        </div>

        <div class="offer-card">
          <div class="offer-image">
            <img
              src="Marehaven Fashion Simple Small Square Bag Mini Nylon Zipper Leisure Messenger Bag Women Phone Storage Shoulder Bag Yellow.jpg"
              alt="Summer Sale"
            />
            <div class="discount-tag">30% OFF</div>
          </div>
          <div class="offer-details">
            <h3>School Bags</h3>
            <p class="price">From ₦5,000</p>
            <a href="#shop-now" class="shop-now-btn">Shop Now</a>
          </div>
        </div>
      </div>
    </section>
    <script>
      const seasonalOffers = [
        {
          image: "mostafa-mahmoudi-J4DnKxz_3sA-unsplash.jpg",
          title: "Hand Bags",
          discount: "50% OFF",
          price: "From ₦20,000",
          link: "#shop-now",
        },
        {
          image: "93 Valentines Day Gifts For Him That Will Show How Much You Care!.jpeg",
          title: "Valentine Gifts",
          discount: "40% OFF",
          price: "From ₦15,000",
          link: "#shop-now",
        },
        {
          image: "Marehaven Fashion Simple Small Square Bag Mini Nylon Zipper Leisure Messenger Bag Women Phone Storage Shoulder Bag Yellow.jpg",
          title: "School Bags",
          discount: "30% OFF",
          price: "From ₦5,000",
          link: "#shop-now",
        },
      ];

      function loadSeasonalOffers() {
        const container = document.querySelector(".offers-container");
        container.innerHTML = seasonalOffers
          .map(
            (offer) => `
  <div class="offer-card">
    <div class="offer-image">
      <img src="${offer.image}" alt="${offer.title}">
      <div class="discount-tag">${offer.discount}</div>
    </div>
    <div class="offer-details">
      <h3>${offer.title}</h3>
      <p class="price">${offer.price}</p>
      <a href="${offer.link}" class="shop-now-btn">Shop Now</a>
    </div>
  </div>
`
          )
          .join("");
      }

      // Initialize seasonal offers
      loadSeasonalOffers();
      ss;
    </script>

      
    </script>
  

    <section class="referral-program">
      <div class="referral-content">
        <h2>Earn Rewards with Referrals</h2>
        <p>
          Invite your friends and earn points for every successful referral!
          Share your unique link below.
        </p>

        <button id="generate-link">Get Referral Link</button>
        <div class="share-options" id="share-options">
          <p>Your Referral Link:</p>
          <input type="text" id="referral-link" readonly />
          <button onclick="copyLink()">Copy Link</button>
        </div>
      </div>
    </section>

    <script>
      document
        .getElementById("generate-link")
        .addEventListener("click", function () {
          const referralLink = "https://unishop.com/referral?code=ABC123";
          document.getElementById("referral-link").value = referralLink;
          document.getElementById("share-options").style.display = "block";
        });

      function copyLink() {
        const referralLink = document.getElementById("referral-link");
        referralLink.select();
        document.execCommand("copy");
        alert("Referral link copied to clipboard!");
      }

      // Example: Update progress bar dynamically
      const points = 50; // Replace with dynamic points value
      const progress = document.getElementById("progress");
      progress.style.width = `${points}%`; // Set width based on points
    </script>
   <section class="reviews">
    <h2>What Students Are Saying</h2>
    <div class="reviews-container" id="reviews-container">
        <!-- Example Reviews -->
        <div class="review">
            <p>"This shop has everything I need for school, and the prices are great!"</p>
            <h3>- Jeremiah</h3>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="review-form">
        <h3>Leave a Review</h3>
        <br>
        <br>
        <textarea id="review-text" placeholder="Write your review here"></textarea>
        <div class="star-rating">
            <span data-value="1">★</span>
            <span data-value="2">★</span>
            <span data-value="3">★</span>
            <span data-value="4">★</span>
            <span data-value="5">★</span>
        </div>
        <button id="submit-review">Submit Review</button>
    </div>
</section>
<script>
  // Handle star rating
const stars = document.querySelectorAll(".star-rating span");
let selectedRating = 0;

stars.forEach((star) => {
    star.addEventListener("click", function () {
        selectedRating = this.getAttribute("data-value");
        stars.forEach((s) => s.classList.remove("active"));
        this.classList.add("active");
        for (let i = 0; i < selectedRating; i++) {
            stars[i].classList.add("active");
        }
    });
});

// Handle review submission
document.getElementById("submit-review").addEventListener("click", function () {
    const reviewText = document.getElementById("review-text").value;
    const reviewsContainer = document.getElementById("reviews-container");

    if (reviewText && selectedRating > 0) {
        // Create a new review element
        const newReview = document.createElement("div");
        newReview.className = "review";
        newReview.innerHTML = `
            <p>"${reviewText}"</p>
            <h3>Rating: ${"★".repeat(selectedRating)} (${selectedRating}/5)</h3>
        `;
        reviewsContainer.appendChild(newReview);

        // Reset form
        document.getElementById("review-text").value = "";
        stars.forEach((s) => s.classList.remove("active"));
        selectedRating = 0;

        alert("Thank you for your review!");
    } else {
        alert("Please provide a review and rating!");
    }
});

</script>
<script>
  function addToCart(product) {
    // Get the current cart from local storage
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    // Check if the item already exists in the cart
    const existingItem = cart.find(
      (item) => item.productName === product.productName
    );
    if (existingItem) {
      // Increase quantity if it already exists
      existingItem.quantity += 1; // Increment the quantity
    } else {
      // Add new item with quantity 1 if it's a new product
      cart.push({
        ...product,
        quantity: 1,
      }); // New product starts with quantity 1
    }
    // Save updated cart to local storage
    localStorage.setItem("cart", JSON.stringify(cart));
    // Update the cart count display
    updateCartCount();
  }
  // Function to remove an item from the cart
  function removeFromCart(index) {
    cart.splice(index, 1); // Remove item from cart
    localStorage.setItem("cart", JSON.stringify(cart)); // Save updated cart
    renderCart(); // Re-render cart
    updateCartCount(); // Update the cart count display
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
<script>
  function addToCart(product) {
    // Get the current cart from local storage
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    // Check if the item already exists in the cart
    const existingItem = cart.find(
      (item) => item.productName === product.productName
    );
    if (existingItem) {
      // Increase quantity if it already exists
      existingItem.quantity += 1; // Increment the quantity
    } else {
      // Add new item with quantity 1 if it's a new product
      cart.push({
        ...product,
        quantity: 1,
      }); // New product starts with quantity 1
    }
    // Save updated cart to local storage
    localStorage.setItem("cart", JSON.stringify(cart));
    // Update the cart count display
    updateCartCount2();
  }
  // Function to remove an item from the cart
  function removeFromCart2(index) {
    cart.splice(index, 1); // Remove item from cart
    localStorage.setItem("cart", JSON.stringify(cart)); // Save updated cart
    renderCart2(); // Re-render cart
    updateCartCount2(); // Update the cart count display
  }

  function updateCartCount2() {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    const totalItems = cart.length; // Get the number of unique items
    const cartCountElement = document.getElementById("cart-count2");

    if (totalItems > 0) {
      cartCountElement.textContent = totalItems;
      cartCountElement.style.display = "inline"; // Show the count
    } else {
      cartCountElement.textContent = ""; // Clear the count
      cartCountElement.style.display = "none"; // Hide the count
    }
  }

  // Call updateCartCount initially to set the correct count on page load
  updateCartCount2();
  // Initialize AOS
  AOS.init2();
</script>

    <section class="aura-footer">

    <div class="footer-container">
    <!-- Logo and About Section -->
    <div class="footer-about">
      <img src="Gray_and_Black_Simple_Studio_Logo__2_-removebg-preview.png" alt="AURA Logo" class="footer-logo">
      
      <p>
        Discover the perfect blend of innovation and elegance with AURA. 
        We bring you premium products that redefine lifestyle and functionality.
      </p>
    </div>

    <!-- Quick Links -->
    <div class="footer-links">
      <h3>Quick Links</h3>
      <ul>
        <li><a href="#about-us">About Us</a></li>
        <li><a href="#shop">Shop</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#faqs">FAQs</a></li>
        <li><a href="#privacy-policy">Privacy Policy</a></li>
      </ul>
    </div>

    

    <!-- Social Media -->
    <div class="footer-social">
      <h3>Follow Us</h3>
      <p>Stay updated with the latest from AURA.</p>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
      </div>
    </div>
  </div>

  <!-- Bottom Section -->
  <div class="footer-bottom">
    <p>&copy; 2025 AURA. All Rights Reserved. | <a href="#terms">Terms of Service</a></p>
  </div>
    </section>
  

    <br />
    <br />
    <br />
   
  </body>
</html>
