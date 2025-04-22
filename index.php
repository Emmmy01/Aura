
<?php
session_start(); // Start session (Make sure this is at the top of your file)
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MR SEE CHICKEN FOOD</title>

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
    position: relative;
    padding: 10px;
    margin: 10px auto;
    display: block;
    border-radius: 20px;
    border: 1px solid lightgray;
}

.popular-food {
    display: flex;
    justify-content: space-between;
    padding: 10px;
    align-items: center;
    margin-top: -20px;
}

.categories {
    display: flex;
    gap: 10px;
    justify-content: center;
    padding: 10px;
}

.categories button {
    border: none;
    background: #fff;
    padding: 5px 15px;
    border-radius: 20px;
}

.discount-banner {
   
    color: white;
    padding: 9px;
    border-radius: 30px;
    margin: 8px;
    height: 110px;
}
.discount-banner h1{
    color: rgb(253, 251, 251);
    font-family: 15px;
    margin-top: -110px;
}
.food-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 5px;
    padding: 10px;
    margin-top: 20px;
}

.food-item {
    background: white;
    padding: 20px;
    margin: 5px;
    height: 170px;
    border-radius: 30px;
}

.food-item img {
    width: 100%;
    height: 120px;
    border-radius: 10px;
}

.rating {
    display: block;
    margin-top: 0px;
}
.sand img{
    margin-top: 15px;
    width: 90%;
    height: 100px;
}


.food-item h3{
    font-size: 13px;
    text-align: left;
    display: flex;
    justify-content: left;
}
.Menu{
    display: flex;
    justify-content: space-between;
    text-align: center;
    padding: 10px;
    margin: 10px;
    align-items: center;
    margin-top: -35px;
    
}
.top-bar h3{
    font-size: 13px;
}
.view-all{
    color: gray;
    text-decoration: none;
}
.food-item {
    background: white;
    padding: 15px;
    border-radius: 15px; /* Rounded corners */
    position: relative; /* For absolute positioning */
    display: flex;
    flex-direction: column;

    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Wishlist Icon */
.food-item .wishlist {
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 18px;
    border: none;
    background: none;
    cursor: pointer;
    
}

.love-icon.active {
    color: red;
}

/* Price and Rating */
.price-rating {
    display: flex;
    justify-content: space-between;
    width: 100%;
    margin-top: -18px;
    border-radius: 10px;
    padding: 0px;
}

.price-rating p {
    font-weight: bold;
    font-size: 12px;
}

.rating {
    display: flex;
    align-items: center;
    gap: 0px;
    font-size: 12px;
}
.food-categories {
    display: flex;
    gap: 10px;
    overflow-x: auto; /* Enables horizontal scrolling */
    white-space: nowrap;
    padding: 10px;
    scrollbar-width: none; /* Hide scrollbar for better design */
    -ms-overflow-style: none;
}

.food-categories::-webkit-scrollbar {
    display: none; /* Hide scrollbar in Webkit browsers */
}

.category {
    background: white;
    border: none;
    padding: 10px 15px;
    font-size: 13px;
    border-radius: 20px;
    cursor: pointer;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    flex: 0 0 auto; /* Prevents shrinking */
}

.category.active {
    background: #FFD700;
    color: black;
}
.discount-banner img{
    width: 100%;
    border-radius: 30px;
    height: 130px;
}
.love-icon {
    color: white;
    -webkit-text-stroke: 2px gray; /* Gray border */
    font-size: 15px;
    cursor: pointer;
    transition: all 0.3s ease;
}
.love-icon.active {
    color: red;
    -webkit-text-stroke: 0px; /* Remove border when active */
}
.wishlist.active{
    color: red;
    -webkit-text-stroke: 0px; /* Remove border when active */
}
.discount-banner h1{
    color: rgb(6, 6, 6);
    -webkit-text-stroke: 1px rgb(252, 252, 249); /* Gray border */
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




sushi stylying

.food-item {
    background: #fff;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
    text-align: center;
}

.food-item img {
    width: 100%;
    border-radius: 10px;
}

.order-btn {
    color: rgb(6, 6, 6);
    -webkit-text-stroke: 0.4px rgb(239, 239, 232); /* Gray border */
 
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    border-radius: 5px;
}
.order-btn:hover {
    color: rgb(13, 13, 13);
    background: #f7f7f5;
 
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    border-radius: 5px;
}
.sushiname{
    font-size: 17px;
    color: rgb(6, 6, 6);
    -webkit-text-stroke:0.5px rgb(252, 252, 249); /* Gray border */
}
.back-button{
    text-decoration: none;
    color: rgb(6, 6, 6);
    -webkit-text-stroke: 0.4px rgb(252, 252, 249); /* Gray border */
 
}
.top-header{
    margin-top: 4px;
}

.food-item2 {
    background: white;
    padding: 20px;
    margin: 5px;
    height: 210px;
    border-radius: 30px;
}




.food-item2 img {
    width: 100%;
    height: 120px;
    border-radius: 10px;
}



.food-item2 h3{
    font-size: 13px;
    text-align: left;
    display: flex;
    justify-content: left;
}

.food-item2 {
    background: white;
    padding: 15px;
    border-radius: 15px; /* Rounded corners */
    position: relative; /* For absolute positioning */
    display: flex;
    flex-direction: column;

    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Wishlist Icon */

.food-item2 .wishlist {
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 18px;
    border: none;
    background: none;
    cursor: pointer;
    
}





/* General Section Styles */
.why-choose-us, .featured-menu {
    text-align: center;
    padding: 20px 10px;
}

/* Why Choose Us */
.features {
    display: block;
    justify-content: center;
    gap: 40px;
    margin-top: 20px;
}
.featured-menu h2{
   
    display: inline-block; 
   
    padding-bottom: 5px;
    border-bottom: 3px  solid #FFD700;
}
.why-choose-us h2{
    display: inline-block; 
 
    padding-bottom: 5px;
    border-bottom: 3px  solid #FFD700;
}

.feature {
    background: none;
    padding: 20px;
    border-radius: 10px;
   
    transition: transform 0.3s ease-in-out;
    margin-top: 10px;
    height: 150px;

}

.feature i {
    font-size: 30px;
    color: #FFD700;
}

.feature:hover {
    transform: translateY(-5px);
}

/* Featured Menu */
.menu-container {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
    margin-top: 20px;
}

.menu-item {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease-in-out;
    width: 220px;
}

.menu-item img {
    width: 100%;
    border-radius: 10px;
}
.in{
    background: #FFD700;
}
.menu-item h3 {
    margin: 10px 0;
    text-align: left;
}
.menu-item p {
    margin: 10px 0;
    text-align: left;
}

.price {
    font-weight: bold;
    color: #070707;
    margin-top: 9px;
    
    
}
.price_cart{
    display: flex;
    justify-content: space-between;
}

.add-to-cart {
 
    background: #FFD700;
    padding: 10px;
    border: none;
    border-radius: 17px;
    cursor: pointer;
}
.out{
    background: #f5f5f5;
}

.add-to-cart:hover {
    background: #e68a00;
}

/* Fade-in Animation */
.fade-in {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}
.restaurant-gallery {
    position: relative;
    width: 95%;
    max-width: 900px;
    height: 300px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    margin: 8px;
    
}

.gallery-images {
    display: flex;
    width: 100%;
    height: 100%;
}

.gallery-images img {
    width: 33.3%;
    object-fit: cover;
    transition: 0.5s ease-in-out;
}

.gallery-overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(0, 0, 0, 0.5);
    color: rgb(249, 246, 246);
    padding: 15px 25px;
    text-align: center;
    width: 300px;
    border-radius: 5px;
}
.gallery-overlay p{
    color: rgb(250, 247, 247);
    -webkit-text-stroke: 0px rgb(252, 252, 249); /* Gray border */
}

.gallery-overlay h2 {
    font-size: 24px;
    margin-bottom: 5px;
}

.gallery-overlay p {
    font-size: 16px;
}

/* Hover effect */
.restaurant-gallery:hover .gallery-images img {
    filter: brightness(70%);
}
.menu-section2 {
    text-align: center;
    padding: 30px;
}

.menu-tabs2 {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 20px;
}

.menu-btn2 {
    
    color: rgb(12, 12, 12);
    border: none;
    padding: 10px 20px;
    font-size: 14px;
    cursor: pointer;
    background: none;
    transition: 0.3s;
    white-space: nowrap;
    margin: -6px;
}

.menu-btn2:hover, .menu-btn2.active {
    border-bottom: 2px solid #FFD700;
    background: none;
}

.menu-content2 {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
    justify-content: center;
}

.food-item2 h3{
    text-align: center;
    display: flex;
    margin-left: 10px;
    font-size: 13px;
}
.food-item2 {
    background: #fff;
    padding: 0px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    position: relative;
    width: 150px;
    height: 200px;
    
}

.food-item2 img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 8px;
    margin-left: 16px;
}


.food-info2 {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: -10px;
padding: 10px;
}

.price2 {
    font-weight: bold;
    color: #0b0b0b;
    font-size: 14px;
}



.add-btn2 {
    background: #fefefe;
    color: rgb(11, 11, 11);
    border: none;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
}

.see-more2 {
    margin-top: 20px;
    background: #007bff;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
}

@media (max-width: 768px) {
    .menu-content2 {
        grid-template-columns: repeat(2, 1fr);
    }
}
/* Swallow Food Section */
.swallow-section {
    text-align: center;
    padding: 50px 20px;
    background-color: #fdfbf8;

}

.section-title {
    display: inline-block; 
 
    padding-bottom: 5px;
    border-bottom: 3px  solid #FFD700;
    color: #080808;
    font-weight: bold;
    margin-bottom: 20px;
    text-transform: uppercase;
    margin-bottom: 120px;
}

.swallow-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px));
    gap: 20px;
    max-width: 900px; /* Adjust the width as needed */
    margin: auto;
  
    justify-content: center; /* Center the grid items */
    align-items: center; /* Align vertically */
}

