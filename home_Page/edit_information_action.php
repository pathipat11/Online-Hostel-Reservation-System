<?php
$link = mysqli_connect('localhost', 'root', '', 'hostel');
$username = $_POST["username"];
$password = $_POST["password"];
$name = $_POST["name"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$picture = $_POST["picture"];

$sql = "UPDATE member set picture = '$picture', password = '$password', name = '$name', email = '$email', mobile = '$mobile' WHERE username = '$username'";

$result = mysqli_query($link,$sql);
if($result){
    echo "<script>alert('แก้ไขมูลสำเร็จ');</script>";
    echo "<script>window.location='viewprofile.php?username=$username';</script>";
}else{
    echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้');</script>";
    echo "<script>window.location='viewprofile.php?username=$username';</script>";
}
?>