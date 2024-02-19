<?php

include_once("path/to/models/User.php");

class AuthController {
    
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function login($username, $password) {
        // Validate user credentials and perform login
        // Implement your logic to check username and password against the database
        $userModel = new User($this->db);
        $user = $userModel->getUserByUsername($username);

        if ($user && password_verify($password, $user->password_hash)) {
            // Set session or JWT token for authentication
            $_SESSION['user_id'] = $user->user_id;
            return true;
        } else {
            return false;
        }
    }

    public function register($username, $email, $password) {
        // Validate and register a new user
        // Implement your logic to insert a new user into the database
        $userModel = new User($this->db);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $success = $userModel->registerUser($username, $email, $hashedPassword);

        if ($success) {
            // Optionally, perform auto-login after registration
            $this->login($username, $password);
        }

        return $success;
    }

    public function logout() {
        // Perform logout by destroying the session or JWT token
        session_destroy();
        // Optionally, redirect to the login page
        header("Location: /login");
    }

    public function resetPassword($email) {
        // Implement password reset functionality
        // Generate a reset token, send an email, and update the database
        // Implement your logic to generate a unique reset token, send an email, and update the database
        $userModel = new User($this->db);
        $user = $userModel->getUserByEmail($email);

        if ($user) {
            $resetToken = bin2hex(random_bytes(32)); // Example: Generate a 64-character hex token
            $userModel->updatePasswordResetToken($user->user_id, $resetToken);

            // TODO: Send email with reset link containing the token
            // mail($user->email, "Password Reset", "Click the link to reset your password: /reset-password?token=$resetToken");

            return true;
        } else {
            return false;
        }
    }
}

// Example usage:
// $db = new Database();
// $authController = new AuthController($db);
// $authController->login($username, $password);
// $authController->register($username, $email, $password);
// $authController->logout();
// $authController->resetPassword($email);
