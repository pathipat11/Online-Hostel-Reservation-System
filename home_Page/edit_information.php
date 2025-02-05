<?php
$link = mysqli_connect('localhost','root','','hostel');
$username = $_GET["username"];

$sql = "select * from member where username='$username'";

$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);
if ($result && mysqli_num_rows($result) > 0) {
    $picture = $row['picture'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>แก้ไขข้อมูลส่วนตัว</title>
    <link rel="stylesheet" type="text/css" href="register.css">
    <script>
        function validateForm() {
            var password = document.forms["registrationForm"]["password"].value;
            var confirmPassword = document.forms["registrationForm"]["confirmPassword"].value;

            if (password !== confirmPassword) {
                alert("Password and Confirm Password do not match");
                return false;
            }
            return true;
        }
    </script>
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
    <div class="registration-form">
        <form name="registrationForm" action="edit_information_action.php?username=<?=$username?>" method="POST" onsubmit="return validateForm()">
            <h2>แก้ไขข้อมูลส่วนตัว</h2>
            <div class="form-group">
                <div class="img-area">
                    <div class="inner-area">
                        <img src="<?=$picture?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
            <label>Picture</label>
                <input type="url" name="picture" value="<?=htmlspecialchars($row['picture'])?>">
            </div>
            <div class="form-group">
            <label>Name</label>
                <input type="text" name="name" value="<?=htmlspecialchars($row['name'])?>">
            </div>
            <div class="form-group">
            <label>Mobile</label>
                <input type="text" name="mobile" value="<?=htmlspecialchars($row['mobile'])?>">
            </div>
            <div class="form-group">
            <label>Email</label>
                <input type="email" name="email" value="<?=htmlspecialchars($row['email'])?>">
            </div>
            <div class="form-group">
            <label>Username</label>
                <input type="text" name="username" value="<?=htmlspecialchars($row['username'])?>" readonly>
            </div>
            <div class="form-group">
            <label>Password</label>
                <input type="password" name="password" value="<?=htmlspecialchars($row['password'])?>">
            </div>
            <div class="form-group">
            <label>Confirm Password</label>
                <input type="password" name="confirmPassword" value="<?=htmlspecialchars($row['password'])?>">
            </div>
            <div class="form-group">
                <button type="submit" style="background-color: green; color: white;" onclick="Del(this.href);return ture;">Edit</button>
                <button type="button" style="background-color: red; color: white; float: right;" onclick="window.location.href='viewprofile.php?username=<?=$username?>'">Back</button>
            </div>
        </form>
    </div>
</body>
</html>
<script language="javaScript">
function Del(mypage){
    var agree = confirm("ต้องการแก้ไขข้อมูลหรือไม่");
    if(agree){
        window.location = mypage;
    }
}
</script>
