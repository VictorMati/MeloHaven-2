<?php

class Follower {
    private $db;

    public function __construct() {
        // Create a new instance of the Database class
        $this->db = new Database();
    }

    // Follower-related methods

    // Follow a user
    public function followUser($followerId, $followedId) {
        $query = "INSERT INTO Followers (follower_id, followed_id) VALUES (:follower_id, :followed_id)";
        $data = [':follower_id' => $followerId, ':followed_id' => $followedId];

        return $this->db->executeQuery($query, $data);
    }

    // Unfollow a user
    public function unfollowUser($followerId, $followedId) {
        $query = "DELETE FROM Followers WHERE follower_id = :follower_id AND followed_id = :followed_id";
        $data = [':follower_id' => $followerId, ':followed_id' => $followedId];

        return $this->db->executeQuery($query, $data);
    }

    // Get followers of a user
    public function getFollowers($userId) {
        $query = "SELECT * FROM Followers WHERE followed_id = :followed_id";
        $data = [':followed_id' => $userId];

        return $this->db->fetchAllRows($query, $data);
    }

    // Get users followed by a user
    public function getFollowing($userId) {
        $query = "SELECT * FROM Followers WHERE follower_id = :follower_id";
        $data = [':follower_id' => $userId];

        return $this->db->fetchAllRows($query, $data);
    }

    // Check if a user is following another user
    public function isFollowing($followerId, $followedId) {
        $query = "SELECT * FROM Followers WHERE follower_id = :follower_id AND followed_id = :followed_id";
        $data = [':follower_id' => $followerId, ':followed_id' => $followedId];

        return $this->db->fetchSingleRow($query, $data) !== false;
    }


}

// Example usage:
// $followerModel = new Follower();
// $followUserResult = $followerModel->followUser($followerId, $followedId);
// $unfollowUserResult = $followerModel->unfollowUser($followerId, $followedId);
// $followers = $followerModel->getFollowers($userId);
// $following = $followerModel->getFollowing($userId);
// $isFollowing = $followerModel->isFollowing($followerId, $followedId);
