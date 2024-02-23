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

    // Display genre details
    public function showGenre($genreId) {
        // Get genre information from the model
        $genre = $this->genreModel->getGenreById($genreId);

        // Display the genre details
        // You may use a view rendering engine or echo HTML directly
        // Example: include 'genre_view.php';
        echo "Genre Name: {$genre['genre_name']}<br>";
        echo "Genre Image: <img src='{$genre['genre_image']}' alt='Genre Image'>";
    }

    // Get all genres
    public function getAllGenres() {
        // Get all genres from the model
        $allGenres = $this->genreModel->getAllGenres();

        // Display all genres
        // You may use a view rendering engine or echo HTML directly
        // Example: include 'all_genres_view.php';
        foreach ($allGenres as $genre) {
            echo "Genre Name: {$genre['genre_name']}<br>";
            echo "Genre Image: <img src='{$genre['genre_image']}' alt='Genre Image'>";
        }
    }

    // Get songs by genre
    public function getSongsByGenre($genreId) {
        // Get songs by genre from the model
        $songsByGenre = $this->genreModel->getSongsByGenre($genreId);

        // Display songs by genre
        // You may use a view rendering engine or echo HTML directly
        // Example: include 'songs_by_genre_view.php';
        foreach ($songsByGenre as $song) {
            echo "Song Title: {$song['title']}<br>";
            echo "Artist: {$song['artist_name']}<br>";
            echo "Album: {$song['album']}<br>";
            echo "Genre: {$song['genre_name']}<br>";
            echo "Release Date: {$song['release_date']}<br>";
            echo "Duration: {$song['duration']} seconds<br>";
            echo "Uploaded By: {$song['uploaded_by']}<br>";
            echo "Upload Date: {$song['upload_date']}<br>";
            echo "Song Image: <img src='{$song['song_image']}' alt='Song Image'>";
        }
    }
}
