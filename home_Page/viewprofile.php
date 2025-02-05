<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<?php
    $username = $_REQUEST['username'];
    $link = mysqli_connect('localhost', 'root', '', 'hostel');
    $sql = "SELECT * from member where username='$username'";
    $result = mysqli_query($link, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $picture = $row['picture'];
    $name = $row['name'];
    $email = $row['email'];
    $mobile = $row['mobile'];
}
?>
  <div class="wrapper">
    <div class="img-area">
      <div class="inner-area">
        <img src="<?=$picture?>">
      </div>
    </div>
    <div class="name"><?=$name ?></div>
    <div class="about">Gmail: <?=$email?></div>
    <div class="about">Mobile: <?=$mobile?></div><br>
    <div class="buttons">
      <button type="button" onclick="window.location.href='edit_information.php?username=<?=$username?>'">Edit Profile</button>
      <button type="button" onclick="window.location.href='home1.php?username=<?=$username?>'">Back</button>
    </div>
  </div>
</body>
</html>
