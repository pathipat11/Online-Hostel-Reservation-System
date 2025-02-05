<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ยืนยันการจอง</title>
    <link rel="stylesheet" href="listroom.css">
    <link rel="stylesheet" href="listfood.css">
</head>
<body>

<div class="container">
<?php
    $room_id = $_POST['room_id'];
    $username = $_POST['username'];
    $booking_date = date("Y-m-d");
    $booking_status = 'ยืนยันการจอง';
    $price = $_POST['price'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $status_payment = "รอการชำระเงิน";
    // คำนวณจำนวนวันที่จอง
    $datetime1 = new DateTime($checkin);
    $datetime2 = new DateTime($checkout);
    $interval = $datetime1->diff($datetime2);
    $days = $interval->days;

    // คำนวณราคารวม
    $total_price = $days * $price;

    $link = mysqli_connect('localhost', 'root', '', 'hostel') or die('การเชื่อมต่อล้มเหลว' . mysqli_connect_error());

    // ตรวจสอบว่าห้องพักไม่ว่างในช่วงเวลาที่ต้องการจอง
    $sql_check = "SELECT * FROM bookingdetail WHERE room_id = '$room_id' AND ((checkin <= '$checkin' AND checkout >= '$checkin') OR (checkin <= '$checkout' AND checkout >= '$checkout'))";
    $result_check = mysqli_query($link, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        echo "<script>alert('ขออภัยมีคนจองห้องนี้แล้ว');</script>";
        echo "<script>window.location='room1.php?&username=$username';</script>";
    } else {
        // เพิ่มข้อมูลการจองในตาราง 
        $sql1 = "INSERT INTO bookings (booking_date, booking_status, username) VALUES ('$booking_date', '$booking_status', '$username')";
        $result1 = mysqli_query($link, $sql1);

        if (!$result1) {
            die('Error: ' . mysqli_error($link));
        }

        // ดึง booking_id จากแถวที่เพิ่มเข้าไปในตาราง bookings
        $booking_id = mysqli_insert_id($link);

        // เพิ่มข้อมูลการจองในตาราง bookingdetail
        $sql2 = "INSERT INTO bookingdetail (room_id, checkin, checkout, booking_id, price,status_payment) VALUES ('$room_id', '$checkin', '$checkout', $booking_id, '$total_price','$status_payment')";
        $result2 = mysqli_query($link, $sql2);

        if (!$result2) {
            die('Error: ' . mysqli_error($link));
        }

        echo "<script>alert('ดูใบเสร็จ 🧾');</script>";
        echo "<script>window.location='listbookingroom.php?&username=$username';</script>";
    }

    mysqli_close($link);
?>

</div>

</body>
</html>
