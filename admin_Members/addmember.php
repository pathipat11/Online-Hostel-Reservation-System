<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Members</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-5 mx-auto my-auto">
<div class="h4 text-center alert alert-success mb-3 mt-3" role="alert"> เพิ่มข้อมูลผู้ใช้ </div>
    <form action="addmemberaction.php" method="post">
    <label>Picture</label>
    <input type="url" name="picture" class="form-control" placeholder="URL Picture" required><br>
    <label>Username</label>
    <input type="text" name="username" class="form-control" placeholder="Username" required><br>
    <label>Password</label>
    <input type="text" name="password" class="form-control" placeholder="Password" required><br>
    <label>Real Name</label>
    <input type="text" name="name" class="form-control" placeholder="Real Name" required><br>
    <label>Email</label>
    <input type="email" name="email" class="form-control" placeholder="Email" required><br>
    <label>Mobile</label>
    <input type="number" name="mobile" class="form-control" placeholder="Mobile" required><br>
    <input type="hidden" name="createDate" value="<?php echo date('Y-m-d\TH:i:s'); ?>">
    <input type="hidden" name="isActive" value="1">
    <input type="submit" value="เพิ่ม" class="btn btn-success mt-3">
    <a href="admin_member.php" class="btn btn-danger mt-3">ยกเลิก</a>
    </form>
</div>
</div>
</div>
</body>
</html>