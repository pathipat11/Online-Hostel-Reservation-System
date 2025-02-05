<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lookmember Admin</title>
    <!-- Bootstrap css -->
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
<div class="h4 text-center alert alert-secondary mb-3 mt-3" role="alert">ข้อมูลการรายรับ (การจองห้อง)</div>
<table class="table">
<tr>
    <th>ลำดับการชำระเงิน</th>
    <th>ชื่อผู้ใช้</th>
    <th>การชำระเงิน</th>
    <th>ราคารวม</th>
</tr>
<?php
$link = mysqli_connect('localhost', 'root', '', 'hostel') or die('Connect Failed'.mysqli_connect_error());
$sql1 = "select * from payment_room";
$result1 = mysqli_query($link,$sql1);
$sql2 = "select SUM(price) AS sumprice from payment_room";
$result2 = mysqli_query($link,$sql2);
$num = 1;
while($row = mysqli_fetch_array($result1)){
?>
<tr>
    <td><?=$num?></td>
    <td><?=$row['username']?></td>
    <td><?=$row['p_method']?></td>
    <td><?=$row['price']?></td>
</tr>
<?php
$num++;
}
$row = mysqli_fetch_assoc($result2);
$sumprice = $row['sumprice'];
?>
<th></th>
<th></th>
<th>ยอดเงินรวม</th>
<th><?="$sumprice" ?></th>
</table>
</div></div></div>
</body>
</html>