.swallow-card {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease-in-out;
    width: 220px;
}

.swallow-card:hover {
    transform: translateY(-10px);
}

.swallow-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
     margin-top: -100px;
  
}

.swallow-info {
    padding: 15px;
    text-align: left;
}

.swallow-info h3 {
    font-size: 1.4rem;
    color: #333;
    margin-bottom: 5px;
}

.swallow-info p {
    font-size: 0.9rem;
    color: #777;
    margin-bottom: 10px;
}

.price-rating3 {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.9rem;
    margin-bottom: 10px;
    margin-top: 10px;
}

.price3 {
    font-weight: bold;
    color: #0c0c0c;
    font-size: 17px;
}

.rating2 {
    color: #f1c40f;
}

.add-btn3 {
    width: 40px;
    height: 40px;
    border: none;
    background-color: #f1c40f;
    color: rgb(1, 1, 1);
    font-size: 1.2rem;
    border-radius: 50%;
    cursor: pointer;
    transition: 0.3s;
}

.add-btn3:hover {
    background-color: #e67e22;
}
.catering-section {
    background: #f9f9f8; /* Light background */
    padding: 50px 10%;
    text-align: center;
}

.catering-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 30px;
}

.catering-text {
    flex: 1;
    text-align: left;
}

.catering-text h2 {
    font-size: 2rem;
    
    color: #080808;
}

.catering-text p {
    font-size: 1.1rem;
    color: #444;
    line-height: 1.6;
}

.catering-text ul {
    list-style: none;
    padding: 0;
}

.catering-text ul li {
    font-size: 1rem;
    margin: 8px 0;
    color: #222;
}

.cta-button {
    display: inline-block;
    padding: 12px 20px;
    background: #FFD700;
    color: rgb(2, 2, 2);
    border-radius: 5px;
    text-decoration: none;
    margin-top: 15px;
    font-weight: bold;
}

.cta-button:hover {
    background: #a99108;
}

.catering-image img {
    width: 450px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
}
.catering-image{
    border-bottom: 3px  solid #FFD700;
}

/* Responsive Design */
@media (max-width: 768px) {
    .catering-container {
        flex-direction: column;
        text-align: center;
    }

    .catering-text {
        text-align: center;
    }

    .catering-image img {
        width: 100%;
    }
}
.food-icons {
    display: flex;
    gap: 15px;
    margin: 20px 0;
    font-size: 2rem;
    color: #FFD700;
    overflow: hidden;
    white-space: nowrap;
    width: 100%;
}

/* Sliding Animation */
.food-icons i {
    animation: slideIcons 6s linear infinite;
    position: relative;
}

/* Keyframes for Sliding Effect */
@keyframes slideIcons {
    0% { transform: translateX(-100px); opacity: 0; }
    50% { transform: translateX(0); opacity: 1; }
    100% { transform: translateX(100px); opacity: 0; }
}

/* Hover Effect */
.food-icons i:hover {
    color: #FFD700;
    transform: scale(1.2);
    transition: 0.3s ease-in-out;
}
.catering-section {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 1s ease-out, transform 1s ease-out;
}

.catering-section.show {
    opacity: 1;
    transform: translateY(0);
}
.ordering-process {
    text-align: center;
    padding: 50px 20px;
    background-color: #fdfbf8;; /* Light background */
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    max-width: 900px;
    margin: auto;
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 1s ease-out, transform 1s ease-out;
}

.ordering-process.show {
    opacity: 1;
    transform: translateY(0);
}
.ordering-process h2{
    border-bottom: 3px  solid #FFD700;
    display: inline-block; 
}

.steps {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 20px;
}

.step {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    flex: 1;
    min-width: 250px;
    max-width: 280px;
    text-align: center;
    transition: transform 0.3s ease-in-out;
    border-bottom: 3px  solid #FFD700;
}

.step:hover {
    transform: scale(1.05);
}

.icon {
    font-size: 50px;
    display: block;
    margin-bottom: 10px;
}
/* Testimonial Section */
.testimonial-section {
    display: flex;
    justify-content: center;
    padding: 50px 20px;
    background: #f8f8f8;
}

.testimonial-container {
    display: flex;
    align-items: center;
    max-width: 900px;
    gap: 20px;
}

.testimonial-img {
    width: 200px;
    border-radius: 50%;
}

.testimonial-text {
    background: white;
    padding: 20px;
    border-radius: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    position: relative;
}

.testimonial-text::before {
    content: "";
    position: absolute;
    left: -20px;
    top: 50%;
    width: 40px;
    height: 40px;
    background: white;
    clip-path: polygon(100% 0, 0 50%, 100% 100%);
}

.testimonial-author {
    display: flex;
    align-items: center;
    margin-top: 10px;
}

.testimonial-author img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}

/* Newsletter Section */
.newsletter-section {
    background: #020202;
    padding: 40px 20px;
    color: white;
    text-align: center;
}

.newsletter-container {
    max-width: 700px;
    margin: auto;
}


.newsletter-text h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

.newsletter-form {
    display: flex;
    gap: 10px;
    justify-content: center;
    margin-top: 20px;
}

.newsletter-form input {
    padding: 10px;
    width: 60%;
    border: none;
    border-radius: 5px;
    outline: none;
}

.newsletter-form button {
    padding: 10px 20px;
    background: #FFD700;
    border: none;
    color: rgb(2, 2, 2);
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
}

.newsletter-form button:hover {
    background: #FFD700;
}

/* Responsive Design */
@media (max-width: 768px) {
    .testimonial-container {
        flex-direction: column;
        text-align: center;
    }
    .testimonial-text::before {
        display: none;
    }
    .newsletter-form {
        flex-direction: column;
    }
    .newsletter-form input {
        width: 94%;
    }
}
.about-section {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 50px;
    background-color: #fdfbf8;
}
.about-container {
    display: flex;
    align-items: center;
    max-width: 1000px;
}
.about-image {
    position: relative;
    width: 50%;
}
.about-image img {
    width: 100%;
    border-radius: 10px;
    position: relative;
    z-index: 2;
}
.about-image .bg-shape {
    position: absolute;
    top: 10%;
    left: 0;
    width: 80%;
    height: 80%;
    background-color: #FFD700;
    border-radius: 50% 30% 60% 40%;
    z-index: 1;
}
.about-text {
    width: 50%;
    padding-left: 40px;
}
.about-text h2 {
    font-size: 28px;
    font-weight: bold;
}
.about-text h2 span {
    color: #FFD700;
}
.about-text p {
    font-size: 16px;
    color: #666;
    line-height: 1.6;
}
.about-text .btn {
    display: inline-block;
    margin-top: 15px;
    padding: 10px 20px;
    border: 2px solid #FFD700;
    color: #090909;
    background-color: #FFD700;
    text-decoration: none;
    border-radius: 20px;
    font-weight: bold;
    transition: 0.3s;
}
.about-text .btn:hover {
    background-color: #FFD700;
    color: #121111;
}
@media (max-width: 768px) {
    .about-container {
        flex-direction: column;
        text-align: center;
    }
    .about-image, .about-text {
        width: 100%;
    }
    .about-text {
        padding-left: 0;
        margin-top: 20px;
    }
}
.blog-grid {
    display: flex;
    justify-content: space-between;
    gap: 20px;
}
.blog-card {
    flex: 1;
    background: none;
    padding: 20px;
    text-align: center;
    border-radius: 10000000px;
   
    position: relative;
    border-bottom: 2px  solid #FFD700;
    height: 280px;
}
.container h2{
    border-bottom: 3px  solid #FFD700;
    display: inline-block; 
 
    padding-bottom: 5px;
    border-bottom: 3px  solid #FFD700;
}
.blog-image {
    position: relative;
    text-align: center;
    color: white;
    border-radius: 1000px;
}
.blog-image img {
    width: 100%;
    height: 280px;
    border-radius: 10px;
    display: block;
}
.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    border-radius: 10px;
    border-radius: 1000px;
}
.blog-image h3 {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 20px;
    font-weight: bold;
    z-index: 2;
}
a{
    text-decoration: none;
    color: #020202;
}
.divider {
    margin-top: 40px;
    border: 1px solid #050404;
}
.site-footer {
    background:rgb(229, 229, 226);
    color: rgb(7, 7, 7);
    text-align: center;
    padding: 50px 0;
  
}
.site-footer .container {
    max-width: 2200px;
    margin: auto;
}
.footer-top h2 {
    font-size: 24px;
    font-weight: bold;
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
    color: orange;
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

.cart-notification {
    position: fixed;
    bottom: 400px;
    right:40px;
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 15px 20px;
    border-radius: 5px;
    display: none;
    animation: fadeInOut 3s ease-in-out;
    z-index: 9999;
}

@keyframes fadeInOut {
    0% { opacity: 0; transform: translateY(20px); }
    20% { opacity: 1; transform: translateY(0); }
    80% { opacity: 1; }
    100% { opacity: 0; transform: translateY(20px); }
}

.cart-count-badge {
    position: absolute;
    top: 0;
    right: 0;
    background: red;
    color: white;
    font-size: 10px;
    font-weight: bold;
    width: 18px;
    height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    
    transform: translate(50%, -50%); /* Center on top-right */
}
.cart-icon-container {
    position: relative; /* Ensures the badge positions correctly */
    display: inline-block; /* Keeps it inline */
}
.wishlist-icon-container {
    position: relative; /* Ensures the badge positions correctly */
    display: inline-block; /* Keeps it inline */
}

.love-icon.active {
    color: red;
    -webkit-text-stroke: 2px rgb(248, 5, 5); /* Gray border */
}
#wishlist-count {
    position: absolute;
    top: 0;
    right: 6px;
    background: red;
    color: white;
    font-size: 10px;
    font-weight: bold;
    width: 18px;
    height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    
    transform: translate(50%, -50%); /* Center on top-right */
}
.cart2{
    display: none;
}
.container2{
    display: none;
}
.food-slider5{
    display: none;
}

