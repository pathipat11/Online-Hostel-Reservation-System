<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Home</title>
    <link rel="stylesheet" href="dashbord.css"> <!-- Use dashbord.css or any other home-specific styles -->
    <link rel="stylesheet" href="room1.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <script src="room.js" defer></script>
</head>
<body>
<?php
    $username = $_REQUEST['username'];
?>

<header>
    <nav class="navbar">
        <span class="hamburger-btn material-symbols-rounded">menu</span>
        <a href="home1.php?username=<?php echo urlencode($username); ?>" class="logo">
            <img src="image/3.jpg" alt="logo">
            <h2>Hotel</h2>
        </a>
        <ul class="links">
        <span class="close-btn material-symbols-rounded">close</span>
            <li><a href="home1.php?username=<?php echo urlencode($username); ?>">Home</a></li>
            <li><a href="food_page.php?username=<?php echo urlencode($username); ?>">Food</a></li>
            <li><a href="room1.php?username=<?php echo urlencode($username); ?>">Room</a></li>
            <li><a href="listfood_page.php?username=<?php echo urlencode($username); ?>">BILLFOOD</a></li>
            <li><a href="listbookingroom.php?username=<?php echo urlencode($username); ?>">BILLROOM</a></li>
        </ul>
        <div class="dropdown">
            <button class="login-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 448 512">
                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                </svg>
            </button>
            <div class="dropdown-content">
            <a style="font-size: 16px; text-align: center;" href="viewprofile.php?username=<?=$username?>"><?php echo $username; ?></a>
            <a href="dashbord.php">Logout</a>
            </div>
        </div>
    </nav>
</header>

<section class="hero-section">
    <div class="content">
        <h2>Welcome to Hotel</h2>
        <p>"Welcome to our hotel! Discover an exciting accommodation experience like no other here. We offer clean, comfortable rooms and excellent service to ensure your stay with us is satisfactory. Come join us and create unforgettable memories!"</p>
        <p>"Stay with us and experience exceptional accommodation! At our hotel, you'll find a warm atmosphere and professional service. Come stay with us and create the best memories here!"</p>
        <p>"Create exciting memories at our hotel! We have everything you need for a convenient and impressive stay. We welcome you to the world of wonderful relaxation here!"</p>
    </div>
</section>
</body>
</html>
