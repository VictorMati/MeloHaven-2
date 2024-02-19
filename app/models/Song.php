<?php

class Song {
    private $db;

    public function __construct() {
        // Create a new instance of the Database class
        $this->db = new Database();
    }

    // Song Management methods

    // Upload a new song
    public function uploadSong($title, $artistId, $album, $genreId, $releaseDate, $filePathAudio, $songImage, $duration, $uploadedBy) {
        $query = "INSERT INTO Songs (title, artist_id, album, genre_id, release_date, file_path_audio, song_image, duration, uploaded_by) 
                  VALUES (:title, :artist_id, :album, :genre_id, :release_date, :file_path_audio, :song_image, :duration, :uploaded_by)";
        $data = [
            ':title' => $title,
            ':artist_id' => $artistId,
            ':album' => $album,
            ':genre_id' => $genreId,
            ':release_date' => $releaseDate,
            ':file_path_audio' => $filePathAudio,
            ':song_image' => $songImage,
            ':duration' => $duration,
            ':uploaded_by' => $uploadedBy
        ];

        return $this->db->executeQuery($query, $data);
    }

    // Update song information
    public function updateSong($songId, $title, $artistId, $album, $genreId, $releaseDate, $filePathAudio, $songImage, $duration) {
        $query = "UPDATE Songs 
                  SET title = :title, artist_id = :artist_id, album = :album, genre_id = :genre_id, 
                      release_date = :release_date, file_path_audio = :file_path_audio, song_image = :song_image, duration = :duration 
                  WHERE song_id = :song_id";
        $data = [
            ':song_id' => $songId,
            ':title' => $title,
            ':artist_id' => $artistId,
            ':album' => $album,
            ':genre_id' => $genreId,
            ':release_date' => $releaseDate,
            ':file_path_audio' => $filePathAudio,
            ':song_image' => $songImage,
            ':duration' => $duration
        ];

        return $this->db->executeQuery($query, $data);
    }

    // Delete a song
    public function deleteSong($songId) {
        $query = "DELETE FROM Songs WHERE song_id = :song_id";
        $data = [':song_id' => $songId];

        return $this->db->executeQuery($query, $data);
    }

    // Playlist Management methods

    // Create a new playlist
    public function createPlaylist($playlistName, $createdBy) {
        $query = "INSERT INTO Playlists (playlist_name, created_by) VALUES (:playlist_name, :created_by)";
        $data = [':playlist_name' => $playlistName, ':created_by' => $createdBy];

        return $this->db->executeQuery($query, $data);
    }

    // Update playlist information
    public function updatePlaylist($playlistId, $playlistName) {
        $query = "UPDATE Playlists SET playlist_name = :playlist_name WHERE playlist_id = :playlist_id";
        $data = [':playlist_id' => $playlistId, ':playlist_name' => $playlistName];

        return $this->db->executeQuery($query, $data);
    }

    // Delete a playlist
    public function deletePlaylist($playlistId) {
        $query = "DELETE FROM Playlists WHERE playlist_id = :playlist_id";
        $data = [':playlist_id' => $playlistId];

        return $this->db->executeQuery($query, $data);
    }

    // Add a song to a playlist
    public function addSongToPlaylist($playlistId, $songId, $position) {
        $query = "INSERT INTO Playlist_Songs (playlist_id, song_id, position) VALUES (:playlist_id, :song_id, :position)";
        $data = [':playlist_id' => $playlistId, ':song_id' => $songId, ':position' => $position];

        return $this->db->executeQuery($query, $data);
    }

    // Remove a song from a playlist
    public function removeSongFromPlaylist($playlistId, $songId) {
        $query = "DELETE FROM Playlist_Songs WHERE playlist_id = :playlist_id AND song_id = :song_id";
        $data = [':playlist_id' => $playlistId, ':song_id' => $songId];

        return $this->db->executeQuery($query, $data);
    }

    // Favorites and Downloads methods

    // Add a song to favorites
    public function addToFavorites($userId, $songId) {
        $query = "INSERT INTO Favorites (user_id, song_id) VALUES (:user_id, :song_id)";
        $data = [':user_id' => $userId, ':song_id' => $songId];

        return $this->db->executeQuery($query, $data);
    }

    // Remove a song from favorites
    public function removeFromFavorites($userId, $songId) {
        $query = "DELETE FROM Favorites WHERE user_id = :user_id AND song_id = :song_id";
        $data = [':user_id' => $userId, ':song_id' => $songId];

        return $this->db->executeQuery($query, $data);
    }