.auth-buttons2 button {
        background: #FFD700;
        border: none;

        padding: 10px 15px;
        margin-left: 10px;
        cursor: pointer;
        font-weight: bold;
        border-radius: 50px;
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15); /* Stronger shadow */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .auth-buttons{
        display: none;
    }


@media (max-width: 768px) {
    .blog-grid {
        flex-direction: column;
    }
}
@media (min-width: 788px) {
    footer{
        display: none;
    }
    .promo-slider{
        display:none;
    }
    footer i {
       display: none;
      }
      .discount-banner {
   
    color: white;
    padding: 9px;
    border-radius: 30px;
    margin: 8px;
    height: 310px;
}
.discount-banner img{
    height: 350px;
    margin-top: -30px;
}
.popular-food{
    margin-top: -40px;
    display: flex;
    justify-content: center;
}
.Menu{
    margin-top: -50px;
}
.discount-banner h1{
    margin-top: -300px;
    font-size: 80px;
}
.auth-buttons{
        display: inline;
    }

.food-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: -10px;
    padding: 10px;
    top:100px;
    
}
.food-item {
    margin-top:190px;
    
    background: white;
    padding: 20px;
    margin: 5px;
    height: 260px;
    width: 80%;
    border-radius: 30px;
    z-index: 999;
}
.food-item img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    display: flex;
    justify-content:center;
}
.restaurant-gallery {
    position: relative;
    width: 100%;
    max-width: 99%;
    height: 500px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    margin: 8px;
    
}
.gallery-images {
    display: flex;
    width: 100%;
    height: 100%;
}

.gallery-images img {
    width: 80%;
    height: 500px;
    object-fit: cover;
    transition: 0.5s ease-in-out;
}
.gallery-overlay p{
    color: rgb(250, 247, 247);
    -webkit-text-stroke: 0px rgb(252, 252, 249); /* Gray border */
}

.gallery-overlay h2 {
    font-size: 44px;
    margin-bottom: 5px;
    white-space: nowrap;
}
.search-bar{
    display: none;
}

.gallery-overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(0, 0, 0, 0.5);
    color: rgb(249, 246, 246);
    padding: 15px 25px;
    text-align: center;
    width: 100%;
    border-radius: 5px;
}
.features{
    display: flex;
}
.menu-btn2{
    font-size: 22px;
}
.food-item2 {
    background: #fff;
    padding: 0px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    position: relative;
    width: 250px;
    height: 300px;
    display: flex;
    justify-content: space-between;
    
}
.food-item2 img {
    width: 190px;
    height: 190px;
    object-fit: cover;
    border-radius: 8px;
    margin-left: 28px;
}
.site-footer {
    background:rgb(229, 229, 226);
    color: rgb(7, 7, 7);
    text-align: center;
    padding: 50px 0;
}
.site-footer .container {
    max-width: 2200px;
    margin: auto;
}
.newsletter {
            display: flex;
            align-items: center;
            background: #222;
            border-radius: 30px;
            overflow: hidden;
            padding: 14px;
        }

        .newsletter input {
            flex: 1;
            padding: 22px;
            border: none;
            outline: none;
            background: transparent;
            color: white;
        }

        .newsletter button {
            background: #444;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 50%;
            width: 40px;
            height:40px;
            transition: 0.3s;
        }
.footer-top h2 {
    font-size: 24px;
    font-weight: bold;
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
    color: orange;
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

.food-item2 h3{
    text-align: center;
    display: flex;
    margin-left: 10px;
    font-size: 12px;
}
.food-info2 {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: -10px;
padding: 10px;
font-size: 19px;
}
.swallow-container{
    display: flex;
    background-color: #fdfbf8;
}
.swallow-card {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease-in-out;
    width: 320px;
}
.swallow-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
     margin-top: -100px;
  
}
.steps {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 20px;
}
.ordering-process {
    text-align: center;
    padding: 50px 20px;
    background: #fff7e6; /* Light background */
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    max-width: 1500px;
    margin: auto;
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 1s ease-out, transform 1s ease-out;
}

/* Wishlist Icon */
.food-item .wishlist {
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 12px;
    border: none;
    background: none;
    cursor: pointer;
    
}
.food-item h3{
    font-size: 14px;
}

.love-icon.active {
    color: red;
}

/* Price and Rating */
.price-rating {
    display: flex;
    justify-content: space-between;
    width: 100%;
    margin-top: -18px;
    border-radius: 10px;
    padding: 0px;
}

.price-rating p {
    font-weight: bold;
    font-size: 13px;
}
.price-rating span {
    font-weight: bold;
    font-size: 89px;
}
.rating {
    display: flex;
    align-items: center;
    gap: 0px;
  
}
.discount-banner{
    display: none;
}
.top-bar{
    display: none;
}
header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 50px;
        background: white;
    }

    .logo {
        font-size: 24px;
        font-weight: bold;
    }

    .logo span {
        color: red;
    }

    nav ul {
        display: flex;
        list-style: none;
    }

    nav ul li {
        margin: 0 15px;
    }

    nav ul li a {
        text-decoration: none;
        color: black;
        font-weight: bold;
    }

    .cart2 {
        position: relative;
        display: inline;
    }

    .cart2 img {
        width: 30px;
    }

    .cart-count {
        position: absolute;
        top: -8px;
        right: -12px;
        background: red;
        color: white;
        font-size: 10px;
        padding: 3px 6px;
        border-radius: 60%;
    }

    .auth-buttons button {
        background: #FFD700;
        border: none;
        padding: 10px 15px;
        margin-left: 10px;
        cursor: pointer;
        font-weight: bold;
        z-index: 99999;
        border-radius: 50px;
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15); /* Stronger shadow */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .auth-buttons{
        z-index: 999;
    }
    .cart2{
    z-index: 999;
    display: inline;
}
.cart2 {
    display: flex;
    align-items: center;
    cursor: pointer;
}
.cart2 i {
    pointer-events: none; /* Allows the div itself to handle clicks */
}

    /* Main Section */
    .container2 {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 80px 50px;
        position: relative;
        margin-top: -50px;
    }

    /* Left Side */
    .order-details2 {
        width: 50%;
        margin-top: -150px;
        text-align: left;
    }

    .order-details2 h1 {
        font-size: 50px;
        margin-bottom: 10px;
    }

    .order-details2 span {
        color: #FFD700;
    }

    .total-price {
        font-size: 24px;
        margin: 20px 0;
    }

    .total-price span {
        font-weight: bold;
    }

    .quantity {
        display: flex;
        align-items: center;
    }
    .food-item span{
        font-size: 10px;
    }
    .first{
        background: #fff;
        color: #FFD700;
    }

    .quantity button {
        background: rgb(6, 6, 6);
        border: none;
        color: white;
        padding: 10px;
        font-size: 18px;
        cursor: pointer;
        font-weight: bold;
        border-radius: 8px;
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15); /* Stronger shadow */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .quantity input {
        width: 50px;
        text-align: center;
        font-size: 18px;
        border: none;
    }

    .buy-now {
        background: black;
        color: white;
        padding: 15px 30px;
        margin-top: 20px;
        cursor: pointer;
        border: none;
        font-size: 16px;
        border-radius: 50px;
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15); /* Stronger shadow */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
body{
    overflow-x: hidden;
}
    /* Right Side */
    .food-display {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .food-display img {
        width: 450px;
        border-radius: 50%;
        position: relative;
        z-index: 2;
    }

    /* Circle Background */
    .food-bg {
        position: absolute;
        right: -320px;
        top: -50px;
        width: 600px;
        height:680px;
        background: #FFD700;
        border-radius: 50%;
        z-index: 1;
    }

    .food-info {
        display: none;
        position: absolute;
        bottom: -30px;
        background: #FFD700;
        padding: 12px;
        border-radius: 10px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Food Slider */
    .food-slider5 {
        display: flex;
        align-items: left;
        justify-content: left;
        margin-top: -220px; /* Bringing it up */
        padding: 30px 40px;
        border-radius: 100px;
    }
    .catering-image img{
    width: 100%;
    height:450px;
   
    
}

    .food-item5 {
        text-align: center;
        margin: 0 10px;
        background: #FFD700;
        padding: 10px;
        height: 80px;
        border-radius: 55px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15); /* Stronger shadow */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .food-item5 p{
        font-size: 15px;
        margin-top: -6px;
    }

    .food-item5 img {
        width: 70px;
        border-radius: 50%;
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15); /* Stronger shadow */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .prev, .next {
        background: none;
        border: none;
        padding: 10px;
        cursor: pointer;
        font-size: 18px;
        font-weight: bold;
        border-radius: 50%;
    }
    .first{
        background: #fff;
        color: #FFD700;
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15); /* Stronger shadow */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
   
.container2{

    height: 100%;
}
.food-display{
    top: -52px;
}
.food-display img{
    top:60px;
}
.Menu{
    display: none;
}
.popular-food{
    display: none;
}
.food-grid{
    margin-top: 50px;
}
.Menu2{
    display: flex;
    justify-content: space-between;
    margin-top: 140px;
    padding: 20px;
}
.Menu2 h2{
    font-size: 33px;
}
.Menu2 a{
    font-size: 20px;
}
/* Fix Navigation Links */
nav {
    position: relative;
    z-index: 3; /* Ensures links are clickable */
}

/* Fix Button Clickability */
button, .buy-now {
    position: relative;
    z-index: 3;
}

/* Fix Food Display Background Blocking Clicks */
.food-bg {
    pointer-events: none; /* Prevents blocking clicks */
}
.food-display {
    position: relative;
    width: 450px;
    height: 450px;
}

.food-display img {
    width: 100%;
    position: absolute;
    border-radius: 50%;
    opacity: 0;
    transition: opacity 1s ease-in-out;
}

.food-display img.active {
    opacity: 1;
}
.price-rating3{
    white-space: nowrap;
    gap: 12px;
}









}

.unknow{
    display: none;
}
.Menu2{
    display: none;
}
.food-item img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    display: flex;
    justify-content:center;
}
.food-item{
    height: auto;
}





