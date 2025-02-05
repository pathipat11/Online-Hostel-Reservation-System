<?php
$link = mysqli_connect('localhost', 'root', '', 'hostel');
$username = $_GET["username"];
$bkdetail_id = $_GET["bkdetail_id"];
$booking_id = $_GET["booking_id"];

$sqlDelete = "DELETE FROM bookingdetail WHERE bkdetail_id='$bkdetail_id'";
$resultDelete = mysqli_query($link, $sqlDelete);

$sqlDelete1 = "DELETE FROM bookings WHERE booking_id='$booking_id'";
$resultDelete1 = mysqli_query($link, $sqlDelete1);

if ($resultDelete && $resultDelete1) {
    $sqlAlter = "ALTER TABLE bookingdetail AUTO_INCREMENT = 1";
    $resultAlter = mysqli_query($link, $sqlAlter);

    $sqlAlter1 = "ALTER TABLE bookings AUTO_INCREMENT = 1";
    $resultAlter1 = mysqli_query($link, $sqlAlter1);

    if ($resultAlter && $resultAlter1) {
        echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
        echo "<script>window.location='listbookingroom.php?username=$username';</script>";
    } else {
        echo "Error resetting AUTO_INCREMENT: " . mysqli_error($link);
    }
} else {
    echo "Error deleting data: " . mysqli_error($link);
    echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
}

mysqli_close($link);
?>