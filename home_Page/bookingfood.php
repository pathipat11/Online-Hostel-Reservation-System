<?php
$username = $_REQUEST['username'];
$food_id = $_REQUEST['food_id'];
$food_price = $_REQUEST['food_price'];
$food_name = $_REQUEST['food_name'];
$status_payment = 'รอการชำระเงิน';
$quantity = $_POST['quantity'];
$link = mysqli_connect('localhost', 'root', '', 'hostel') or die("Connect Failed" . mysqli_connect_error());

$sql = "INSERT INTO bookingfood (food_id, username, food_price, food_name,status_payment,quantity) VALUES ('$food_id', '$username', '$food_price'*'$quantity', '$food_name','$status_payment','$quantity')";
    
$result = mysqli_query($link, $sql);
    
if ($result) {
    echo "<script>alert('สั่งอาหารเสร็จแล้ว!!');</script>";
    echo "<script>window.location='listfood_page.php?username=$username';</script>";
} else {
    echo "<script>alert('ไม่สามารถสั่งอาหารได้');</script>";
    echo "<script>window.location='listfood_page.php?username=$username';</script>";
}

mysqli_close($link);
?>