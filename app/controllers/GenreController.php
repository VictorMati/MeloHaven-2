<?php

class GenreController {
    private $genreModel;

    public function __construct() {
        // Initialize the Genre model
        $this->genreModel = new Genre();
    }

    // Fetch genre information by genre ID
    public function getGenreInfo($genreId) {
        // Get genre information from the model
        $genreInfo = $this->genreModel->getGenreInfo($genreId);

        // Display or process genre information as needed
        return $genreInfo;
    }

    // Fetch all genres
    public function getAllGenres() {
        // Get all genres from the model
        $allGenres = $this->genreModel->getAllGenres();

        // Display or process all genres as needed
        return $allGenres;
    }

    // Create a new genre
    public function createGenre($genreName, $genreImage) {
        // Create a new genre using the model
        $createResult = $this->genreModel->createGenre($genreName, $genreImage);

        // Return the result of the creation process
        return $createResult;
    }

    // Update genre information
    public function updateGenre($genreId, $genreName, $genreImage) {
        // Update genre information using the model
        $updateResult = $this->genreModel->updateGenre($genreId, $genreName, $genreImage);

        // Return the result of the update process
        return $updateResult;
    }

    // Delete a genre
    public function deleteGenre($genreId) {
        // Delete a genre using the model
        $deleteResult = $this->genreModel->deleteGenre($genreId);

        // Return the result of the deletion process
        return $deleteResult;
    }
}

