<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melohaven - Sign Up</title>
    <link rel="stylesheet" href="/public/css/signup.css"> 
    <link rel="icon" href="/public/assets/images/app_images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <div class="signup-container">
        <img src="/public/assets/images/app_images/logo.jpg" alt="Melohaven Logo">
        <h1>Melohaven</h1>
        <form action="/app/controllers/UserController.php?action=register" method="post" onsubmit="return validateSignupForm()">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="input-group">
                <label for="profile_image">Profile Image:</label>
                <input type="file" id="profile_image" name="profile_image" accept="image/*">
            </div>
            <button type="submit">Sign Up</button>
        </form>
        <div class="social-signup">
            <!-- Add your social signup links here -->
            <a href="#" class="fab fa-google"></a> Google
            <a href="#" class="fab fa-facebook"></a> Facebook
        </div>
        <div class="options">
            <p>Already have an account? <a href="/app/controllers/UserController.php?action=login">Log In</a></p>
        </div>
    </div>

    <script src="/public/js/signupValidation.js"></script>
</body>

</html>