.search-form {
    display: flex;
    align-items: center;
    width: 90%;
    max-width: 400px;
    margin: auto;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 50px;
    margin-top:20px;
  
}
.search-form input::placeholder {
    color: #aaa;            /* Change the color */
    font-style: italic;     /* Make it italic */
    font-size: 15px;        /* Adjust font size */
    opacity: 1;             /* Make sure it’s fully visible */
   
}

.search-form input {
    flex: 1;
    width: 300px;
    padding: 7px;
    height: 10px;
    border: none;
    border-radius: 50px;
    font-size: 16px;
    outline: none;
    background: transparent;
}

.search-form button {
    background: none;
    border: none;
    color: rgb(8, 8, 8);
    font-size: 18px;
    padding: 8px 12px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

.cart2 i{
    font-size:25px;
}
.site-footer {
    display: inline-block;
            background: #fff;
           z-index: 1;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 30px;
            position: relative;
            
        }

        /* Vertical separator lines with fade effect */
        .site-footer .separator {
            width: 1px;
            background: linear-gradient(to bottom, transparent, #666, transparent);
            height: 100%;
            min-height: 120px;
        }

        .footer-left {
            flex: 1;
            min-width: 280px;
        }

        .logo-placeholder {
            width: 150px;
            height: 40px;
            background: #222;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            font-size: 14px;
            color: #aaa;
            margin-bottom: 10px;
        }

        .footer-left p {
            font-size: 16px;
            color: #aaa;
            margin-bottom: 15px;
        }

        .newsletter {
            display: flex;
            align-items: center;
            background: #222;
            border-radius: 30px;
            overflow: hidden;
            padding: 5px;
        }

        .newsletter input {
            flex: 1;
            padding: 12px;
            border: none;
            outline: none;
            background: transparent;
            color: white;
        }

        .newsletter button {
            background: #444;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 50%;
            width: 40px;
            height:40px;
            transition: 0.3s;
        }

        .newsletter button:hover {
            background: #666;
        }

        .footer-links2 {
            display: flex;
            justify-content: space-between;
            flex: 2;
            min-width: 280px;
            padding-top: 30px;
        }

        .footer-links2 div {
            min-width: 150px;
        }

        .footer-links2 ul {
            list-style: none;
            padding: 0;
        }

        .footer-links2 ul li {
            margin-bottom: 8px;
        }

        .footer-links2 ul li a {
            color: #aaa;
            font-size:16px;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links2 ul li a:hover {
            color: #fff;
        }

        .footer-socials2 {
            display: flex;
            flex-direction: column;
            gap: 10px;
            
            margin: 30px;
            
        }

        .footer-socials2 a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: #222;
            border-radius: 50%;
            text-decoration: none;
            transition: 0.3s;
        }

        .footer-socials2 a i {
            font-size: 18px;
            color: white;
        }

        .footer-socials2 a:hover {
            background: #555;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .site-footer {
                flex-direction: column;
                text-align: center;
                align-items: center;
                white-space: wrap;
                
            }
            .site-footer .separator {
                display: none; /* Hide separators on small screens */
            }
            .footer-left,
            .footer-links2 {
                text-align: center;
            }
            .footer-links2 {
                flex-direction: column;
                align-items: center;
            
            }
            .footer-socials2 {
                flex-direction: row;
                justify-content: center;
                gap: 15px;
            }
        }
        .fa-arrow-right{
            font-size:12px;
        }

.promo-banner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #121212; /* Dark background */
    color: white;
   
    border-radius: 10px;
    max-width: 600px; /* Adjust width */
    width: 100%; /* Responsive width */
    position: relative;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Add depth */      
    padding: 15px;
    margin: 5px 6px;  
    height: 150px;
}

.promo-text {
    flex: 1;
    text-align:left;
}


.promo-text h2 {
    font-size: 2rem;
    margin: -18px 0;
    color: yellow;
}

.order-btn {
    background: white;
    color: black;
    padding: 8px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
}

.promo-image {
    width: 130px;
    height: auto;
    border-radius: 50%;
    
}

.promo-image2 {
    width: 130px;
    height: auto;
    border-radius: 50%;
    box-shadow: 0px 4px 10px rgba(253, 249, 249, 0.2); /* Add depth */
    
}
/* Promo Slider */
.promo-slider {
    width: 100%;
    max-width: 700px;
    overflow: hidden;
    position: relative;
    border-radius: 10px;
}

/* Container for Sliding */
.promo-container {
    display: flex;
    width: 300%; /* 3 slides */
    transition: transform 0.5s ease-in-out;
}
/* Dots Indicator */
.dots {
    text-align: center;
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
}

.dot {
    height: 10px;
    width: 10px;
    margin: 5px;
    background-color: white;
    border-radius: 50%;
    display: inline-block;
    cursor: pointer;
    opacity: 0.5;
}

.dot.active {
    opacity: 1;
    background-color: yellow;
}

