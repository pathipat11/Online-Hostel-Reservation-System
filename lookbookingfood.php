<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lookbookingfood Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrapper">
<aside id="sidebar">
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="adminpage.php">Admin Page</a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
            <i class="bi bi-person"></i>
                Admin Elements
            </li>
            <li class="sidebar-item">
                <a href="lookmember.php" class="sidebar-link">
                Look Members
                </a>
            </li>
            <li class="sidebar-item">
                <a href="lookbookingroom.php" class="sidebar-link">
                Look Rooms
                </a>
            </li>
            <li class="sidebar-item">
                <a href="lookbookingfood.php" class="sidebar-link">
                Look Foods
                </a>
            </li>
            <li class="sidebar-item">
                <a href="lookpayment_room.php" class="sidebar-link">
                Look Payment Rooms
                </a>
            </li>
            <li class="sidebar-item">
                <a href="lookpayment_food.php" class="sidebar-link">
                Look Payment Foods
                </a>
            </li>
            <li class="sidebar-item">
                <a href="adminpage.php" class="sidebar-link">
                    <p class="btn btn-warning">Back</p>
                </a>
            </li>
        </ul>
    </div>
</aside>
<div class="main">
<div class="container">
<div class="h4 text-center alert alert-secondary mb-3 mt-3" role="alert">ข้อมูลการสั่งอาหาร</div>
<table class="table">
<tr>
    <th>ลำดับการสั่งซื้อ</th>
    <th>รหัสอาหาร</th>
    <th>ชื่ออาหาร</th>
    <th>ราคาอาหาร</th>
    <th>ผู้สั่ง</th>
    <th>สถานะการชำระเงิน</th>
</tr>
<?php
$link = mysqli_connect('localhost', 'root', '', 'hostel') or die('Connect Failed'.mysqli_connect_error());
$sql = "SELECT * FROM bookingfood ";
$result = mysqli_query($link, $sql);
$num = 1;
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?=$num?></td>
    <td><?=$row['food_id']?></td>
    <td><?=$row['food_name']?></td>
    <td><?=$row['food_price']?></td>
    <td><?=$row['username']?></td>
    <td><?=$row['status_payment']?></td>
</tr>
<?php
$num++;
}
?>
</table>
</div></div></div>
</body>
</html>