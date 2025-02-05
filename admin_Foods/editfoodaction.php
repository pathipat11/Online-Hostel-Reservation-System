<?php
$link = mysqli_connect('localhost', 'root', '', 'hostel');
$food_id = $_POST["food_id"];
$food_name = $_POST["food_name"];
$food_price = $_POST["food_price"];
$food_picture = $_POST["food_picture"];

$sql = "update food set food_name = '$food_name', food_price = '$food_price', food_picture = '$food_picture' where food_id = '$food_id'";

$result = mysqli_query($link,$sql);
if($result){
    echo "<script>alert('แก้ไขมูลสำเร็จ');</script>";
    echo "<script>window.location='admin_food.php';</script>";
}else{
    echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้');</script>";
}
?>