@media (min-width: 788px) {


    .site-footer {
            background: #fff;
           z-index: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 0px;
            
            position: relative;
            margin-top:-20px;
            padding: 40px;
        }

        /* Vertical separator lines with fade effect */
        .site-footer .separator {
            width: 3px;
            background: linear-gradient(to bottom, transparent, #666, transparent);
            height: 190%;
            height: 270px;
        }
   .separator2{
    width: 4px;
            background: linear-gradient(to bottom, transparent, #666, transparent);
            height: 190%;
            height: 270px;
            margin-right:150px;
   }
        .footer-left {
            flex: 1;
            min-width: 280px;
        }

        .logo-placeholder {
            width: 150px;
            height: 40px;
            background: #222;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            font-size: 14px;
            color: #aaa;
            margin-bottom: 10px;
        }

        .footer-left p {
            font-size: 16px;
            color: #aaa;
            margin-bottom: 15px;
        }

        .newsletter {
            display: flex;
            align-items: center;
            background: #222;
            border-radius: 30px;
            overflow: hidden;
            padding: 5px;
        }

        .newsletter input {
            flex: 1;
            padding: 12px;
            border: none;
            outline: none;
            background: transparent;
            color: white;
            
        }

        .newsletter button {
            background: #444;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 50%;
            width: 40px;
            height:40px;
            transition: 0.3s;
        }

        .newsletter button:hover {
            background: #666;
        }

        .footer-links2 {
            display: flex;
            justify-content: center;
        
            min-width: 280px;
            padding-top: 30px;
        }

        .footer-links2 div {
            min-width: 150px;
        }

        .footer-links2 ul {
            list-style: none;
            padding: 10px;

        }

        .footer-links2 ul li {
            margin-bottom: 8px;
        }

        .footer-links2 ul li a {
            color: #aaa;
            font-size:16px;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links2 ul li a:hover {
            color: #fff;
        }

        .footer-socials2 {
            display: block;
       text-align:left;
          margin-top:-19px;
          margin-left: 30px;
          
        }

        .footer-socials2 a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            background: #222;
            border-radius: 50%;
            margin: 10px;
            
            text-decoration: none;
            transition: 0.3s;
        }

        .footer-socials2 a i {
            font-size: 18px;
            color: white;
        }

        .footer-socials2 a:hover {
            background: #555;
        }




        .cart3 {
            position: fixed;
            top: 295px;
            right: 20px;
            background: #333;
            color: white;
            padding: 10px 15px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 20px;
            z-index: 999;
        }
        .cart3 i {
            font-size: 24px;
        }
        .cart-count-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: red;
            color: white;
            font-size: 14px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Sidebar Styling */
        .cart-sidebar {
            position: fixed;
            top: 0;
            right: -400px; /* Hidden by default */
            width: 350px;
            height: 100%;
            background: white;
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.2);
            transition: right 0.4s ease-in-out;
            padding: 20px;
            overflow-y: auto;
            border-radius:30px;
            z-index: 1000;
        }
        .cart-sidebar.open {
            right: -18px; /* Slide in */
        }
        .cart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }
        .cart-header h2 {
            font-size: 20px;
        }
        .close-cart {
            font-size: 24px;
            cursor: pointer;
            color: black;
        }
        .cart-items {
            margin-top: 20px;
        }
        .cart-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }
        .cart-item img {
            width: 50px;
            height: 50px;
            margin-right: 15px;
            border-radius: 10px;
        }
        .cart-item .details {
            flex-grow: 1;
        }
        .cart-item .details p {
            margin: 0;
        }
        .cart-item .remove {
            cursor: pointer;
            color: white;
            font-size: 18px;
        }
        .cart-footer {
            margin-top: 20px;
            text-align: center;
        }
        .checkout-btn {
            background: #FFD700;
            color: #000;
            padding: 10px;
            width: 100%;
            border: none;
            cursor: pointer;
            font-size: 18px;
            border-radius: 5px;
        }

        /* Overlay effect when sidebar is open */
        .cart-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 999;
        }
        .cart-overlay.active {
            display: block;
        }
        
    .cart-header {
        text-align: center;
        margin-bottom: 20px;
    }
    .cart-header h1{
        display: inline-block;
        font-size: 30px;
        border-bottom: 2px  solid #FFD700;
    }
    .cart-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px;
        border-bottom: 1px solid #ddd;
    }
    .cart-item img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 5px;
    }
    .item-details {
        flex: 1;
        margin-left: 15px;
    }
    .quantity-control button {
        background: #FFD700;
        border: none;
     
        cursor: pointer;
        border-radius: 40px;
        width: 18px;
        height: 18px;
        color: white;
    font-size: 13px;
    font-weight: bold;
    width: 30px;
    height: 30px;
  
   
    border-radius: 50%;
    }
    .remove {
        background: rgb(12, 11, 11);
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 40px;
    }
    .cart-summary {
        text-align: right;
        margin-top: 20px;
    }
    .order-now {
        width: 100%;
        padding: 10px;
        background: #FFD700;
        color: rgb(9, 8, 8);
        border: none;
        cursor: pointer;
        font-size: 18px;
        border-radius: 20px;
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
.tax2{
    border-top: 2px solid #ddd;
    
}
.bak a{
        color: #666;
       
    }
    .cart-count-badge {
    position: absolute;
    top: 0;
    right: 0;
    background: red;
    color: white;
    font-size: 10px;
    font-weight: bold;
    width: 18px;
    height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    
    transform: translate(50%, -50%); /* Center on top-right */
}
.cart-icon-container {
    position: relative; /* Ensures the badge positions correctly */
    display: inline-block; /* Keeps it inline */
}
.wishlist-icon-container {
    position: relative; /* Ensures the badge positions correctly */
    display: inline-block; /* Keeps it inline */
}

.love-icon.active {
    color: red;
    -webkit-text-stroke: 2px rgb(248, 5, 5); /* Gray border */
}
#wishlist-count {
    position: absolute;
    top: 0;
    right: 6px;
    background: red;
    color: white;
    font-size: 10px;
    font-weight: bold;
    width: 18px;
    height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    
    transform: translate(50%, -50%); /* Center on top-right */
}


       

}

        /* Only show sidebar on big screens */
        @media (max-width: 768px) {
            .cart-sidebar {
                display: none;
            }
            .cart3{
                display: none;
            }
        }
 /* Only show sidebar on big screens */
 @media (max-width: 768px) {
            .cart-sidebar {
                display: none;
            }
        }
   
</style>
<body>


    <header class="top-header">
        <div class="logo">
            <img src="Black_and_White_Modern_Minimalist_Streetwear_Logo-removebg-preview.png" alt="MR SEE CHICKEN Logo">
        </div>
              
    
       
        <button class="menu-toggle">&#9776;</button> <!-- ☰ Menu Button -->
  
        <nav class="nav-menu">
            
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="order_dashboard.html">Menu</a></li>
                <li><a href="order-history.php">Order</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
        
  
   
     
        <div class="auth-buttons">
    <?php if (!isset($_SESSION['auth_user']['id'])): ?>  
        <a href="register.php"><button class="signin">Sign Up</button></a>
        <a href="login.php"><button class="login">Login</button></a>
    <?php else: ?>  
        <?php
        $profilePicPath = 'uploads/' . ($_SESSION['auth_user']['profile_picture'] ?? '');
        $defaultAvatar = 'Premium_Vector___Young_man_Face_Avater_Vector_illustration_design-removebg-preview.png'; // Make sure this path is correct

        $profilePic = (!empty($_SESSION['auth_user']['profile_picture']) && file_exists($profilePicPath)) 
            ? $profilePicPath 
            : $defaultAvatar;
        ?>   
        <a href="ussr.php"> 
            <img id="profile-pic" src="<?= $profilePic; ?>" alt="Profile" class="user-icon">
        </a>
    <?php endif; ?>  
</div>


    </header>
      <!-- Cart Icon -->
      <div class="cart3">
        <span id="cart-count3" class="cart-count-badge" style="display: none;">0</span>
        <i class="fa fa-shopping-bag" id="cart-icon"></i>
    </div>

    <!-- Sidebar Cart -->
    <div class="cart-sidebar" id="cart-sidebar">
        <div class="cart-header">
            <h2>Your Cart</h2>
            <span class="close-cart" id="close-cart">&times;</span>
        </div>
        <div class="cart-items" id="cart-items">
            <!-- Cart items will be added dynamically -->
        </div>
        <div class="cart-footer">
           <a href="order.php"><button class="checkout-btn">Order Now</button></a> 
        </div>
    </div>

    <!-- Overlay when cart is open -->
    <div class="cart-overlay" id="cart-overlay"></div>

    <section class="container2">
        <!-- Left Side: Text & Order Details -->
        <div class="order-details2">
            <h1>Order your <br>favourite <span>Foods</span></h1>
            <p>Fresh and tasty meals made just for you. Order now and enjoy a delicious experience!</p>
            <a href="order_dashboard.html"><button class="buy-now">Order Now</button></a>
        </div>

      <!-- Right Side: Food Image & Details -->
<!-- Right Side: Food Image & Details -->
<div class="food-display">
    <div class="food-bg"></div> <!-- Background Circle -->
    <img src="A_plate_of_fried_chicken_and_french_fries_with_ketchup___Premium_AI-generated_image-removebg-preview.png" alt="Food Image" class="food-img active">
    <img src="How_to_Make_Jollof_Rice_in_5_Easy_Steps_-_Ev_s_Eats-removebg-preview.png" class="food-img" alt="">
    <img src="Burger__-removebg-preview.png" class="food-img" alt="">
    <img src="Receta_De_Pollo_KFC_Casero_--removebg-preview.png" class="food-img" alt="">
    <img src="uploads/1743452464_Jollof_Rice__My_Mum_s_Recipe_-removebg-preview.png" class="food-img" alt="">
    <img src="chicken_biryani-removebg-preview.png" class="food-img" alt="">
    <img src="Can_Zobo_drink_branding-removebg-preview.png" class="food-img" alt="">
</div>

    </section>
    <script>
       const foodImages = document.querySelectorAll(".food-img");
let currentImageIndex = 0;

function changeFoodImage() {
    // Remove "active" class from current image
    foodImages[currentImageIndex].classList.remove("active");

    // Move to the next image
    currentImageIndex = (currentImageIndex + 1) % foodImages.length;

    // Add "active" class to the new image
    foodImages[currentImageIndex].classList.add("active");
}

// Change image every 3 seconds
setInterval(changeFoodImage, 3000);

    
    </script>


    
    <!-- Sidebar Menu -->
    <div class="sidebar">
        <button class="close-btn">&times;</button> <!-- Close Button -->
        <ul>
            <li><a href="about.html">About Us</a></li>
            <li><a href="order_dashboard.html">Menu</a></li>
            <li><a href="order-history.php">Order</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
        <div class="auth-buttons2">
    <?php if (!isset($_SESSION['auth_user']['id'])): ?>  
      <a href="register.php">  <button class="signin">Sign Up</button>  </a>
      <a href="login.php"><button class="login">Login</button></a>
    <?php endif; ?>  
</div>
    
            
        </div>
    </div>
    


    <!-- Search Bar -->
    <div class="search-bar">
        <form action="searchresult.php" method="GET" class="search-form">
            <input type="text" name="query" id="searchBox" placeholder="Search for food..." required>
            <button type="submit"><i class="fas fa-search"></i> </button>
        </form>
        
    </div>
  
