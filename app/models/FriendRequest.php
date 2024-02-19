<?php

class FriendRequest {
    private $db;

    public function __construct() {
        // Create a new instance of the Database class
        $this->db = new Database();
    }

    // FriendRequest-related methods

    // Send a friend request
    public function sendFriendRequest($senderId, $receiverId) {
        $query = "INSERT INTO FriendRequests (sender_id, receiver_id, request_status) VALUES (:sender_id, :receiver_id, 'Pending')";
        $data = [':sender_id' => $senderId, ':receiver_id' => $receiverId];

        return $this->db->executeQuery($query, $data);
    }

    // Accept a friend request
    public function acceptFriendRequest($requestId) {
        $query = "UPDATE FriendRequests SET request_status = 'Accepted' WHERE request_id = :request_id";
        $data = [':request_id' => $requestId];

        return $this->db->executeQuery($query, $data);
    }

    // Reject a friend request
    public function rejectFriendRequest($requestId) {
        $query = "UPDATE FriendRequests SET request_status = 'Rejected' WHERE request_id = :request_id";
        $data = [':request_id' => $requestId];

        return $this->db->executeQuery($query, $data);
    }

    // Get pending friend requests for a user
    public function getPendingFriendRequests($userId) {
        $query = "SELECT * FROM FriendRequests WHERE receiver_id = :user_id AND request_status = 'Pending'";
        $data = [':user_id' => $userId];

        return $this->db->fetchAllRows($query, $data);
    }

    // Check if a friend request exists
    public function doesFriendRequestExist($senderId, $receiverId) {
        $query = "SELECT * FROM FriendRequests WHERE sender_id = :sender_id AND receiver_id = :receiver_id AND request_status = 'Pending'";
        $data = [':sender_id' => $senderId, ':receiver_id' => $receiverId];

        return $this->db->fetchSingleRow($query, $data) !== false;
    }
}

// Example usage:
// $friendRequestModel = new FriendRequest();
// $sendFriendRequestResult = $friendRequestModel->sendFriendRequest($senderId, $receiverId);
// $acceptFriendRequestResult = $friendRequestModel->acceptFriendRequest($requestId);
// $rejectFriendRequestResult = $friendRequestModel->rejectFriendRequest($requestId);
// $pendingFriendRequests = $friendRequestModel->getPendingFriendRequests($userId);
// $doesFriendRequestExist = $friendRequestModel->doesFriendRequestExist($senderId, $receiverId);
