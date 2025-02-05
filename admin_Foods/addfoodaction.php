<?php
$link = mysqli_connect('localhost', 'root', '', 'hostel');
$food_id = $_POST["food_id"];
$food_name = $_POST["food_name"];
$food_price = $_POST["food_price"];
$food_picture = $_POST["food_picture"];

$sql = "insert into food(food_id,food_name,food_price,food_picture) value('$food_id','$food_name','$food_price','$food_picture')";

$result = mysqli_query($link,$sql);
if($result){
    echo "<script>alert('เพิ่มข้อมูลสำเร็จ');</script>";
    echo "<script>window.location='admin_food.php';</script>";
}else{
    echo "<script>alert('เพิ่มข้อมูลไม่สำเร็จ');</script>";
}
?>