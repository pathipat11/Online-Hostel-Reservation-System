<?php
$link = mysqli_connect('localhost','root','','hostel');
$food_id = $_GET["food_id"];

$sql = "select * from food where food_id='$food_id'";

$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Foods</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-5 mx-auto my-auto">
    <div class="h4 text-center alert alert-success mb-3 mt-3" role="alert"> แก้ไขข้อมูลอาหาร </div>
    <form  action="editfoodaction.php" method="post">
    <input type="hidden" name="food_id" class="form-control" value=<?=$row['food_id']?> readonly><br>
    <label>Food Name</label>
    <input type="text" name="food_name" class="form-control" value=<?=$row['food_name']?>><br>
    <label>price</label>
    <input type="number" name="food_price" class="form-control" value=<?=$row['food_price']?>><br>
    <label>picture(url)</label>
    <input type="url" name="food_picture" class="form-control" value=<?=$row['food_picture']?>>
    <input type="submit" value="แก้ไข" class="btn btn-success mt-3">
    <a href="admin_food.php" class="btn btn-danger mt-3">ยกเลิก</a>
    </form> 
</div>
</div>
</div>
</body>
</html>