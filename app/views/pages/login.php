<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melohaven - Login</title>
    <link rel="stylesheet" href="/public/css/login.css"> 
    <link rel="icon" href="/public/assets/images/app_images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <div class="login-container">
        <img src="/public/assets/images/app_images/logo.jpg" alt="Melohaven Logo">
        <h1>Melohaven</h1>
        <form action="../controllers/UserController.php" method="post" onsubmit="return validateLoginForm()">
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <div class="social-signup">
            <!-- Add your social signup links here -->
            <a href="#" class="fab fa-google"></a> Google
            <a href="#" class="fab fa-facebook"></a> Facebook
        </div>
        <div class="options">
            <a href="../views/reset_password.php">Forgot Password?</a>
            <p>Don't have an account? <a href="../views/register.php">Sign Up</a></p>
        </div>
    </div>

    <script src="/public/js/loginValidation.js"></script> <!-- Optional JavaScript for validation -->
</body>

</html>
