<?php

class NewSong {
    private $db;

    public function __construct() {
        // Create a new instance of the Database class
        $this->db = new Database();
    }

    // NewSong-related methods

    // Track newly added song
    public function trackNewSong($songId) {
        $query = "INSERT INTO NewSongs (song_id) VALUES (:song_id)";

        $data = [':song_id' => $songId];

        return $this->db->executeQuery($query, $data);
    }

    // Fetch newly added songs
    public function getNewSongs($limit) {
        $query = "SELECT Songs.*, NewSongs.upload_date
                  FROM NewSongs
                  JOIN Songs ON NewSongs.song_id = Songs.song_id
                  ORDER BY NewSongs.upload_date DESC
                  LIMIT :limit";

        $data = [':limit' => $limit];

        return $this->db->fetchAllRows($query, $data);
    }
}

// Example usage:
// $newSongModel = new NewSong();
// $newSongModel->trackNewSong($songId);
// $newSongs = $newSongModel->getNewSongs($limit);
