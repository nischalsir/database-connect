<?php require_once "configs/connect.php"; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Login | Class</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <div class="title">Login</div>
        <div class="content">
            <form action="./configs/connect.php" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Username or Email</span>
                        <input type="text" name="username_or_email" placeholder="Enter your username or email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="password" placeholder="Enter your password" required>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" name="login" value="Login">
                </div>
                <div class="signup-link">
                    <span>Don't have an account? <a href="register.php">Sign up</a></span>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
