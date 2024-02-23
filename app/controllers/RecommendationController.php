<?php

class RecommendationController extends Controller{
    private $recommendationModel;

    public function __construct() {
        // Initialize the Recommendation model
        $this->recommendationModel = $this->loadModel('Song');
    }

    // Get recommended songs for a user
    public function getRecommendedSongs($userId) {
        // Get recommended songs from the model
        $recommendedSongs = $this->recommendationModel->getRecommendedSongs($userId);

        // Display recommended songs
        // You may use a view rendering engine or echo HTML directly
        // Example: include 'recommended_songs_view.php';
        foreach ($recommendedSongs as $song) {
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
