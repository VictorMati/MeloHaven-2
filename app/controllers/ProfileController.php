<?php

class ProfileController extends Controller {

    private $userModel;

    public function __construct() {
        parent::__construct(); // Call the constructor of the parent class
        $this->userModel = $this->loadModel('User');
    }

    // Display user profile
    public function showProfile($userId) {
        // Fetch user information from the model
        $user = $this->userModel->getUserProfile($userId);

        // Check if the user exists
        if ($user) {
            // Display the user profile
            $this->loadView('profile');
        } else {
            // User not found, display an error or redirect
            echo "User not found.";
        }
    }

    // Update user profile
    public function updateProfile($userId, $username, $bio, $profilePicture) {
        // Fetch current user information
        $currentUser = $this->userModel->getUserProfile($userId);

        // Check if the user exists
        if ($currentUser) {
            // Validate and update the profile information
            // You can add more validation and error handling based on your requirements

            // Update profile information in the model
            $updateResult = $this->userModel->updateProfile($userId, $username, $bio, $profilePicture);

            if ($updateResult) {
                // Profile updated successfully
                // Redirect to the user profile page or display a success message
                echo "Profile updated successfully.";
                $this->loadView('profile');
            } else {
                // Update failed, display an error or redirect to an error page
                echo "Failed to update profile.";
                $this->loadView('profile');
            }
        } else {
            // User not found, display an error or redirect
            echo "User not found.";
        }
    }

    // Change profile picture
    public function changeProfilePicture($userId, $newProfilePicture) {
        // Fetch current user information
        $currentUser = $this->userModel->getUserProfile($userId);

        // Check if the user exists
        if ($currentUser) {
            // Validate and update the profile picture
            // You can add more validation and error handling based on your requirements

            // Update profile picture in the model
            $updateResult = $this->userModel->updateProfile($userId, $currentUser->username, $currentUser->bio, $newProfilePicture);

            if ($updateResult) {
                // Profile picture updated successfully
                // Redirect to the user profile page or display a success message
                echo "Profile picture updated successfully.";
                $this->loadView('profile');
            } else {
                // Update failed, display an error or redirect to an error page
                echo "Failed to update profile picture.";
                $this->loadView('profile');
            }
        } else {
            // User not found, display an error or redirect
            echo "User not found.";
        }
    }
}
