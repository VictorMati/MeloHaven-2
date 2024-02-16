<?php

class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Function to register a new user
    public function registerUser($username, $email, $password, $profileImage) {
        // Validate and handle file upload
        $profileImagePath = $this->handleFileUpload($profileImage);

        if (!$profileImagePath) {
            // Handle file upload failure
            return false;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username, email, password_hash, profile_picture) VALUES (?, ?, ?, ?)";
        $data = [$username, $email, $hashedPassword, $profileImagePath];

        // Execute the query and check for success
        $success = $this->db->executeQuery($query, $data);

        return $success;
    }

    // Function to handle file upload
    private function handleFileUpload($file) {
        $targetDirectory = "public\assets\images\user_profile_images\\";  
        
        // Ensure the directory exists or create it
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }

        // Generate a unique filename
        $fileName = uniqid() . "_" . basename($file["name"]);
        $targetFilePath = $targetDirectory . $fileName;

        // Check if file is valid
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
            return $targetFilePath;
        } else {
            // Handle file upload failure
            return false;
        }
    }

    // Function to log in a user
    public function loginUser($email, $password) {
        $query = "SELECT * FROM users WHERE email = ?";
        $data = [$email];

        $user = $this->db->fetchSingleRow($query, $data);

        if ($user && password_verify($password, $user->password_hash)) {
            $_SESSION['user_id'] = $user->user_id;
            return true;
        } else {
            return false;
        }
    }

    // Function to check if a user is logged in
    public function isUserLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    // Function to log out a user
    public function logoutUser() {
        session_unset();
        session_destroy();
    }

    // Function to reset a user's password and generate a reset token
    public function resetPassword($email) {
        $resetToken = bin2hex(random_bytes(32));

        $query = "UPDATE users SET password_reset_token = ? WHERE email = ?";
        $data = [$resetToken, $email];

        $this->db->executeQuery($query, $data);

        return $resetToken;
    }

    // Function to update the password after a successful password reset
    public function updatePassword($email, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $query = "UPDATE users SET password_hash = NULL, password_reset_token = NULL WHERE email = ?";
        $data = [$hashedPassword, $email];

        $this->db->executeQuery($query, $data);
    }

    // Add other functions as needed based on your requirements

}
?>
