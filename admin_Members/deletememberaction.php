<?php
$link = mysqli_connect('localhost', 'root', '', 'hostel');
$username = $_GET["username"];

$sql = "delete from member where username='$username'";

$result = mysqli_query($link,$sql);
if($result){
    echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
    echo "<script>window.location='admin_member.php';</script>";
}else{
    echo "Error : " . $sql . "<br>" . mysqli_error($link);
    echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
}
?>