<script>
    function searchProducts() {
    let query = document.getElementById("searchInput").value.toLowerCase();
    let items = document.querySelectorAll(".food-item");
    let noResults = document.getElementById("noResults");
    let found = false;

    items.forEach(item => {
        let name = item.getAttribute("data-name").toLowerCase();
        if (name.includes(query)) {
            item.style.display = "block";
            found = true;
        } else {
            item.style.display = "none";
        }
    });

    noResults.style.display = found ? "none" : "block"; // Show "No results" if nothing matches
}

</script>
    <!-- Popular Food Section -->
    <?php
$profilePicPath = 'uploads/' . ($_SESSION['auth_user']['profile_picture'] ?? '');
$defaultAvatar = 'Premium_Vector___Young_man_Face_Avater_Vector_illustration_design-removebg-preview.png';

$profilePic = (isset($_SESSION['auth_user']['profile_picture']) && file_exists($profilePicPath)) 
    ? $profilePicPath 
    : $defaultAvatar;
?>
    <div class="top-bar">
         
     
     
       <a href="ussr.php"> <img id="profile-pic" src="<?= $profilePic; ?>" alt="Profile" class="user-icon"></a>

        <h3><i class="fas fa-map-marker-alt"></i> <span id="user-location">...</span></h1>
    </div>

    <script>
fetch("https://ipapi.co/json/")
    .then(response => response.json())
    .then(data => {
        document.getElementById("user-location").textContent = `${data.city}`;
    })
    .catch(error => {
        console.error("Error fetching IP location:", error);
        document.getElementById("user-location").textContent = "...";
    });
</script>
     <div class="Menu">
    <h2>Popular Food</h2>
    <a href="all.html" class="view-all">View all</a>
     </div>
    <section class="popular-food">
        <div class="food-categories">
            <button class="category active">🍽️  All</button>
            <a href="ramen.html"><button class="category">🍜 Ramen</button></a> 
           <a href="sushi.html"><button class="category">🍛 Jellof Rice</button></a>
           <a href="Curry.html">   <button class="category">🍝 spaghetti</button></a>
         
        
          <a href="pizza.html">  <button class="category">🍕 Pizza</button></a>
         <a href="burger.html">   <button class="category">🍔 Burger</button></a>
            <button class="category">🥗 Salad</button>
            <button class="category">🍩 Dessert</button>
            
        </div>
        
     
        
    </section>
    <section class="food-slider5">
        
        <div class="food-item5">
            <img src="Burger__-removebg-preview.png" alt="Burger">
       
        </div>
        <div class="food-item5 first">
            <img src="Quick_and_Easy_Nigerian_Egg_stew-removebg-preview.png" alt="Burger">
           
        </div>
        <div class="food-item5">
            <img src="How_to_Make_Jollof_Rice_in_5_Easy_Steps_-_Ev_s_Eats-removebg-preview.png" alt="Burger">
         
        </div>
        
    </section>
    

    <!-- Discount Banner -->
    <div class="promo-slider">
    <div class="promo-container">
        <div class="promo-banner">
            <div class="promo-text">
                <p>UP TO</p>
                <h2>20% OFF</h2>
                <p>On your first order</p>
                <button class="order-btn">Order Now</button>
            </div>
            <img src="Quick_and_Easy_Nigerian_Egg_stew-removebg-preview.png" alt="Delicious Pasta" class="promo-image2">
        </div>

        <div class="promo-banner">
            <div class="promo-text">
                <p>BUY 1 GET 1</p>
                <h2>FREE</h2>
                <p>Limited time offer</p>
                <button class="order-btn">Order Now</button>
            </div>
            <img src="Classic_Cheeseburger__25_Minutes_-removebg-preview.png" alt="Special Offer" class="promo-image">
        </div>

        <div class="promo-banner">
            <div class="promo-text">
                <p>ENJOY</p>
                <h2>FREE DELIVERY</h2>
                <p>On orders above ₦5000</p>
              
            </div>
            <img src="Receta_De_Pollo_KFC_Casero_--removebg-preview.png" alt="Free Delivery" class="promo-image">
        </div>
    </div>
    <div class="dots"></div> <!-- Dot indicators -->
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    let currentIndex = 0;
    const slides = document.querySelectorAll(".promo-banner");
    const totalSlides = slides.length;
    const slider = document.querySelector(".promo-container");
    const dotsContainer = document.querySelector(".dots");

    // Create dots dynamically
    for (let i = 0; i < totalSlides; i++) {
        let dot = document.createElement("span");
        dot.classList.add("dot");
        if (i === 0) dot.classList.add("active");
        dot.setAttribute("data-index", i);
        dot.addEventListener("click", () => goToSlide(i));
        dotsContainer.appendChild(dot);
    }

    function updateDots() {
        document.querySelectorAll(".dot").forEach((dot, index) => {
            dot.classList.toggle("active", index === currentIndex);
        });
    }

    function goToSlide(index) {
        currentIndex = index;
        slider.style.transform = `translateX(-${currentIndex * 33.32}%)`;
        updateDots();
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalSlides;
        goToSlide(currentIndex);
    }

    setInterval(nextSlide, 3000); // Auto-slide every 3 seconds
});

</script>
    <div class="Menu2">
        <h2>Popular Food</h2>
        <a href="burger.html" class="view-all">View all</a>
         </div>
    <!-- Food Grid -->
    <section class="food-grid">
        
            <div class="food-item" data-id="1" data-name="Crack Burger" data-price="2000" detailsPage="product1.html" data-img="crack_burgers_--removebg-preview.png">
                <button class="wishlist"><i class="fas fa-heart love-icon"></i></button>
                <a href="product1.html">
                <img src="Burger__-removebg-preview.png" alt="Crack Burger">
                <h3>Crack Burger</h3>
            </a>
                <div class="price-rating">
                    <p>₦2,000</p>
                    <span class="rating">⭐ 4.5</span>
                </div>
            </div>
        
          
       
    
        <div class="food-item" data-id="2" data-name="French Fries" data-price="3000" data-img="Free_French_Fries_Transparent_png__Snack_Menu__Fast_Food-removebg-preview.png">
            <button class="wishlist"><i class="fas fa-heart love-icon"></i>
            </button>
            <a href="product2.html">
            <img src="A_plate_of_fried_chicken_and_french_fries_with_ketchup___Premium_AI-generated_image-removebg-preview.png" alt="Ichiraku Ramen">
            <h3>Fries + Chicken</h3>
        </a>
            <div class="price-rating">
                <p>₦3,000</p>
                <span class="rating">⭐ 4.0</span>
            </div>
        </div>
        <div class="food-item" data-id="4" data-name="936bb0d7-6505-4831-b035-b937a8754351-removebg-preview (1).png">
            <button class="wishlist"><i class="fas fa-heart love-icon"></i>
            </button>
            <a href="products4.html">
            <img src="936bb0d7-6505-4831-b035-b937a8754351-removebg-preview (1).png" alt="Ichiraku Ramen">
            <h3>White Rice + Fish</h3>
            </a>
            <div class="price-rating">
                <p>₦4,000</p>
                <span class="rating">⭐ 5.0</span>
            </div>
        </div>
        <div class="food-item" data-id="3" data-name="Jellof Rice + Chicken" data-price="5000" data-img="How_to_Make_Jollof_Rice_in_5_Easy_Steps_-_Ev_s_Eats-removebg-preview.png">
            <button class="wishlist"><i class="fas fa-heart love-icon"></i>
            </button>
            <img src="How_to_Make_Jollof_Rice_in_5_Easy_Steps_-_Ev_s_Eats-removebg-preview.png" alt="Ichiraku Ramen">
            <h3>Jellof Rice + Chicken</h3>
            <div class="price-rating">
                <p>₦5,000</p>
                <span class="rating">⭐ 5.0</span>
            </div>
        </div>          
        <div class="food-item" data-id="4" data-name="Sandwich" data-price="3000" data-img="Club_Sandwich__1_-removebg-preview.png">
            <button class="wishlist"><i class="fas fa-heart love-icon"></i>
            </button>
            <a href="product3.html">
            <div><img src="Shawarma_fast_food_Ai_Cutout_on_transparent___Premium_AI-generated_PSD-removebg-preview (1).png" alt="Ichiraku Ramen"></div>
            <h3>Shawarma</h3>
        </a>
            <div class="price-rating">
                <p>₦3,000</p>
                <span class="rating">⭐ 4.0</span>
            </div>
        </div> 
        <div class="food-item">
            <button class="wishlist"><i class="fas fa-heart love-icon"></i>
            </button>
            <img src="Delicious_vegetable_yam_porridge__1_-removebg-preview.png" alt="Ichiraku Ramen">
            <h3>Yam Porridge</h3>
            <div class="price-rating">
                <p>₦3,700</p>
                <span class="rating">⭐ 5.0</span>
            </div>  
        </div>      
        <div class="food-item">
            <button class="wishlist"><i class="fas fa-heart love-icon"></i>
            </button>
            <img src="crack_burgers_--removebg-preview.png" alt="Ichiraku Ramen">
            <h3>Crack Burger</h3>
            <div class="price-rating">
                <p>₦2,000</p>
                <span class="rating">⭐ 4.5</span>
            </div>  
        </div>
        <div class="food-item">
            <button class="wishlist"><i class="fas fa-heart love-icon"></i>
            </button>
            <div><img src="Jollof_spaghetti-removebg-preview.png" alt="Ichiraku Ramen"></div>
            <h3>spaghetti + Chicken
            </h3>
            <div class="price-rating">
                <p>₦3,000</p>
                <span class="rating">⭐ 4.0</span>
            </div>
        </div>
        <div class="food-item">
            <button class="wishlist"><i class="fas fa-heart love-icon"></i>
            </button>
            <img src="Africa_jollof_rice-removebg-preview.png" alt="Ichiraku Ramen">
            <h3>Jellof Rice + Meat</h3>
            <div class="price-rating">
                <p>₦4,000</p>
                <span class="rating">⭐ 5.0</span>
            </div>
        </div>
        <div class="food-item">
            <button class="wishlist"><i class="fas fa-heart love-icon"></i>
            </button>
            <img src="02b282f9-d2ac-4c01-8b60-89701b645788-removebg-preview (1).png" alt="Ichiraku Ramen">
            <h3>Yam + Egg + Plantain</h3>
            <div class="price-rating">
                <p>₦5,000</p>
                <span class="rating">⭐ 5.0</span>
            </div>
        </div>          
        <div class="food-item">
            <button class="wishlist"><i class="fas fa-heart love-icon"></i>
            </button>
            <div><img src="Quick_and_Easy_Nigerian_Egg_stew-removebg-preview.png" alt="Ichiraku Ramen"></div>
            <h3>Yam + Egg + Plantain</h3>
            <div class="price-rating">
                <p>₦3,000</p>
                <span class="rating">⭐ 4.0</span>
            </div>
        </div> 
        <div class="food-item">
            <button class="wishlist"><i class="fas fa-heart love-icon"></i>
            </button>
            <img src="Jollof_Rice__My_Mum_s_Recipe_-removebg-preview.png" alt="Ichiraku Ramen">
            <h3>Jellof Rice + Chicken</h3>
            <div class="price-rating">
                <p>₦5,000</p>
                <span class="rating">⭐ 5.0</span>
            </div>
        </div>      
    </section>
