<?php

class Artist {
    private $db;

    public function __construct() {
        // Create a new instance of the Database class
        $this->db = new Database();
    }

    // Get artist information by artist ID
    public function getArtistInfo($artistId) {
        $query = "SELECT * FROM Artists WHERE artist_id = :artist_id";
        $data = [':artist_id' => $artistId];

        return $this->db->fetchSingleRow($query, $data);
    }

    public function searchByArtistName($artistName) {
        $query = "SELECT * FROM Artists WHERE artist_name LIKE :artist_name";
        $data = [':artist_name' => '%' . $artistName . '%'];

        return $this->db->fetchAllRows($query, $data);
    }


    // Get all artists
    public function getAllArtists() {
        $query = "SELECT * FROM Artists";

        return $this->db->fetchAllRows($query);
    }

    // Create a new artist
    public function createArtist($artistName, $artistImage) {
        $query = "INSERT INTO Artists (artist_name, artist_image) VALUES (:artist_name, :artist_image)";
        $data = [':artist_name' => $artistName, ':artist_image' => $artistImage];

        return $this->db->executeQuery($query, $data);
    }

    // Update artist information
    public function updateArtist($artistId, $artistName, $artistImage) {
        $query = "UPDATE Artists SET artist_name = :artist_name, artist_image = :artist_image WHERE artist_id = :artist_id";
        $data = [':artist_id' => $artistId, ':artist_name' => $artistName, ':artist_image' => $artistImage];

        return $this->db->executeQuery($query, $data);
    }

    // Delete an artist
    public function deleteArtist($artistId) {
        $query = "DELETE FROM Artists WHERE artist_id = :artist_id";
        $data = [':artist_id' => $artistId];

        return $this->db->executeQuery($query, $data);
    }
}

// Example usage:
// $artistModel = new Artist();
// $artistInfo = $artistModel->getArtistInfo($artistId);
// $allArtists = $artistModel->getAllArtists();
// $createResult = $artistModel->createArtist($artistName, $artistImage);
// $updateResult = $artistModel->updateArtist($artistId, $newArtistName, $newArtistImage);
// $deleteResult = $artistModel->deleteArtist($artistId);
