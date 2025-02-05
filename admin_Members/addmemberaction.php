<?php
$link = mysqli_connect('localhost', 'root', '', 'hostel');
$username = $_POST["username"];
$password = $_POST["password"];
$name = $_POST["name"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$createDate = $_POST["createDate"];
$isActive = isset($_POST["isActive"]) ? 1 : 0;
$picture = $_POST["picture"];

$sql = "insert into member (username, password, name, email, mobile, createDate, isActive, picture) values ('$username', '$password', '$name', '$email', '$mobile', '$createDate', '$isActive', '$picture')";

$result = mysqli_query($link, $sql);

if ($result) {
    echo "<script>alert('เพิ่มข้อมูลสำเร็จ');</script>";
    echo "<script>window.location='admin_member.php';</script>";
} else {
    echo "<script>alert('เพิ่มข้อมูลไม่สำเร็จ');</script>";
}
?>