<script>
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

</script>
    <div class="restaurant-gallery">
        <div class="gallery-overlay">
            <h2>Welcome to MR SEE CHICKEN FOOD</h2>
            <p>Delicious meals, great service, and the best experience.</p>
        </div>
        <div class="gallery-images">
            <img src="Hello Founder! Ready to Attract More Customers to….jpg" alt="Restaurant Image 1">
            <img src="Chez Cocotte, la bonne adresse pour bruncher à Bordeaux _ Audrey Cuisine.jpg" alt="Restaurant Image 2">
            <img src="Galeria de Mais! Bistrô Impermanente _ Butiá Arquitetura  - 17.jpg" alt="Restaurant Image 3">
        </div>
    </div>
    
    <section class="why-choose-us">
        <h2>Why Choose Us?</h2>
        <p>Over 2 million people are happy with us.</p>
        <div class="features">
            <div class="feature fade-in">
                <i class="fa-solid fa-burger"></i>

                <h3>Fresh Food</h3>
                <p>We serve the best and freshest food.</p>
            </div>
            <div class="feature fade-in">
                <i class="fas fa-tags"></i>
                <h3>Best Offer</h3>
                <p>We give the best offers for our customers.</p>
            </div>
            <div class="feature fade-in">
                <i class="fas fa-shipping-fast"></i>
                <h3>Fast Delivery</h3>
                <p>We ensure quick and reliable delivery.</p>
            </div>
        </div>
    </section>
    <section class="featured-menu">
        <h2>Explore Our Featured Food</h2>
        <div class="menu-container">
            <div class="menu-item in fade-in">
                <img src="Africa_jollof_rice-removebg-preview.png" alt="Jollof Rice With Meat">
                <h3>Jollof Rice With Meat</h3>
                <p>Spicy Meat and BBQ</p>
                <div class="price_cart">
                    <span class="price">₦3,500</span>
                    <button class="add-to-cart out"
                        data-name="Jollof Rice With Meat"
                        data-price="3500"
                        data-image="Africa_jollof_rice-removebg-preview.png">
                        Add to Cart
                    </button>
                </div>
            </div>
            
            <div class="menu-item fade-in">
                <img src="Panzanella_Salad-removebg-preview.png" alt="White Rice with Salad">
                <h3>White Rice with Salad</h3>
                <p>Spicy rice and salad</p>
                <div class="price_cart">
                    <span class="price">₦2,500</span>
                    <button class="add-to-cart out"
                        data-name="White Rice with Salad"
                        data-price="2500"
                        data-image="Panzanella_Salad-removebg-preview.png">
                        Add to Cart
                    </button>
                </div>
            </div>
            <div class="menu-item fade-in">
                <img src="52c0de13-d033-4a37-afaf-1c5fb1688d4e-removebg-preview.png" alt="Butter Steak and Potatoes">
                <h3>Jellof Rice + Plantain</h3>
                <p>Spicy steak with potatoes</p>
                <div class="price_cart">
                    <span class="price">₦2,800</span>
                    <button class="add-to-cart out"
                        data-name="Jellof Rice + Plantain"
                        data-price="2,800"
                        data-image="52c0de13-d033-4a37-afaf-1c5fb1688d4e-removebg-preview.png">
                        Add to Cart
                    </button>
                </div>
            </div>
            <div class="menu-item fade-in">
                <img src="Jamaican_Jerk_Chicken-removebg-preview.png" alt="Delicious Beef Noodles">
                <h3>Delicious Chicken BBQ</h3>
                <p>Spicy beef noodles</p>
                <div class="price_cart">
                    <span class="price">₦2,500</span>
                    <button class="add-to-cart out"
                    data-name="Delicious Chicken BBQ"
                    data-price="2500"
                    data-image="Jamaican_Jerk_Chicken-removebg-preview.png">
                    Add to Cart
                </button>
                </div>
            </div>
        </div>
    </section>
    <section class="about-section">
        <div class="about-container">
            <div class="about-image">
                <div class="bg-shape"></div>
                <img src="How_to_Make_Jollof_Rice_in_5_Easy_Steps_-_Ev_s_Eats-removebg-preview.png" alt="Delicious Food">
            </div>
            <div class="about-text">
                <h2>About <span>Us</span></h2>
                <p>Keep healthy food readily available. When you get hungry, you're more likely to eat the first thing you see on the counter. Keep healthy food readily available.</p>
                <a href="about.html" class="btn">View More</a>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            const notification = document.getElementById("cart-notification");
    
            document.querySelectorAll(".add-to-cart").forEach(button => {
                button.addEventListener("click", function () {
                    let name = this.getAttribute("data-name");
                    let price = parseInt(this.getAttribute("data-price").replace(",", ""));
                    let image = this.getAttribute("data-image");
    
                    let existingItem = cart.find(item => item.name === name);
                    if (existingItem) {
                        existingItem.quantity += 1;
                    } else {
                        cart.push({ name, price, image, quantity: 1 });
                    }
    
                    localStorage.setItem("cart", JSON.stringify(cart));
    
                    // Show custom notification
                    notification.style.display = "block";
                    notification.innerHTML = `<p>${name} added to cart!</p>`;
    
                    setTimeout(() => {
                        notification.style.display = "none";
                        window.location.href = "cart.php"; // Redirect to cart
                    }, 1500);
                });
            });
        });
    </script>
    
    
    <div id="cart-notification" class="cart-notification">
        <p></p>
    </div>
    
    <section class="menu-section2">
        <div class="menu-tabs2">
            <button class="menu-btn2 active" onclick="showMenu('burger')">🍔 Burger</button>
            <button class="menu-btn2" onclick="showMenu('pizza')">🍕 Pizza</button>
            <button class="menu-btn2" onclick="showMenu('drinks')">🥤 Soft Drinks</button>
        </div>
    
        <div class="menu-content2" id="menu-display">
            <!-- Default: Burger items -->
        </div>
    
      
    </section>
    
    <section class="swallow-section">
        <h2 class="section-title">Swallow Dishes</h2>
        <div class="swallow-container">
            
            <div class="swallow-card">
                <img src="58ec8630-d121-42af-bc10-6e72993ac9b8-removebg-preview.png" alt="Eba & Ogbono Soup">
                <div class="swallow-info">
                    <h3>Eba & Ogbono Soup</h3>
                    <p>Garri-made eba served with thick, flavorful ogbono soup.</p>
                    <div class="price-rating3">
                        <span class="price3">₦3,000</span>
                        <button class="add-to-cart out"
                        data-name="Eba & Ogbono Soup"
                        data-price="3000"
                        data-image="58ec8630-d121-42af-bc10-6e72993ac9b8-removebg-preview.png">
                        Add to Cart
                    </button>
                    </div>
             
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="swallow-card">
                <img src="1165b1db-0ea0-45bd-a8bb-3d0939c61ecd-removebg-preview.png" alt="Amala & Ewedu">
                <div class="swallow-info">
                    <h3>Pounded yam & Okor</h3>
                    <p>Rich, smooth pounded yam with delicious okor soup.</p>
                    <div class="price-rating3">
                        <span class="price3">₦3,500</span>
                        <button class="add-to-cart out"
                        data-name="Pounded yam & Okor"
                        data-price="3500"
                        data-image="1165b1db-0ea0-45bd-a8bb-3d0939c61ecd-removebg-preview.png">
                        Add to Cart
                    </button>
                    </div>
             
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="swallow-card">
                <img src="Africa_dishes_and_recipes-removebg-preview (1).png" alt="Pounded Yam & Egusi">
                <div class="swallow-info">
                    <h3>Amala & Ewedu </h3>
                  
                    <p>  A Yoruba classic—smooth amala with tasty ewedu & gbegiri.</p>
                    <div class="price-rating3">
                        <span class="price3">₦2,500</span>
                        <button class="add-to-cart out"
                        data-name="Amala & Ewedu "
                        data-price="2500"
                        data-image="Africa_dishes_and_recipes-removebg-preview (1).png">
                        Add to Cart
                    </button>
                    </div>
                
                </div>
            </div>
            <br>
            <br>
            <br>
            
            <div class="swallow-card">
                <img src="Egusi-removebg-preview (1).png" alt="Fufu & Bitterleaf Soup">
                <div class="swallow-info">
                    <h3>Fufu & Egusi Soup</h3>
                    <p>Soft fufu paired with nutritious bitterleaf soup.</p>
                    <div class="price-rating3">
                        <span class="price3">₦2,000</span>
                        <button class="add-to-cart out"
                        data-name="Fufu & Egusi Soup"
                        data-price="2000"
                        data-image="Egusi-removebg-preview (1).png">
                        Add to Cart
                    </button>
                    </div>
                   
                </div>
            </div>
         
    
        </div>
    </section>
    
    <section class="catering-section">
        <div class="catering-container">
            <div class="catering-text">
                <h2>Catering & Event Services</h2>
                <p>Hosting an event? Let us handle the food! We provide catering for <b>parties, weddings, birthdays, and corporate events</b>. Enjoy delicious meals tailored to your event needs.</p>
             <!-- Sliding Food Icons -->
             <div class="catering-image">
                <img src="People group catering buffet food indoor in restaurant _ Premium AI-generated image.jpg" alt="Catering Service">
            </div>
             <div class="food-icons">
          
    
            </div>
                <a href="catering_quote.php" class="cta-button">Get a Quote</a>
            </div>
         
        </div>
    </section>
    <section class="ordering-process">
        <h2>How It Works</h2>
        <div class="steps">
            <div class="step">
                <span class="icon">🥘</span>
                <h3>Choose Your Meal</h3>
                <p>Browse our delicious menu and pick your favorite meal.</p>
            </div>
            <div class="step">
                <span class="icon">🚗</span>
                <h3>Select Pickup or Delivery</h3>
                <p>Decide if you want to pick it up or have it delivered.</p>
            </div>
            <div class="step">
                <span class="icon">🍽️</span>
                <h3>Pay & Enjoy</h3>
                <p>Make a payment, and we’ll take care of the rest!</p>
            </div>
        </div>
    </section>
    <section class="testimonial-section">
        <div class="testimonial-container">
            <img src="Africa_jollof_rice-removebg-preview.png" alt="Customer Food" class="testimonial-img">
            <div class="testimonial-text">
                <p>
                    "This is the best restaurant ever! Their meals are delicious, and the service is excellent."
                </p>
                <div class="testimonial-author">
                    <img src="02e4f1b4d39dbd61b81d4dbc6bd8a01e.jpg" alt="Customer">
                    <div>
                        <h4>Malte Kramer</h4>
                     
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    
    <section class="newsletter-section">
        <div class="newsletter-container">
            <div class="newsletter-text">
                <h2>Ready to get started?</h2>
                <p>Subscribe to our newsletter for exclusive deals and updates.</p>
            </div>
            <form id="subscribe-form" class="newsletter-form">
                <input type="email" id="email" placeholder="Enter your email" required>
                <button type="submit">Get Started</button>
            </form>
        </div>
    </section>
    <p id="response"></p>
    <script>
    document.getElementById("subscribe-form").addEventListener("submit", function (e) {
        e.preventDefault();
        let email = document.getElementById("email").value;

        fetch("subscribe.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "email=" + encodeURIComponent(email)
        })
        .then(response => response.text())
        .then(data => document.getElementById("response").innerText = data)
        .catch(error => console.error("Error:", error));
    });
