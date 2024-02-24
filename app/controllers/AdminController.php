<?php

class AdminController extends UserController{
    private $userModel;

    public function __construct() {
        // Initialize the necessary models
        $this->userModel = new User();
    }

    // Manage user accounts
    public function manageUserAccounts()
    {
        // Implement logic for managing user accounts
        // You can perform actions like viewing user accounts, suspending users, etc.
        $userAccounts = $this->userModel->getAllUsers();
        $deleteUserAccount = $this->userModel->deleteUserAccount($_GET["user_id"]);
        // Display or process user accounts as needed
    }


    // Content moderation
    public function contentModeration() {
        // Implement logic for content moderation
        // You can perform actions like reviewing reported content, removing inappropriate content, etc.
        // $reportedSongs = $this->songModel->getReportedSongs();
        // Display or process reported content as needed
    }
}
