<?php

class Genre {
    private $db;

    public function __construct() {
        // Create a new instance of the Database class
        $this->db = new Database();
    }

    // Get genre information by genre ID
    public function getGenreInfo($genreId) {
        $query = "SELECT * FROM Genres WHERE genre_id = :genre_id";
        $data = [':genre_id' => $genreId];

        return $this->db->fetchSingleRow($query, $data);
    }

    // Get all genres
    public function getAllGenres() {
        $query = "SELECT * FROM Genres";

        return $this->db->fetchAllRows($query);
    }

    // Create a new genre
    public function createGenre($genreName, $genreImage) {
        $query = "INSERT INTO Genres (genre_name, genre_image) VALUES (:genre_name, :genre_image)";
        $data = [':genre_name' => $genreName, ':genre_image' => $genreImage];

        return $this->db->executeQuery($query, $data);
    }

    // Update genre information
    public function updateGenre($genreId, $genreName, $genreImage) {
        $query = "UPDATE Genres SET genre_name = :genre_name, genre_image = :genre_image WHERE genre_id = :genre_id";
        $data = [':genre_id' => $genreId, ':genre_name' => $genreName, ':genre_image' => $genreImage];

        return $this->db->executeQuery($query, $data);
    }

    // Delete a genre
    public function deleteGenre($genreId) {
        $query = "DELETE FROM Genres WHERE genre_id = :genre_id";
        $data = [':genre_id' => $genreId];

        return $this->db->executeQuery($query, $data);
    }
}

// Example usage:
// $genreModel = new Genre();
// $genreInfo = $genreModel->getGenreInfo($genreId);
// $allGenres = $genreModel->getAllGenres();
// $createResult = $genreModel->createGenre($genreName, $genreImage);
// $updateResult = $genreModel->updateGenre($genreId, $newGenreName, $newGenreImage);
// $deleteResult = $genreModel->deleteGenre($genreId);
