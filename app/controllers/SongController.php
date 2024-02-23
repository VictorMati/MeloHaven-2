<?php

class SongController extends Controller{
    private $songModel;

    public function __construct() {
        // Initialize the Song model
        $this->songModel = $this->loadModel('Song');
    }

    // Display song details
    public function showSong($songId) {
        // Get song information from the model
        $song = $this->songModel->getSongById($songId);

        // Display the song details
        // You may use a view rendering engine or echo HTML directly
        // Example: include 'song_view.php';
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

    // Play song
    public function playSong($songId) {
        // Get song information from the model
        // $song = $this->songModel->getSongById($songId);

        // // Play the song
        // // You can use any audio player library or function to play the song
        // // Example: use AudioPlayer;
        // $audioPlayer = new AudioPlayer();
        // $audioPlayer->play($song['file_path_audio']);
    }

    // Add song to favorites
    public function addSongToFavorites($songId) {
        // Check if the user is logged in
        if (isset($_SESSION['user'])) {
            // Get the user ID
            $userId = $_SESSION['user']['user_id'];

            // Add the song to the user's favorites
            $addSongToFavoritesResult = $this->songModel->addSongToFavorites($userId, $songId);

            if ($addSongToFavoritesResult) {
                // Song added to favorites successfully
                // Display a success message
                echo "Song added to favorites successfully.";
            } else {
                // Failed to add song to favorites
                // Display an error message
                echo "Failed to add song to favorites.";
            }
        } else {
            // User is not logged in
            // Display a message asking the user to log in
            echo "You must be logged in to add songs to your favorites.";
        }
    }

    // Remove song from favorites
    public function removeSongFromFavorites($songId) {
        // Check if the user is logged in
        if (isset($_SESSION['user'])) {
            // Get the user ID
            $userId = $_SESSION['user']['user_id'];

            // Remove the song from the user's favorites
            $removeSongFromFavoritesResult = $this->songModel->removeSongFromFavorites($userId, $songId);

            if ($removeSongFromFavoritesResult) {
                // Song removed from favorites successfully
                // Display a success message
                echo "Song removed from favorites successfully.";
            } else {
                // Failed to remove song from favorites
                // Display an error message
                echo "Failed to remove song from favorites.";
            }
        } else {
            // User is not logged in
            // Display a message asking the user to log in
            echo "You must be logged in to remove songs from your favorites.";
        }
    }

    // Get all songs
    public function getAllSongs() {
        // Get all songs from the model
        $allSongs = $this->songModel->getAllSongs();

        // Display all songs
        // You may use a view rendering engine or echo HTML directly
        // Example: include 'all_songs_view.php';
        foreach ($allSongs as $song) {
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

    // Get songs by genre
    public function getSongsByGenre($genreId) {
        // Get songs by genre from the model
        $songsByGenre = $this->songModel->getSongsByGenre($genreId);

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

    // Get songs by artist
    public function getSongsByArtist($artistId) {
        // Get songs by artist from the model
        $songsByArtist = $this->songModel->getSongsByArtist($artistId);

        // Display songs by artist
        // You may use a view rendering engine or echo HTML directly
        // Example: include 'songs_by_artist_view.php';
        foreach ($songsByArtist as $song) {
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

    // Get new songs
    public function getNewSongs() {
        // Get new songs from the model
        $newSongs = $this->songModel->getNewSongs();

        // Display new songs
        // You may use a view rendering engine or echo HTML directly
        // Example: include 'new_songs_view.php';
        foreach ($newSongs as $song) {
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

    // Get popular songs
    public function getPopularSongs() {
        // Get popular songs from the model
        $popularSongs = $this->songModel->getPopularSongs();

        // Display popular songs
        // You may use a view rendering engine or echo HTML directly
        // Example: include 'popular_songs_view.php';
        foreach ($popularSongs as $song) {
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

    // Search for songs
    public function searchSongs($query) {
        // Search for songs using the model
        $searchSongs = $this->songModel->searchSongs($query);

        // Display search results
        // You may use a view rendering engine or echo HTML directly
        // Example: include 'search_results_view.php';
        foreach ($searchSongs as $song) {
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
