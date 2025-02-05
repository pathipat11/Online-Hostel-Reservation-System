<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            color: #333;
            text-align: center;
        }

        h2 {
            color: #4CAF50;
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        form {
            margin-top: 20px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #4CAF50;
            font-weight: bold;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"],
        input[type="button"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 48%;
            display: inline-block;
        }

        input[type="submit"]:hover{
            background-color: #45a049;
        }
    
        input[type="button"] {
            background-color: #ff0000;
            width: 48%;
            margin-left: 4px;
        }
    
        input[type="button"]:hover {
            background-color: #CC0F0F;
        }
    </style>
</head>
<body>
    <h2>Payment</h2>

    <?php
$link = mysqli_connect('localhost', 'root', '', 'hostel') or die('Connect Failed' . mysqli_connect_error());
$username = $_REQUEST['username'];

$sql = "SELECT SUM(price) AS total_price 
FROM bookingdetail
WHERE status_payment = 'รอการชำระเงิน'";
$result = mysqli_query($link,$sql);

$sql2 = "SELECT b.*, bd.*, DATEDIFF(bd.checkout, bd.checkin) AS days_reserved, r.room_id
    FROM bookings b 
    JOIN bookingdetail bd ON b.booking_id = bd.booking_id 
    JOIN room r ON bd.room_id = r.room_id
    WHERE bd.status_payment = 'รอการชำระเงิน'";
$result2 = mysqli_query($link, $sql2);

$row = mysqli_fetch_assoc($result);
$totalPrice = $row['total_price'];

echo "<table>";
echo "<tr><th>Room ID</th><th>Check-in</th><th>Check-out</th><th>จำนวนวันที่จอง</th><th>Price</th></tr>";

while ($row = mysqli_fetch_assoc($result2)) {
    echo "<tr>";
    echo "<td>" . $row['room_id'] . "</td>";
    echo "<td>" . $row['checkin'] . "</td>";
    echo "<td>" . $row['checkout'] . "</td>";
    echo "<td>" . $row['days_reserved'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "</tr>";
}

echo "</table>";

echo "<table>";
echo "<tr>";
echo "<td style='text-align: center; font-weight: bold; color: #4CAF50;'>" ."รวมราคาห้องพัก: ".$totalPrice." บาท". "</td>";
echo "</tr>";
echo "</table>";

?>
    <form action="process_payment.php?username=<?php echo urlencode($username); ?>&total_price=<?php echo urlencode($totalPrice); ?>" method="post">
        <input type="hidden" name="username" value="<?php echo urlencode($username); ?>">
        <label for="payment">เลือกวิธีการชำระเงิน</label>
        <select name="payment" id="payment">
            <option value="Paypal">PayPal</option>
            <option value="กสิกรไทย">กสิกรไทย</option>
            <option value="ออมสิน">ออมสิน</option>
            <option value="กรุงไทย">กรุงไทย</option>
            <option value="กรุงเทพ">กรุงเทพ</option>
            <option value="ไทยพาณิชย์">ไทยพาณิชย์</option>
            <option value="กรุงศรี">กรุงศรี</option>
            <option value="ธ.ก.ส.">ธ.ก.ส.</option>
        </select>
        <br><br>
        <a href="listfood_page.php?username=<?php echo urlencode($username); ?>" style="text-decoration: none;">
        <input type="button" value="กลับ" >
        </a>
        <input type="submit" value="ชำระเงิน">
    </form>
</body>
</html>
