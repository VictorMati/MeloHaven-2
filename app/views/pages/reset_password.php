<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melohaven - Reset Password</title>
    <link rel="stylesheet" href="/public/css/reset-password.css"> 
    <link rel="icon" href="/public/assets/images/app_images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <div class="reset-password-container">
        <img src="/public/assets/images/app_images/logo.jpg" alt="Melohaven Logo">
        <h1>Melohaven</h1>
        <form action="../controllers/UserController.php" method="post" onsubmit="return validateResetPasswordForm()">
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button type="submit">Reset Password</button>
        </form>
        <div class="options">
            <p>Remember your password? <a href="../views/login.php">Log In</a></p>
        </div>
    </div>

    <script src="/public/js/resetPasswordValidation.js"></script>
</body>

</html>
