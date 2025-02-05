<?php
$link = mysqli_connect('localhost', 'root', '', 'hostel');
$room_id = $_POST["room_id"];
$Room_remark = $_POST["Room_remark"];
$price = $_POST["price"];
$picture = $_POST["picture"];

$sql = "UPDATE room set Room_remark = '$Room_remark', price = '$price', picture = '$picture' where room_id = '$room_id'";

$result = mysqli_query($link,$sql);
if($result){
    echo "<script>alert('แก้ไขมูลสำเร็จ');</script>";
    echo "<script>window.location='admin_room.php';</script>";
}else{
    echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้');</script>";
}
?>