    // Get all favorite songs of a user
    public function getFavoriteSongs($userId) {
        $query = "SELECT * FROM Favorites WHERE user_id = :user_id";
        $data = [':user_id' => $userId];

        return $this->db->fetchAllRows($query, $data);
    }

    // Add a song download record
    public function addDownload($userId, $fileId) {
        $query = "INSERT INTO Downloads (user_id, file_id) VALUES (:user_id, :file_id)";
        $data = [':user_id' => $userId, ':file_id' => $fileId];

        return $this->db->executeQuery($query, $data);
    }

    // Play Count and Recommendations methods

    // Increase play count for a song
    public function increasePlayCount($songId) {
        $query = "UPDATE PopularSongs SET play_count = play_count + 1 WHERE song_id = :song_id";
        $data = [':song_id' => $songId];

        return $this->db->executeQuery($query, $data);
    }

    // Get popular songs based on play count
    public function getPopularSongs($limit = 10) {
        $query = "SELECT * FROM PopularSongs ORDER BY play_count DESC LIMIT :limit";
        $data = [':limit' => $limit];

        return $this->db->fetchAllRows($query, $data);
    }

    // Get popular artists based on play count
    public function getPopularArtists($limit = 10) {
        $query = "SELECT * FROM PopularArtists ORDER BY play_count DESC LIMIT :limit";
        $data = [':limit' => $limit];

        return $this->db->fetchAllRows($query, $data);
    }

    // Newly Added Songs methods

    // Get newly added songs
    public function getNewlyAddedSongs($limit = 10) {
        $query = "SELECT * FROM NewSongs ORDER BY upload_date DESC LIMIT :limit";
        $data = [':limit' => $limit];

        return $this->db->fetchAllRows($query, $data);
    }

    // Add a song to newly added songs
    public function addToNewlyAdded($songId) {
        $query = "INSERT INTO NewSongs (song_id) VALUES (:song_id)";
        $data = [':song_id' => $songId];

        return $this->db->executeQuery($query, $data);
    }

    // Remove a song from newly added songs
    public function removeFromNewlyAdded($songId) {
        $query = "DELETE FROM NewSongs WHERE song_id = :song_id";
        $data = [':song_id' => $songId];

        return $this->db->executeQuery($query, $data);
    }

    // Genre-Specific Songs methods

    // Get songs by genre
    public function getSongsByGenre($genreId, $limit = 10) {
        $query = "SELECT * FROM Songs WHERE genre_id = :genre_id LIMIT :limit";
        $data = [':genre_id' => $genreId, ':limit' => $limit];

        return $this->db->fetchAllRows($query, $data);
    }
}

// Example usage:
// $songModel = new Song();
// $uploadResult = $songModel->uploadSong($title, $artistId, $album, $genreId, $releaseDate, $filePathAudio, $songImage, $duration, $uploadedBy);
// $updateResult = $songModel->updateSong($songId, $title, $artistId, $album, $genreId, $releaseDate, $filePathAudio, $songImage, $duration);
// $deleteResult = $songModel->deleteSong($songId);
// $createPlaylistResult = $songModel->createPlaylist($playlistName, $createdBy);
// $updatePlaylistResult = $songModel->updatePlaylist($playlistId, $playlistName);
// $deletePlaylistResult = $songModel->deletePlaylist($playlistId);
// $addSongToPlaylistResult = $songModel->addSongToPlaylist($playlistId, $songId, $position);
// $removeSongFromPlaylistResult = $songModel->removeSongFromPlaylist($playlistId, $songId);
// $addToFavoritesResult = $songModel->addToFavorites($userId, $songId);
// $removeFromFavoritesResult = $songModel->removeFromFavorites($userId, $songId);
// $favoriteSongs = $songModel->getFavoriteSongs($userId);
// $addDownloadResult = $songModel->addDownload($userId, $fileId);
// $increasePlayCountResult = $songModel->increasePlayCount($songId);
// $popularSongs = $songModel->getPopularSongs($limit);
// $popularArtists = $songModel->getPopularArtists($limit);
// $newlyAddedSongs = $songModel->getNewlyAddedSongs($limit);
// $addToNewlyAddedResult = $songModel->addToNewlyAdded($songId);
// $removeFromNewlyAddedResult = $songModel->removeFromNewlyAdded($songId);
// $songsByGenre = $songModel->getSongsByGenre($genreId, $limit);
