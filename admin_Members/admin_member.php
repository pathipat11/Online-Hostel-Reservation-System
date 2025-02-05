<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Members</title>
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">

</head>
<body>
<!-- sidebar -->
<div class="wrapper">
<aside id="sidebar">
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="">Admin Page</a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
            <i class="bi bi-person"></i>
                Admin Elements
            </li>
            <li class="sidebar-item">
                <a href="../dashboardadmin.php" class="sidebar-link">
                    Dashboards
                </a>
            </li>
            <li class="sidebar-item">
                <a href="admin_member.php" class="sidebar-link">
                    Members
                </a>
            </li>
            <li class="sidebar-item">
                <a href="../admin_Rooms/admin_room.php" class="sidebar-link">
                    Rooms
                </a>
            </li>
            <li class="sidebar-item">
                <a href="../admin_Foods/admin_food.php" class="sidebar-link">
                    Foods
                </a>
            </li>
            <li class="sidebar-item">
                <a href="../home_Page/check_login.php" class="sidebar-link">
                    <p class="btn btn-warning">Logout</p>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- mainpage -->
<div class="main">
    <div class="container">
        <div class="h4 text-center alert alert-success mb-3 mt-3" role="alert">แสดงข้อมูลผู้ใช้</div>
        <form method="GET" class="d-flex mb-3">
            <input type="text" name="search" class="form-control me-2" placeholder="ค้นหา Username" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
            <button type="submit" class="btn btn-primary">ค้นหา</button>
        </form>

        <a href="addmember.php" class="btn btn-success mb-3 mt-2">เพิ่มผู้ใช้</a>

        <table class="table">
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Real Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Create Date</th>
                <th>Active</th>
                <th>Picture</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $link = mysqli_connect('localhost', 'root', '', 'hostel');

            $search = isset($_GET['search']) ? mysqli_real_escape_string($link, $_GET['search']) : '';

            $sql = "SELECT * FROM member";
            if ($search) {
                $sql .= " WHERE username LIKE '%$search%'";
            }

            $result = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?=$row["username"]?></td>
                    <td><?=$row["password"]?></td>
                    <td><?=$row["name"]?></td>
                    <td><?=$row["email"]?></td>
                    <td><?=$row["mobile"]?></td>
                    <td><?=$row["createDate"]?></td>
                    <td><?=$row["isActive"]?></td>
                    <td><img src="<?=$row["picture"]?>" class="rounded img-thumbnail" style="max-width: 50px; max-height: 50px;"></td>
                    <td><a href="editmember.php?username=<?=$row["username"]?>" class="btn btn-warning">Edit</a></td>
                    <td><a href="deletememberaction.php?username=<?=$row["username"]?>" class="btn btn-danger" onclick="Del(this.href);return false;">Delete</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script language="javaScript">
function Del(mypage){
    var agree = confirm("ต้องการลบข้อมูลหรือไม่");
    if(agree){
        window.location = mypage;
    }
}
</script>
</body>
</html>