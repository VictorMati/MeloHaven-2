<?php

class SubscriptionController {
    private $userModel;

    public function __construct() {
        // Initialize the User model
        $this->userModel = new User();
    }

    // Subscribe to premium
    public function subscribeToPremium($userId, $startDate, $endDate) {
        // Check if the user exists
        $user = $this->userModel->getUserProfile($userId);

        if ($user) {
            // Check if the user is already a premium user
            $isPremium = $this->userModel->isPremiumUser($userId);

            if (!$isPremium) {
                // Subscribe the user to premium in the model
                $subscribeResult = $this->userModel->subscribeToPremium($userId, $startDate, $endDate);

                if ($subscribeResult) {
                    // Successfully subscribed to premium
                    // You may redirect or display a success message
                    echo "Successfully subscribed to premium.";
                } else {
                    // Subscription failed, display an error or redirect to an error page
                    echo "Failed to subscribe to premium.";
                }
            } else {
                // User is already a premium user, display a message or redirect
                echo "You are already a premium user.";
            }
        } else {
            // User not found, display an error or redirect
            echo "User not found.";
        }
    }

    // Check if a user is a premium user
    public function isPremiumUser($userId) {
        // Check if the user is a premium user in the model
        $isPremium = $this->userModel->isPremiumUser($userId);

        // Display or process premium status as needed
        return $isPremium;
    }

    // Get premium subscription details for a user
    public function getSubscriptionDetails($userId) {
        // Get premium subscription details from the model
        $subscriptionDetails = $this->userModel->getPremiumSubscriptionDetails($userId);

        // Display or process subscription details as needed
        return $subscriptionDetails;
    }

    // Handle premium account upgrade
    public function upgradeAccountToPremium($userId, $paymentMethod, $subscriptionMonths) {
        // Implement payment handling logic here
        // For example, charge the user's card, validate payment, etc.

        // Assuming the payment is successful, proceed with upgrading to premium
        $startDate = date("Y-m-d");
        $endDate = date("Y-m-d", strtotime("+$subscriptionMonths months"));

        // Subscribe the user to premium
        $this->subscribeToPremium($userId, $startDate, $endDate);

        // You may redirect or display a success message
        echo "Account upgraded to premium successfully.";
    }

    // Cancel premium subscription
    public function cancelPremiumSubscription($userId) {
        // Check if the user is a premium user
        $isPremium = $this->userModel->isPremiumUser($userId);

        if ($isPremium) {
            // Cancel the premium subscription in the model
            $cancelResult = $this->userModel->cancelPremiumSubscription($userId);

            if ($cancelResult) {
                // Successfully canceled premium subscription
                // You may redirect or display a success message
                echo "Premium subscription canceled successfully.";
            } else {
                // Cancellation failed, display an error or redirect to an error page
                echo "Failed to cancel premium subscription.";
            }
        } else {
            // User is not a premium user, display a message or redirect
            echo "You are not currently subscribed to premium.";
        }
    }
}
