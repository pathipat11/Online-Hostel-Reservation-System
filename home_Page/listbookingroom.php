<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Bookings</title>
    <link rel="stylesheet" href="listroom.css">
    <link rel="stylesheet" href="listfood.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    <div class="content"><br>
            <h1>รายการห้องที่จอง</h1>
        </div>
    <?php
    $link = mysqli_connect('localhost', 'root', '', 'hostel') or die('Connect Failed' . mysqli_connect_error());
    
    // Validate and sanitize input
    $username = mysqli_real_escape_string($link, $_REQUEST['username']);

    $sql = "SELECT b.*, bd.* FROM bookings b JOIN bookingdetail bd ON b.booking_id = bd.booking_id WHERE username = '$username'";
    $result = mysqli_query($link, $sql);
    $num = 1;
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>ลำดับการจอง</th><th>ชื่อผู้จอง</th><th>วันที่จอง</th><th>สถานะ</th><th>ห้องที่จอง</th><th>วันที่เช็คอิน</th><th>วันที่เช็คเอาท์</th><th>สถานะการชำระเงิน</th><th></th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            $paymentStatus = $row["status_payment"];
            $deleteLink = "";
            if ($paymentStatus == 'รอการชำระเงิน') {
                $deleteLink = "<a href='delete_booking.php?username=$username&bkdetail_id={$row['bkdetail_id']}&booking_id={$row['booking_id']}' class=\"btn btn-danger btn-sm\" onclick=\"Del(this.href); return false;\">ยกเลิก</a>";
            } else {
                $deleteLink = "<button class=\"btn btn-success btn-sm\" disabled>สำเร็จ</button>";
            }
            $sql1 = "SELECT * FROM member WHERE username = '$username'";
            $result1 = mysqli_query($link, $sql1);
            $row1 = mysqli_fetch_assoc($result1);
            $name = $row1['name'];
            echo "<tr>";
            echo "<td>" . $num . "</td>";
            echo "<td>" . $name . "</td>";
            echo "<td>" . $row['booking_date'] . "</td>";
            echo "<td>" . $row['booking_status'] . "</td>";
            echo "<td>" . $row['room_id'] . "</td>";
            echo "<td>" . $row['checkin'] . "</td>";
            echo "<td>" . $row['checkout'] . "</td>";
            echo "<td>" . $row['status_payment'] . "</td>";
            echo "<td>$deleteLink</td>";
            echo "</tr>";
            $num++;
        }
        echo "</table>";
        echo "<a class='back-btn' href='room1.php?username=$username'>จองห้องเพิ่ม</a>\t";
        echo "<a class='back-btn' href='payment.php?username=$username'>จ่ายเงิน</a>";
    } else {
        echo "No bookings found.";
    }

    mysqli_close($link);
    ?>

</body>
</html>
<script language="javaScript">
function Del(mypage){
    var agree = confirm("ต้องการลบข้อมูลหรือไม่");
    if(agree){
        window.location = mypage;
    }
}
</script>
