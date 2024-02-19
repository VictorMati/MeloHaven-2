<?php

class PopularSong {
    private $db;

    public function __construct() {
        // Create a new instance of the Database class
        $this->db = new Database();
    }

    // PopularSong-related methods

    // Track popular song
    public function trackPopularSong($songId) {
        $query = "INSERT INTO PopularSongs (song_id, play_count) VALUES (:song_id, 1)
                  ON DUPLICATE KEY UPDATE play_count = play_count + 1";

        $data = [':song_id' => $songId];

        return $this->db->executeQuery($query, $data);
    }

    // Fetch popular songs
    public function getPopularSongs($limit) {
        $query = "SELECT Songs.*, PopularSongs.play_count
                  FROM PopularSongs
                  JOIN Songs ON PopularSongs.song_id = Songs.song_id
                  ORDER BY PopularSongs.play_count DESC
                  LIMIT :limit";

        $data = [':limit' => $limit];

        return $this->db->fetchAllRows($query, $data);
    }
}

// Example usage:
// $popularSongModel = new PopularSong();
// $popularSongModel->trackPopularSong($songId);
// $popularSongs = $popularSongModel->getPopularSongs($limit);
