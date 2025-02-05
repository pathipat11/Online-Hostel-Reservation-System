<?php
$link = mysqli_connect('localhost', 'root', '', 'hostel');
$food_id = $_GET["food_id"];

$sql = "delete from food where food_id='$food_id'";

$result = mysqli_query($link,$sql);
if($result){
    echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
    echo "<script>window.location='admin_food.php';</script>";
}else{
    echo "Error : " . $sql . "<br>" . mysqli_error($link);
    echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
}
?>