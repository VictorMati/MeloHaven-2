<?php

class PremiumUser {
    private $db;

    public function __construct() {
        // Create a new instance of the Database class
        $this->db = new Database();
    }

    // PremiumUser-related methods

    // Subscribe user to premium
    public function subscribeToPremium($userId, $startDate, $endDate) {
        $query = "INSERT INTO PremiumUsers (user_id, subscription_start_date, subscription_end_date) VALUES (:user_id, :start_date, :end_date)";
        $data = [
            ':user_id' => $userId,
            ':start_date' => $startDate,
            ':end_date' => $endDate
        ];

        return $this->db->executeQuery($query, $data);
    }

    // Check if a user is a premium subscriber
    public function isPremiumUser($userId) {
        $query = "SELECT * FROM PremiumUsers WHERE user_id = :user_id";
        $data = [':user_id' => $userId];

        return $this->db->fetchSingleRow($query, $data) !== false;
    }

    public function getPremiumUsers() {
        $query = "SELECT * FROM PremiumUsers";

        return $this->db->fetchAllRows($query);
    }

    public function getPremiumSubscriptionDetails($userId){

        $query = "SELECT * FROM users WHERE users.userId = $userId";

        return $this->db->fetchSingleRow($query);
    }

    public function cancelPremiumSubscription($userId){

        $query = "DELETE FROM PremiumUsers WHERE user_id = $userId";

        return $this->db->executeQuery($query);
    }
}

// Example usage:
// $premiumUserModel = new PremiumUser();
// $subscribeResult = $premiumUserModel->subscribeToPremium($userId, $startDate, $endDate);
// $isPremiumUser = $premiumUserModel->isPremiumUser($userId);