</script>
 
        
    <br>
    <br>
    <br>
    <footer>
        
        <a class="solo" href="index.php">
          <i class="fas fa-home"></i>
          <span>Home</span>
        </a>
        
        
        <a href="love.html">
            <div class="wishlist-icon-container">
          <i class="fas fa-heart"></i>
          <span id="wishlist-count">0</span>
          <span>Favorite</span>
          </div>
        </a>
        <a href="cart.php">
            <div class="cart-icon-container">
            <i class="fa fa-shopping-cart"></i>
            <span id="cart-count" class="cart-count-badge" style="display: none;">0</span>
            <span>Cart</span>
        </div>
          </a>
        <a href="ussr.php">
          <i class="fas fa-user"></i>
          <span>Account</span>
        </a>
      </footer>
      <script>
         document.addEventListener("DOMContentLoaded", function() {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        const cartCountEl = document.getElementById("cart-count3");

        function updateCartCount() {
            let totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            if (totalItems > 0) {
                cartCountEl.style.display = "flex";
                cartCountEl.textContent = totalItems;
            } else {
                cartCountEl.style.display = "none";
            }
        }

        updateCartCount(); // Call on page load

        // Modify "Add to Cart" function to update count dynamically
        document.querySelectorAll(".add-to-cart").forEach(button => {
            button.addEventListener("click", function () {
                let name = this.getAttribute("data-name");
                let price = parseInt(this.getAttribute("data-price").replace(",", ""));
                let image = this.getAttribute("data-image");

                let existingItem = cart.find(item => item.name === name);
                if (existingItem) {
                    existingItem.quantity += 1;
                } else {
                    cart.push({ name, price, image, quantity: 1 });
                }

                localStorage.setItem("cart", JSON.stringify(cart));
                updateCartCount();
            });
        });

        // Modify "Remove Item" function to update count when an item is removed
        window.removeItem = function(index) {
            cart.splice(index, 1);
            localStorage.setItem("cart", JSON.stringify(cart));
            updateCartDisplay();
            updateCartCount();
        };

        // Modify "Change Quantity" function to update count
        window.changeQuantity = function(index, change) {
            cart[index].quantity += change;
            if (cart[index].quantity <= 0) {
                cart.splice(index, 1);
            }
            localStorage.setItem("cart", JSON.stringify(cart));
            updateCartDisplay();
            updateCartCount();
        };
    });


      </script>
       <script>
         document.addEventListener("DOMContentLoaded", function() {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        const cartCountEl = document.getElementById("cart-count");

        function updateCartCount() {
            let totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            if (totalItems > 0) {
                cartCountEl.style.display = "flex";
                cartCountEl.textContent = totalItems;
            } else {
                cartCountEl.style.display = "none";
            }
        }

        updateCartCount(); // Call on page load

        // Modify "Add to Cart" function to update count dynamically
        document.querySelectorAll(".add-to-cart").forEach(button => {
            button.addEventListener("click", function () {
                let name = this.getAttribute("data-name");
                let price = parseInt(this.getAttribute("data-price").replace(",", ""));
                let image = this.getAttribute("data-image");

                let existingItem = cart.find(item => item.name === name);
                if (existingItem) {
                    existingItem.quantity += 1;
                } else {
                    cart.push({ name, price, image, quantity: 1 });
                }

                localStorage.setItem("cart", JSON.stringify(cart));
                updateCartCount();
            });
        });

        // Modify "Remove Item" function to update count when an item is removed
        window.removeItem = function(index) {
            cart.splice(index, 1);
            localStorage.setItem("cart", JSON.stringify(cart));
            updateCartDisplay();
            updateCartCount();
        };

        // Modify "Change Quantity" function to update count
        window.changeQuantity = function(index, change) {
            cart[index].quantity += change;
            if (cart[index].quantity <= 0) {
                cart.splice(index, 1);
            }
            localStorage.setItem("cart", JSON.stringify(cart));
            updateCartDisplay();
            updateCartCount();
        };
    });


      </script>
    <!-- Site Footer Section -->

<footer class="site-footer">
        <div class="footer-left">
        <div class="logo">
            <img src="Black_and_White_Modern_Minimalist_Streetwear_Logo-removebg-preview.png" alt="MR SEE CHICKEN Logo">
        </div>
              
            <p>Imaginative minds for imaginative brands.</p>
            <div class="newsletter">
                <input type="email" placeholder="Your email address">
                <button><i class="fas fa-arrow-right"></i></button>
            </div>
        </div>

        

        <div class="footer-links2">
            <div>
                <ul>
                    <li><a href="#">Our Services +</a></li>
                    <li><a href="#">Projects</a></li>
                    <li><a href="#">Our Process</a></li>
                    <li><a href="#">Referral Program</a></li>
                </ul>
            </div>

            <div>
                <ul>
                    <li><a href="#">About Us +</a></li>
                    <li><a href="#">Resources</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>
        
            <div>
                <ul>
                    <li><a href="#">Snacks +</a></li>
                    <li><a href="#">Burger</a></li>
                    <li><a href="#">Pizza</a></li>
                    <li><a href="#">Donut</a></li>
                </ul>
            </div>
            
        <div class="footer-socials2">
            <a href="#"><i class="fab fa-dribbble"></i></a>
            <a href="#"><i class="fab fa-behance"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-behance"></i></a>
           
        </div>
        </div>


    </footer>
   


    <script src="script.js"></script>
    <script src="st.js"></script>
</body>
</html>

