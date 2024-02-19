<?php

class PopularArtist {
    private $db;

    public function __construct() {
        // Create a new instance of the Database class
        $this->db = new Database();
    }

    // PopularArtist-related methods

    // Track popular artist
    public function trackPopularArtist($artistId) {
        $query = "INSERT INTO PopularArtists (artist_id, play_count) VALUES (:artist_id, 1)
                  ON DUPLICATE KEY UPDATE play_count = play_count + 1";

        $data = [':artist_id' => $artistId];

        return $this->db->executeQuery($query, $data);
    }

    // Fetch popular artists
    public function getPopularArtists($limit) {
        $query = "SELECT Artists.*, PopularArtists.play_count
                  FROM PopularArtists
                  JOIN Artists ON PopularArtists.artist_id = Artists.artist_id
                  ORDER BY PopularArtists.play_count DESC
                  LIMIT :limit";

        $data = [':limit' => $limit];

        return $this->db->fetchAllRows($query, $data);
    }
}

// Example usage:
// $popularArtistModel = new PopularArtist();
// $popularArtistModel->trackPopularArtist($artistId);
// $popularArtists = $popularArtistModel->getPopularArtists($limit);
