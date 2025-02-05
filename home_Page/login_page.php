<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <div class="login-form">
        <form action="process_login.php" method="POST">
            <h2>Login</h2>
            <div class="form-group">
            <label>Username</label>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
            <label>Password</label>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <button type="submit" style="background-color: green; color: white;">Login</button>
                <button type="button" style="background-color: red; color: white; float: right;" onclick="window.location.href='dashbord.php'">Back</button>
            </div>
        </form>
    </div>
</body>
</html>
