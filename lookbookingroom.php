<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lookbookingroom Admin</title>
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrapper">
    <aside id="sidebar">
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="adminpage.php">Admin Page</a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
            <i class="bi bi-person"></i>
                Admin Elements
            </li>
            <li class="sidebar-item">
                <a href="lookmember.php" class="sidebar-link">
                Look Members
                </a>
            </li>
            <li class="sidebar-item">
                <a href="lookbookingroom.php" class="sidebar-link">
                Look Rooms
                </a>
            </li>
            <li class="sidebar-item">
                <a href="lookbookingfood.php" class="sidebar-link">
                Look Foods
                </a>
            </li>
            <li class="sidebar-item">
                <a href="lookpayment_room.php" class="sidebar-link">
                Look Payment Rooms
                </a>
            </li>
            <li class="sidebar-item">
                <a href="lookpayment_food.php" class="sidebar-link">
                Look Payment Foods
                </a>
            </li>
            <li class="sidebar-item">
                <a href="adminpage.php" class="sidebar-link">
                    <p class="btn btn-warning">Back</p>
                </a>
            </li>
        </ul>
    </div>
    </aside>
    <div class="main">
        <div class="container">
            <div class="h4 text-center alert alert-secondary mb-3 mt-3" role="alert">ข้อมูลการจอง</div>

            <form method="post" action="lookbookingroom.php">
                <label><h6>เลือกดู</h6></label>
                <input type="date" name="checkin" class="form-control" required><br>
                <button type="submit" class="btn btn-secondary">ค้นหา</button>
            </form>
            <br>
            <table class="table">
                <tr>
                    <th>ลำดับการจอง</th>
                    <th>วันที่จอง</th>
                    <th>สถานะ</th>
                    <th>ห้องที่จอง</th>
                    <th>วันที่เช็คอิน</th>
                    <th>วันที่เช็คเอาท์</th>
                    <th>ชื่อผู้จอง</th>
                    <th>สถานะการชำระเงิน</th>
                </tr>

                <?php
                $link = mysqli_connect('localhost', 'root', '', 'hostel') or die('Connect Failed' . mysqli_connect_error());

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $selectedDate = $_POST['checkin'];

                    $sql = "SELECT b.*, bd.* FROM bookings b 
                            JOIN bookingdetail bd ON b.booking_id = bd.booking_id 
                            WHERE bd.checkin = ?";
                    $stmt = mysqli_prepare($link, $sql);

                    mysqli_stmt_bind_param($stmt, "s", $selectedDate);
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);
                } else {
                    $sql = "SELECT b.*, bd.* FROM bookings b JOIN bookingdetail bd ON b.booking_id = bd.booking_id";
                    $result = mysqli_query($link, $sql);
                }

                $num = 1;

                while ($row = mysqli_fetch_assoc($result)) {
                    $sql1 = "SELECT * FROM member";
                    $result1 = mysqli_query($link, $sql1);
                    $row1 = mysqli_fetch_assoc($result1);
                    $name = $row1['name'];
                    ?>
                    <tr>
                        <td><?= $num ?></td>
                        <td><?= $row['booking_date'] ?></td>
                        <td><?= $row['booking_status'] ?></td>
                        <td><?= $row['room_id'] ?></td>
                        <td><?= $row['checkin'] ?></td>
                        <td><?= $row['checkout'] ?></td>
                        <td><?= $name ?></td>
                        <td><?= $row['status_payment'] ?></td>
                    </tr>
                    <?php
                    $num++;
                }

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    mysqli_stmt_close($stmt);
                }
                mysqli_close($link);
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>