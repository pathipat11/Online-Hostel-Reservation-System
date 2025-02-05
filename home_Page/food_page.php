    <!DOCTYPE html>
    <!-- Coding By CodingNepal - www.codingnepalweb.com -->
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hotel Food</title>
        <link rel="stylesheet" href="dashbord.css"> 
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
                <li><a href="home1.php?username=<?php echo urlencode($username); ?> ">Home</a></li>
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
    <div class="content">
        <h1>เลือกสั่งอาหาร</h1>
    </div>

    <?php
        $username = $_REQUEST['username'];
        $link = mysqli_connect('localhost', 'root', '', 'hostel') or die("Connect Failed" . mysqli_connect_error());
        $sql = "SELECT  * FROM food";
        $result = mysqli_query($link, $sql);
        echo "<div class='room-container'>";
        while ($data = mysqli_fetch_array($result)) {
            echo "<div class='room'>";
            echo "<img src='{$data['food_picture']}' class='image'>";  
            echo "<p> ลำดับเมนู {$data['food_id']}</p>";
            echo "<p>ชื่อเมนู {$data['food_name']} </p>";
            echo "<p> ราคา  {$data['food_price']} บาท</p>";
            echo "<form action='bookingfood.php?food_id={$data['food_id']}&food_name={$data['food_name']}&food_price={$data['food_price']}&username={$username}' method='post'>
                    สั่งจำนวน : <input type='number' id='quantity' name='quantity' value='1' min='1' max='99'><br><br>
                    <input type='submit' value='สั่งอาหาร' class='button'>
                </form>";
            echo "</div>";
        }
    ?>
        </body>
    </html>