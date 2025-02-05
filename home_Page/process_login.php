<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>
    <body>
    <?php
    $username = $_POST["username"];
    $password = $_POST["password"];

    $link = mysqli_connect('localhost', 'root', '', 'hostel') or die("Connect Failed".mysqli_connect_error());

    $sql = "SELECT * FROM member WHERE username = '$username' AND password = '$password' AND isActive = '1'";
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_array($result);

    if ($result->num_rows > 0) 
    {
        if($data['username'] == 'admin'){
            echo "<script>alert('Go To Admin Page !!!');</script>";
            echo "<script>window.location='../adminpage.php?username=$username';</script>";
        }else{
            echo "<script>alert('Login success');</script>";
            echo "<script>window.location='home1.php?username=$username';</script>";
        }
    } else 
    {
        echo "<script>alert('The username or password is incorrect or the account is inActive.');</script>";
        echo "<script>window.location='login_page.php';</script>";
    }
?>
    </body>
</html>