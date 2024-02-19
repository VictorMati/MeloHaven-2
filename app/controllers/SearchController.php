<?php 

class SearchController {
    private $songModel;
    private $artistModel;
    private $genreModel;
    private $userModel;

    public function __construct() {
        // Initialize the necessary models
        $this->songModel = new Song();
        $this->artistModel = new Artist();
        $this->genreModel = new Genre();
        $this->userModel = new User();
    }

    // Search for songs
    public function searchSongs($query) {
        // Perform song search using the Song model
        $searchResults = $this->songModel->searchSongs($query);

        // Display or process song search results as needed
        return $searchResults;
    }

    // Search for artists
    public function searchArtists($query) {
        // Perform artist search using the Artist model
        $searchResults = $this->artistModel->searchArtists($query);

        // Display or process artist search results as needed
        return $searchResults;
    }

    // Search for genres
    public function searchGenres($query) {
        // Perform genre search using the Genre model
        $searchResults = $this->genreModel->searchGenres($query);

        // Display or process genre search results as needed
        return $searchResults;
    }

    // Search for users
    public function searchUsers($query) {
        // Perform user search using the User model
        $searchResults = $this->userModel->searchUsers($query);

        // Display or process user search results as needed
        return $searchResults;
    }
}
