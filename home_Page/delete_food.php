<?php
$link = mysqli_connect('localhost', 'root', '', 'hostel');
$username = $_GET["username"];
$bkfood_id = $_GET["bkfood_id"];

$sqlDelete = "DELETE FROM bookingfood WHERE bkfood_id='$bkfood_id'";
$resultDelete = mysqli_query($link, $sqlDelete);

if ($resultDelete) {
    $sqlAlter = "ALTER TABLE bookingfood AUTO_INCREMENT = 1";
    $resultAlter = mysqli_query($link, $sqlAlter);

    if ($resultAlter) {
        echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
        echo "<script>window.location='listfood_page.php?username=$username';</script>";
    } else {
        echo "Error resetting AUTO_INCREMENT: " . mysqli_error($link);
    }
} else {
    echo "Error deleting data: " . mysqli_error($link);
    echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
}

mysqli_close($link);
?>