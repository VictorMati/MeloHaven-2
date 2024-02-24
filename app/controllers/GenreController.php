<?php

class GenreController extends Controller{
    private $genreModel;

    public function __construct() {
        // Initialize the Genre model
        $this->genreModel = $this->loadModel('Genre');
    }

    // Add a new genre
    public function addGenre($genreName, $genreImage) {
        // Add the genre to the model
        $this->genreModel->addGenre($genreName, $genreImage);
    }

   // Show genre details
    public function showGenre($genreId) {

        // Get genre details
        $genre = $this->genreModel->getGenre($genreId);
    
        // Render genre view
        require 'views/genre.php';
  
  }
    // Get all genres
    public function getAllGenres() {

        $genres = $this->genreModel->getAllGenres();
    
        // Render genres view
        require 'views/genres.php';
    
    }

   // Get songs by genre
    public function getSongsByGenre($genreId, $page=1, $sort='name', $order='asc') {

        // Pagination
        $limit = 12; 
        $offset = ($page - 1) * $limit;
        
        // Get sorted, filtered songs
        $songs = $this->genreModel->getSongsByGenre(
        $genreId, 
        $limit,
        $offset,
        $sort,
        $order
        );
        
        // Get total count
        $total = $this->genreModel->countSongsByGenre($genreId);
    
        // Pass data to view 
        require 'views/genre_songs.php';
    
    }
}
