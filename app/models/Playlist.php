<?php

class Playlist {
    private $db;

    public function __construct() {
        // Create a new instance of the Database class
        $this->db = new Database();
    }

    // Playlist-related methods

    // Create a new playlist
    public function createPlaylist($playlistName, $createdBy) {
        $query = "INSERT INTO Playlists (playlist_name, created_by) VALUES (:playlist_name, :created_by)";
        $data = [':playlist_name' => $playlistName, ':created_by' => $createdBy];

        return $this->db->executeQuery($query, $data);
    }

    // Get all playlists created by a user
    public function getPlaylistsByUser($userId) {
        $query = "SELECT * FROM Playlists WHERE created_by = :created_by";
        $data = [':created_by' => $userId];

        return $this->db->fetchAllRows($query, $data);
    }

    // Get playlist information by playlist ID
    public function getPlaylistById($playlistId) {
        $query = "SELECT * FROM Playlists WHERE playlist_id = :playlist_id";
        $data = [':playlist_id' => $playlistId];

        return $this->db->fetchSingleRow($query, $data);
    }

    // Update playlist information
    public function updatePlaylist($playlistId, $playlistName) {
        $query = "UPDATE Playlists SET playlist_name = :playlist_name WHERE playlist_id = :playlist_id";
        $data = [':playlist_name' => $playlistName, ':playlist_id' => $playlistId];

        return $this->db->executeQuery($query, $data);
    }

    // Delete a playlist
    public function deletePlaylist($playlistId) {
        $query = "DELETE FROM Playlists WHERE playlist_id = :playlist_id";
        $data = [':playlist_id' => $playlistId];

        return $this->db->executeQuery($query, $data);
    }

    // Playlist Songs methods

    // Add a song to a playlist
    public function addSongToPlaylist($playlistId, $songId, $position) {
        $query = "INSERT INTO Playlist_Songs (playlist_id, song_id, position) 
                  VALUES (:playlist_id, :song_id, :position)";
        $data = [':playlist_id' => $playlistId, ':song_id' => $songId, ':position' => $position];

        return $this->db->executeQuery($query, $data);
    }

    // Get all songs in a playlist
    public function getSongsInPlaylist($playlistId) {
        $query = "SELECT ps.position, s.* FROM Playlist_Songs ps
                  JOIN Songs s ON ps.song_id = s.song_id
                  WHERE ps.playlist_id = :playlist_id
                  ORDER BY ps.position";
        $data = [':playlist_id' => $playlistId];

        return $this->db->fetchAllRows($query, $data);
    }

    // Remove a song from a playlist
    public function removeSongFromPlaylist($playlistId, $songId) {
        $query = "DELETE FROM Playlist_Songs WHERE playlist_id = :playlist_id AND song_id = :song_id";
        $data = [':playlist_id' => $playlistId, ':song_id' => $songId];

        return $this->db->executeQuery($query, $data);
    }
}

// Example usage:
// $playlistModel = new Playlist();
// $createPlaylistResult = $playlistModel->createPlaylist($playlistName, $createdBy);
// $playlistsByUser = $playlistModel->getPlaylistsByUser($userId);
// $playlistById = $playlistModel->getPlaylistById($playlistId);
// $updatePlaylistResult = $playlistModel->updatePlaylist($playlistId, $newPlaylistName);
// $deletePlaylistResult = $playlistModel->deletePlaylist($playlistId);
// $addSongToPlaylistResult = $playlistModel->addSongToPlaylist($playlistId, $songId, $position);
// $songsInPlaylist = $playlistModel->getSongsInPlaylist($playlistId);
// $removeSongFromPlaylistResult = $playlistModel->removeSongFromPlaylist($playlistId, $songId);
