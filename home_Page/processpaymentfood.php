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

    $sql1 = "INSERT INTO payment_food (username,status_payment,p_method,food_price) VALUES('$username','$status_payment','$payment','$totalPrice')";
    $result1 = mysqli_query($link, $sql1);

    $sql2 = "UPDATE bookingfood SET status_payment = 'ชำระเงินเสร็จสิ้น' WHERE username = '$username'";
    $result2 = mysqli_query($link, $sql2);

    if ($result1 && $result2) {
        echo "<script>alert('ชำระเงินเสร็จสิ้น');</script>";
        echo "<script>window.location='listfood_page.php?username=$username';</script>";
    } else {
        echo "<script>alert('ไม่สามารถชำระเงินได้');</script>";
        echo "Error updating payment status: " . mysqli_error($link);
    }

    mysqli_close($link);
?>
</body>
</html>
