<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
    
<?php
    $username = $_REQUEST["username"];
    $status_payment = "ชำระเงินเสร็จสิ้น";
    $payment = $_POST['payment'];
    $totalPrice = $_REQUEST['total_price'];
    $link = mysqli_connect('localhost', 'root', '', 'hostel') or die("Connect Failed" . mysqli_connect_error());

    // Update payment_room table
    $sql1 = "INSERT INTO payment_room(username,status_payment,p_method,price) VALUES('$username','$status_payment','$payment','$totalPrice') ";
    $result1 = mysqli_query($link, $sql1);

    // Update bookings table
    $sql2 = "UPDATE bookingdetail SET status_payment = 'ชำระเงินเสร็จสิ้น' WHERE status_payment = 'รอการชำระเงิน'";
    $result2 = mysqli_query($link, $sql2);

    if ($result1 && $result2) {
        echo "<script>alert('ชำระเงินเสร็จสิ้น');</script>";
        echo "<script>window.location='listbookingroom.php?username=$username';</script>";
    } else {
        echo "<script>alert('ไม่สามารถชำระเงินได้');</script>";
        echo "Error updating payment status: " . mysqli_error($link);
    }

    mysqli_close($link);
?>
</body>
</html>
