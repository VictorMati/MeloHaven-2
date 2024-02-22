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
}
