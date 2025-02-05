<?php
$link = mysqli_connect('localhost', 'root', '', 'hostel');
$room_id = $_GET["room_id"];

$sql = "delete from room where room_id='$room_id'";

$result = mysqli_query($link,$sql);
if($result){
    echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
    echo "<script>window.location='admin_room.php';</script>";
}else{
    echo "Error : " . $sql . "<br>" . mysqli_error($link);
    echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
}
?>