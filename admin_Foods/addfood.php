<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Foods</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-5 mx-auto my-auto">
    <div class="h4 text-center alert alert-success mb-3 mt-3" role="alert"> เพิ่มข้อมูลอาหาร </div>
    <form  action="addfoodaction.php" method="post">
    <input type="hidden" name="food_id" class="form-control" required>
    <label>Food Name</label>
    <input type="text" name="food_name" class="form-control" placeholder="Food Name" required><br>
    <label>Price</label>
    <input type="number" name="food_price" class="form-control" placeholder="Price" required><br>
    <label>Picture(url)</label>
    <input type="url" name="food_picture" class="form-control" placeholder="URL" required>
    <input type="submit" value="เพิ่ม" class="btn btn-success mt-3">
    <a href="admin_food.php" class="btn btn-danger mt-3">ยกเลิก</a>
    </form>
</div>
</div>
</div>
</body>
</html>