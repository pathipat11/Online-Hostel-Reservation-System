<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lookmember Admin</title>
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
                <a href="lookpayment_food.php" class="sidebar-link">
                Look Payment Rooms
                </a>
            </li>
            <li class="sidebar-item">
                <a href="lookpayment_room.php" class="sidebar-link">
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
    <div class="h4 text-center alert alert-secondary mb-3 mt-3" role="alert">ข้อมูลสมาชิก</div>
    <form method="GET" class="d-flex mb-3">
        <input type="text" name="search" class="form-control me-2" placeholder="ค้นหา Username" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
        <button type="submit" class="btn btn-primary">ค้นหา</button>
    </form>

    <table class="table">
        <tr>
            <th>Username</th>
            <th>ชื่อ</th>
            <th>E-mail</th>
            <th>เบอร์โทร</th>
            <th>วันที่สมัคร</th>
            <th>สถานะ</th>
            <th>รูป</th>
        </tr>
        <?php
        $link = mysqli_connect('localhost', 'root', '', 'hostel') or die('Connect Failed'.mysqli_connect_error());

        $search = isset($_GET['search']) ? mysqli_real_escape_string($link, $_GET['search']) : '';

        $sql = "SELECT * FROM member";
        if ($search) {
            $sql .= " WHERE username LIKE '%$search%'";
        }

        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?=$row['username']?></td>
            <td><?=$row['name']?></td>
            <td><?=$row['email']?></td>
            <td><?=$row['mobile']?></td>
            <td><?=$row['createDate']?></td>
            <td><?=$row['isActive']?></td>
            <td><img src="<?=$row['picture']?>" class="rounded img-thumbnail" style="max-width: 50px; max-height: 50px;"></td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>
</div>
</div>
</body>
</html>