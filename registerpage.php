<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="register-container">
        <div class="register-header">Register</div>
        <div class="statusregister">dddddd</div>
        <form action="" method="POST" class="register-form">
            <div class="form-group">
                <label   for="first-name">First Name</label>
                <input type="text" id="first-name" name="first-name" placeholder="Enter your first name" required>
            </div>
            <div class="form-group">
                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" name="last-name" placeholder="Enter your last name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="**********" required>
            </div>
            <div class="form-group">
                <label for="photo">Add Profile Picture</label>
                <input type="file" id="photo" name="photo" accept="image/*">
            </div>
            <button type="submit"  class="register-button">Register</button>
        </form>
        <div class="login-link">Already have an account? <a href="loginpage.php">Log in</a></div>
    </div>
</body>
<script src="jsfiles/register.js"></script>
</html>
