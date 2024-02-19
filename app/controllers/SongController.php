<?php 

class SongController {
    private $songModel;

    public function __construct() {
        // Initialize the Song model
        $this->songModel = new Song();
    }

    // Upload a new song
    public function uploadSong($title, $artistId, $album, $genreId, $releaseDate, $filePathAudio, $songImage, $duration, $uploadedBy) {
        // Validate and process file upload, if necessary

        // Upload the song in the model
        $uploadResult = $this->songModel->uploadSong($title, $artistId, $album, $genreId, $releaseDate, $filePathAudio, $songImage, $duration, $uploadedBy);

        if ($uploadResult) {
            // Successfully uploaded the song
            // You may redirect or display a success message
            echo "Song uploaded successfully.";
        } else {
            // Upload failed, display an error or redirect to an error page
            echo "Failed to upload the song.";
        }
    }

    // Update song information
    public function updateSong($songId, $title, $artistId, $album, $genreId, $releaseDate, $filePathAudio, $songImage, $duration) {
        // Validate and process file update, if necessary

        // Update the song in the model
        $updateResult = $this->songModel->updateSong($songId, $title, $artistId, $album, $genreId, $releaseDate, $filePathAudio, $songImage, $duration);

        if ($updateResult) {
            // Successfully updated the song
            // You may redirect or display a success message
            echo "Song updated successfully.";
        } else {
            // Update failed, display an error or redirect to an error page
            echo "Failed to update the song.";
        }
    }

    // Delete a song
    public function deleteSong($songId) {
        // Delete the song in the model
        $deleteResult = $this->songModel->deleteSong($songId);

        if ($deleteResult) {
            // Successfully deleted the song
            // You may redirect or display a success message
            echo "Song deleted successfully.";
        } else {
            // Deletion failed, display an error or redirect to an error page
            echo "Failed to delete the song.";
        }
    }

    // Create a new playlist
    public function createPlaylist($playlistName, $createdBy) {
        // Create the playlist in the model
        $createPlaylistResult = $this->songModel->createPlaylist($playlistName, $createdBy);

        if ($createPlaylistResult) {
            // Successfully created the playlist
            // You may redirect or display a success message
            echo "Playlist created successfully.";
        } else {
            // Creation failed, display an error or redirect to an error page
            echo "Failed to create the playlist.";
        }
    }

    // Update playlist information
    public function updatePlaylist($playlistId, $playlistName) {
        // Update the playlist in the model
        $updatePlaylistResult = $this->songModel->updatePlaylist($playlistId, $playlistName);

        if ($updatePlaylistResult) {
            // Successfully updated the playlist
            // You may redirect or display a success message
            echo "Playlist updated successfully.";
        } else {
            // Update failed, display an error or redirect to an error page
            echo "Failed to update the playlist.";
        }
    }

    // Delete a playlist
    public function deletePlaylist($playlistId) {
        // Delete the playlist in the model
        $deletePlaylistResult = $this->songModel->deletePlaylist($playlistId);

        if ($deletePlaylistResult) {
            // Successfully deleted the playlist
            // You may redirect or display a success message
            echo "Playlist deleted successfully.";
        } else {
            // Deletion failed, display an error or redirect to an error page
            echo "Failed to delete the playlist.";
        }
    }

    // Add a song to a playlist
    public function addSongToPlaylist($playlistId, $songId, $position) {
        // Add the song to the playlist in the model
        $addSongResult = $this->songModel->addSongToPlaylist($playlistId, $songId, $position);

        if ($addSongResult) {
            // Successfully added the song to the playlist
            // You may redirect or display a success message
            echo "Song added to playlist successfully.";
        } else {
            // Addition failed, display an error or redirect to an error page
            echo "Failed to add the song to the playlist.";
        }
    }

    // Remove a song from a playlist
    public function removeSongFromPlaylist($playlistId, $songId) {
        // Remove the song from the playlist in the model
        $removeSongResult = $this->songModel->removeSongFromPlaylist($playlistId, $songId);

        if ($removeSongResult) {
            // Successfully removed the song from the playlist
            // You may redirect or display a success message
            echo "Song removed from playlist successfully.";
        } else {
            // Removal failed, display an error or redirect to an error page
            echo "Failed to remove the song from the playlist.";
        }
    }

    // Add a song to favorites
    public function addToFavorites($userId, $songId) {
        // Add the song to favorites in the model
        $addToFavoritesResult = $this->songModel->addToFavorites($userId, $songId);

        if ($addToFavoritesResult) {
            // Successfully added the song to favorites
            // You may redirect or display a success message
            echo "Song added to favorites successfully.";
        } else {
            // Addition failed, display an error or redirect to an error page
            echo "Failed to add the song to favorites.";
        }
    }

    // Remove a song from favorites
    public function removeFromFavorites($userId, $songId) {
        // Remove the song from favorites in the model
        $removeFromFavoritesResult = $this->songModel->removeFromFavorites($userId, $songId);

        if ($removeFromFavoritesResult) {
            // Successfully removed the song from favorites
            // You may redirect or display a success message
            echo "Song removed from favorites successfully.";
        } else {
            // Removal failed, display an error or redirect to an error page
            echo "Failed to remove the song from favorites.";
        }
    }

    // Get all favorite songs of a user
    public function getFavoriteSongs($userId) {
        // Get favorite songs from the model
        $favoriteSongs = $this->songModel->getFavoriteSongs($userId);

        // Display or process favorite songs as needed
        return $favoriteSongs;
    }

    // Add a song download record
    public function addDownload($userId, $fileId) {
        // Add the download record in the model
        $addDownloadResult = $this->songModel->addDownload($userId, $fileId);

        if ($addDownloadResult) {
            // Successfully added the download record
            // You may redirect or display a success message
            echo "Download record added successfully.";
        } else {
            // Addition failed, display an error or redirect to an error page
            echo "Failed to add the download record.";
        }
    }
}
