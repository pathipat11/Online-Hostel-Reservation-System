<?php
$link = mysqli_connect('localhost','root','','hostel');
$username = $_GET["username"];

$sql = "select * from member where username='$username'";

$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Members</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    .img-area {
        background: #ecf0f3;
        box-shadow: -3px -3px 7px #ffffff, 3px 3px 5px #ceced1;
        height: 150px;
        width: 150px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }

    .img-area .inner-area {
        height: calc(100% - 25px);
        width: calc(100% - 25px);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .inner-area img {
        height: 100%;
        width: 100%;
        border-radius: 50%;
        object-fit: cover;
        position: relative;
    }
</style>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-5 mx-auto my-auto">
<div class="h4 text-center alert alert-success mb-3 mt-3" role="alert"> แก้ไขข้อมูลผู้ใช้ </div>
    <form action="editmemberaction.php" method="post">
    <div class="img-area">
    <div class="inner-area">
    <img src="<?=$row['picture']?>">
    </div>
    </div>
    <label>Picture</label>
    <input type="url" name="picture" class="form-control" value=<?=$row['picture']?>><br>
    <label>Username</label>
    <input type="text" name="username" class="form-control" value=<?=$row['username']?> readonly><br>
    <label>Password</label>
    <input type="text" name="password" class="form-control" value=<?=$row['password']?>><br>
    <label>Real Name</label>
    <input type="text" name="name" class="form-control" value=<?=$row['name']?>><br>
    <label>Email</label>
    <input type="email" name="email" class="form-control" value=<?=$row['email']?>><br>
    <label>Mobile</label>
    <input type="number" name="mobile" class="form-control" value=<?=$row['mobile']?>><br>
    <label>Active</label>
    <input type="checkbox" name="isActive" class="form-check-input" <?php echo $row['isActive'] == 1 ? 'checked' : ''; ?>><br>
    <input type="submit" value="แก้ไข" class="btn btn-success mt-3">
    <a href="admin_member.php" class="btn btn-danger mt-3">ยกเลิก</a>
    </form>
</div>
</div>
</div>
</body>
</html>