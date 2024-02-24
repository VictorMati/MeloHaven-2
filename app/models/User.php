<?php

class User {
    private $db;

    public function __construct() {
        // Create a new instance of the Database class
        $this->db = new Database();
    }

    public function getAllUsers() {
        $query = "SELECT * FROM Users";

        return $this->db->fetchAllRows($query);
    }


    // Get user by email
    public function getUserByEmail($email) {
        $query = "SELECT * FROM Users WHERE email = :email";
        $data = [':email' => $email];

        return $this->db->fetchSingleRow($query, $data);
    }

    // Get user by username
    public function getUserByUsername($username) {
        $query = "SELECT * FROM Users WHERE username = :username";
        $data = [':username' => $username];

        return $this->db->fetchSingleRow($query, $data);
    }

    // Get user by ID
    public function getUserById($userId) {
        $query = "SELECT * FROM Users WHERE user_id = :user_id";
        $data = [':user_id' => $userId];

        return $this->db->fetchSingleRow($query, $data);
    }

    public function searchUsers($searchTerm) {
        $query = "SELECT * FROM Users WHERE username LIKE :search_term";
        $data = [':search_term' => "%$searchTerm%"];

        return $this->db->fetchAllRows($query, $data);
    }


    // Update user password reset token
    public function updatePasswordResetToken($userId, $resetToken) {
        $query = "UPDATE Users SET password_reset_token = :reset_token WHERE user_id = :user_id";
        $data = [':user_id' => $userId, ':reset_token' => $resetToken];

        return $this->db->executeQuery($query, $data);
    }

    // Check if a reset token is valid
    public function isResetTokenValid($userId, $resetToken) {
        $query = "SELECT * FROM Users WHERE user_id = :user_id AND password_reset_token = :reset_token";
        $data = [':user_id' => $userId, ':reset_token' => $resetToken];

        return $this->db->fetchSingleRow($query, $data) !== false;
    }

    // Reset user password
    public function resetPassword($userId, $newPassword) {
        // Hash the new password before updating it in the database
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $query = "UPDATE Users SET password_hash = :password_hash, password_reset_token = NULL WHERE user_id = :user_id";
        $data = [':user_id' => $userId, ':password_hash' => $hashedPassword];

        return $this->db->executeQuery($query, $data);
    }

    // Authentication method
    public function authenticateUser($email, $password) {
        $query = "SELECT * FROM Users WHERE email = :email";
        $data = [':email' => $email];

        $user = $this->db->fetchSingleRow($query, $data);

        // Check if the user exists and the password is correct
        if ($user && password_verify($password, $user->password_hash)) {
            // Authentication successful
            return $user;
        } else {
            // Authentication failed
            return false;
        }
    }

    // Registration method
    public function registerUser($username, $email, $password) {
        // Hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO Users (username, email, password_hash) VALUES (:username, :email, :password)";
        $data = [':username' => $username, ':email' => $email, ':password' => $hashedPassword];

        // Execute the registration query
        return $this->db->executeQuery($query, $data);
    }

    // Profile Management methods

    // Get user profile by user ID
    public function getUserProfile($userId) {
        $query = "SELECT * FROM Users WHERE user_id = :user_id";
        $data = [':user_id' => $userId];

        return $this->db->fetchSingleRow($query, $data);
    }

    // Update user profile
    public function updateProfile($userId, $username, $bio, $profilePicture) {
        $query = "UPDATE Users SET username = :username, bio = :bio, profile_picture = :profile_picture WHERE user_id = :user_id";
        $data = [':user_id' => $userId, ':username' => $username, ':bio' => $bio, ':profile_picture' => $profilePicture];

        return $this->db->executeQuery($query, $data);
    }

    public function deleteUserAccount($userId){
        $query = "DELETE FROM Users WHERE user_id = :user_id";
        $data = [':user_id' => $userId];

        return $this->db->executeQuery($query, $data);
    }
}

// Example usage:
// $userModel = new User();
// $userByEmail = $userModel->getUserByEmail($email);
// $userByUsername = $userModel->getUserByUsername($username);
// $userById = $userModel->getUserById($userId);
// $updateResetToken = $userModel->updatePasswordResetToken($userId, $resetToken);
// $isTokenValid = $userModel->isResetTokenValid($userId, $resetToken);
// $resetPasswordResult = $userModel->resetPassword($userId, $newPassword);
// $userProfile = $userModel->getUserProfile($userId);
// $updateResult = $userModel->updateProfile($userId, $newUsername, $newBio, $newProfilePicture);

