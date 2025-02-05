<?php
$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$createDate = date("Y-m-d");
$isActive = '1';
$picture = $_POST['picture'];

$link = mysqli_connect('localhost', 'root', '', 'hostel') or die("Connect Failed" . mysqli_connect_error());
$sql = "INSERT INTO member(username, password, name, email, mobile, createDate, isActive, picture) VALUES ('$username', '$password', '$name', '$email', '$mobile', '$createDate', '$isActive', '$picture')";
$result = mysqli_query($link, $sql);

if (!$result) {
    echo "<script>alert('There were some errors. Please register again.');</script>";
    echo "<script>window.location='register_page.php';</script>";
} else {
    echo "<script>alert('Register Completed Go to Login');</script>";
    echo "<script>window.location='login_page.php';</script>";
}

mysqli_close($link);
?>
