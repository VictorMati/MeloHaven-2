<?php

class UserController extends Controller {

    private $userModel;

    public function __construct() {
        parent::__construct();
        $this->userModel = $this->loadModel('User');
    }
    public function login() {
        // Handle login logic
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->authenticateUser($email, $password);

            if ($user) {
                // Start a session and store user data
                $_SESSION['user'] = $user;
                $this->redirectTo('home'); // Redirect to dashboard or another authenticated page
            } else {
                // Authentication failed, redirect to login page with an error message
                $this->redirectTo('/app/controllers/AuthController.php?action=login&error=1');
            }
        } else {
            // Display the login view
            $this->loadView('login');
        }
    }

    public function register() {
        // Handle registration logic
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $registrationResult = $this->userModel->registerUser($username, $email, $password);

            if ($registrationResult) {
                // Registration successful, redirect to login page
                $this->redirectTo('/app/controllers/AuthController.php?action=login');
            } else {
                // Registration failed, redirect to registration page with an error message
                $this->redirectTo('/app/controllers/AuthController.php?action=register&error=1');
            }
        } else {
            // Display the registration view
            $this->loadView('register');
        }
    }

    public function logout() {
        // Handle logout logic
        session_destroy(); // Destroy the session
        $this->redirectTo('login'); // Redirect to login page
    }

    public function forgotPassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
            $email = $_POST['email'];

            $user = $this->userModel->getUserByEmail($email);

            if ($user) {
                // Generate a password reset token and update the user's record
                $resetToken = bin2hex(random_bytes(32));
                $this->userModel->updatePasswordResetToken($user->user_id, $resetToken);

                // Send a password reset email (you need to implement this)
                // sendPasswordResetEmail($email, $resetToken);

                // Redirect to a confirmation page
                $this->redirectTo('/app/controllers/AuthController.php?action=forgotPassword&success=1');
            } else {
                // User not found, redirect to forgot password page with an error message
                $this->redirectTo('/app/controllers/AuthController.php?action=forgotPassword&error=1');
            }
        } else {
            // Display the forgot password view
            $this->loadView('reset_password');
        }
    }

    public function resetPassword($userId, $resetToken) {
        // Validate reset token and user ID
        if ($this->userModel->isResetTokenValid($userId, $resetToken)) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_password'])) {
                $newPassword = $_POST['new_password'];

                // Reset user password
                $this->userModel->resetPassword($userId, $newPassword);

                // Redirect to a password reset confirmation page
                $this->redirectTo('/app/controllers/AuthController.php?action=resetPassword&success=1');
            } else {
                // Display the password reset view
                $this->loadView('reset_password');
            }
        } else {
            // Invalid reset token or user ID, redirect to an error page
            $this->redirectTo('/app/controllers/AuthController.php?action=resetPassword&error=1');
        }
    }
}
