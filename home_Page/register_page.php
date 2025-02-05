<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>สมัครสมาชิก</title>
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
</head>
<body>
    <div class="registration-form">
        <form name="registrationForm" action="process_registration.php" method="POST" onsubmit="return validateForm()">
            <h2>สมัครสมาชิก</h2>
            <div class="form-group">
            <label>Picture</label>
                <input type="url" name="picture" placeholder="URL Picture:" required>
            </div>
            <div class="form-group">
            <label>Name</label>
                <input type="text" name="name" placeholder="Name:" required>
            </div>
            <div class="form-group">
            <label>Mobile</label>
                <input type="text" name="mobile" placeholder="Mobile:" required>
            </div>
            <div class="form-group">
            <label>Email</label>
                <input type="email" name="email" placeholder="Email:" required>
            </div>
            <div class="form-group">
            <label>Username</label>
                <input type="text" name="username" placeholder="Username:" required>
            </div>
            <div class="form-group">
            <label>Password</label>
                <input type="password" name="password" placeholder="Password:" required>
            </div>
            <div class="form-group">
            <label>Confirm Password</label>
                <input type="password" name="confirmPassword" placeholder="Confirm Password:" required>
            </div>
            <!-- Add a hidden input field for createDate with a value -->
            <input type="hidden" name="createDate" value="<?php echo date('Y-m-d H:i:s'); ?>" required>
            <div class="form-group">
                <button type="submit" style="background-color: green; color: white;">Register</button>
                <button type="button" style="background-color: red; color: white; float: right;" onclick="window.location.href='dashbord.php'">Back</button>
            </div>
            
        </form>
    </div>
</body>
</html>
