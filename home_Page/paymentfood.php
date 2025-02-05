<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="payment.css">
    <title>Payment</title>

    <script language="javascript">
        window.onload = function(){
            changeProduct();
        };

        function changeProduct(){
            var selectedOption = document.getElementById("food_id").selectedOptions[0];
            var productPrice = selectedOption.getAttribute('food_price');
            document.getElementById("p_method").value = productPrice;
        }
    </script>
</head>
<body>
    <h2>Payment</h2>

    <?php 
    $link = mysqli_connect('localhost', 'root', '', 'hostel') or die('Connect Failed' . mysqli_connect_error());
    $username = $_REQUEST['username'];
    
    $sql = "SELECT SUM(food_price) AS total_price 
    FROM bookingfood
    WHERE username = '$username' AND status_payment = 'รอการชำระเงิน'";
$result = mysqli_query($link, $sql);

$sql2 = "SELECT * FROM bookingfood WHERE username = '$username' AND status_payment = 'รอการชำระเงิน'";
$result2 = mysqli_query($link, $sql2);

$row = mysqli_fetch_assoc($result);
$totalPrice = $row['total_price'];

    echo "<table>";
        echo "<tr><th>Booking ID</th><th>Name</th><th>Quantity</th><th>Price</th></tr>";

        while ($row = mysqli_fetch_array($result2)) {
            echo "<tr>";
            echo "<td>" . $row['bkfood_id'] . "</td>";
            echo "<td>". $row["food_name"] ."</td>";
            echo "<td>". $row["quantity"] ."</td>";
            echo "<td>" . $row['food_price'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

    echo "<table>";
        echo "<tr>";
        echo "<td style='text-align: center; font-weight: bold; color: #4CAF50;'>" ."Total Food Price: ".$totalPrice." บาท". "</td>";
        echo "</tr>";
    echo "</table>";
    
    ?>

    <form action="processpaymentfood.php?username=<?php echo urlencode($username); ?>&total_price=<?php echo urlencode($totalPrice); ?>" method="post">
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
