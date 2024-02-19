<?php

class UserMonitoring {
    private $db;

    public function __construct() {
        // Create a new instance of the Database class
        $this->db = new Database();
    }

    // UserMonitoring-related methods

    // Track user's music activity
    public function trackUserActivity($userId, $songId, $artistId, $playCount) {
        $query = "INSERT INTO UserMonitoring (user_id, song_id, artist_id, play_count) 
                  VALUES (:user_id, :song_id, :artist_id, :play_count)
                  ON DUPLICATE KEY UPDATE play_count = play_count + :play_count";

        $data = [
            ':user_id' => $userId,
            ':song_id' => $songId,
            ':artist_id' => $artistId,
            ':play_count' => $playCount
        ];

        return $this->db->executeQuery($query, $data);
    }

    // Fetch user's music activity
    public function getUserActivity($userId) {
        $query = "SELECT UserMonitoring.*, Songs.title AS song_title, Artists.artist_name
                  FROM UserMonitoring
                  LEFT JOIN Songs ON UserMonitoring.song_id = Songs.song_id
                  LEFT JOIN Artists ON UserMonitoring.artist_id = Artists.artist_id
                  WHERE UserMonitoring.user_id = :user_id
                  ORDER BY UserMonitoring.play_count DESC";

        $data = [':user_id' => $userId];

        return $this->db->fetchAllRows($query, $data);
    }
}

// Example usage:
// $userMonitoringModel = new UserMonitoring();
// $userMonitoringModel->trackUserActivity($userId, $songId, $artistId, $playCount);
// $userActivity = $userMonitoringModel->getUserActivity($userId);
