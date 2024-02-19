<?php

class Favorite {
    private $db;

    public function __construct() {
        // Create a new instance of the Database class
        $this->db = new Database();
    }

    // Favorite-related methods

    // Add a song to user favorites
    public function addToFavorites($userId, $songId) {
        $query = "INSERT INTO Favorites (user_id, song_id) VALUES (:user_id, :song_id)";
        $data = [':user_id' => $userId, ':song_id' => $songId];

        return $this->db->executeQuery($query, $data);
    }

    // Remove a song from user favorites
    public function removeFromFavorites($userId, $songId) {
        $query = "DELETE FROM Favorites WHERE user_id = :user_id AND song_id = :song_id";
        $data = [':user_id' => $userId, ':song_id' => $songId];

        return $this->db->executeQuery($query, $data);
    }

    // Get user's favorite songs
    public function getUserFavorites($userId) {
        $query = "SELECT * FROM Favorites WHERE user_id = :user_id";
        $data = [':user_id' => $userId];

        return $this->db->fetchAllRows($query, $data);
    }

    // Check if a song is in user favorites
    public function isInFavorites($userId, $songId) {
        $query = "SELECT * FROM Favorites WHERE user_id = :user_id AND song_id = :song_id";
        $data = [':user_id' => $userId, ':song_id' => $songId];

        return $this->db->fetchSingleRow($query, $data) !== false;
    }
}

// Example usage:
// $favoriteModel = new Favorite();
// $addToFavoritesResult = $favoriteModel->addToFavorites($userId, $songId);
// $removeFromFavoritesResult = $favoriteModel->removeFromFavorites($userId, $songId);
// $userFavorites = $favoriteModel->getUserFavorites($userId);
// $isInFavorites = $favoriteModel->isInFavorites($userId, $songId);
