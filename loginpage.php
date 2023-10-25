<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <div class="login-header">Login</div>
        <div class="statuslogin">dddddd</div>
        <form action="login.php" method="POST" class="login-form">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="**********" required>
            </div>
            <button type="submit" class="login-button">Log In</button>
        </form>
        <div class="signup-link">Don't have an account? <a href="registerpage.php">Sign up</a></div>
    </div>
</body>
    <script src="jsfiles/login.js"></script>
</html>
