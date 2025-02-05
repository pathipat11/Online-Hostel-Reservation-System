<?php
$link = mysqli_connect('localhost', 'root', '', 'hostel');
$room_id = $_POST["room_id"];
$Room_remark = $_POST["Room_remark"];
$price = $_POST["price"];
$picture = $_POST["picture"];

$sql = "insert into room(room_id,Room_remark,price,picture) value('$room_id','$Room_remark','$price','$picture')";

$result = mysqli_query($link,$sql);
if($result){
    echo "<script>alert('เพิ่มข้อมูลสำเร็จ');</script>";
    echo "<script>window.location='admin_room.php';</script>";
}else{
    echo "<script>alert('เพิ่มข้อมูลไม่สำเร็จ');</script>";
}
?>