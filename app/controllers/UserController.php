<?php

require("C:\Users\hp\Documents\GitHub\MeloHaven-2\app\models\UserModel.php");

class UserController extends Controller {

    private $userModel;

    public function __construct() {
        parent::__construct();
        $this->userModel = $this->loadModel('UserModel');
    }

    public function registerUser($username, $email, $password, $profileImage) {
        $success = $this->userModel->registerUser($username, $email, $password, $profileImage);

        if ($success) {
            // Registration successful
            $this->redirectTo('login.php');
        } else {
            // Registration failed, handle accordingly (e.g., show an error message)
            $this->loadView('signup'); 
        }
    }

    public function loginUser($email, $password) {
        if ($this->userModel->loginUser($email, $password)) {
       
            $this->redirectTo('home.php');
        } else {
            // Redirect to the login page with an error message
            $this->redirectTo('login.php?error=1');
        }
    }

    public function logoutUser() {
        $this->userModel->logoutUser();
        
        $this->redirectTo('home.php');
    }

    public function resetPassword($email) {
        $resetToken = $this->userModel->resetPassword($email);
        // Send an email with the resetToken or provide instructions on the page
        // Redirect to a success page or login page
        $this->redirectTo('login.php');
    }

    public function updatePassword($email, $newPassword) {
        $this->userModel->updatePassword($email, $newPassword);
        // Redirect to a success page or login page
        $this->redirectTo('login.php');
    }
}

// Usage

$userController = new UserController();

// Handle form submissions or user actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        $userController->registerUser($_POST['username'], $_POST['email'], $_POST['password'], $_FILES['profile_image']);

    } elseif (isset($_POST['login'])) {
        $userController->loginUser($_POST['email'], $_POST['password']);

    } elseif (isset($_POST['logout'])) {
        $userController->logoutUser();

    } elseif (isset($_POST['resetPassword'])) {
        $userController->resetPassword($_POST['email']);

    } elseif (isset($_POST['updatePassword'])) {
        $userController->updatePassword($_POST['email'], $_POST['newPassword']);
    }

    // Handle other form submissions or actions
}
?>
