<?php

class File {
    private $db;

    public function __construct() {
        // Create a new instance of the Database class
        $this->db = new Database();
    }

    // Store user file information in the database
    public function storeUserFile($userId, $fileName, $filePath) {
        $query = "INSERT INTO UserFiles (user_id, file_name, file_path) VALUES (:user_id, :file_name, :file_path)";
        $data = [':user_id' => $userId, ':file_name' => $fileName, ':file_path' => $filePath];

        return $this->db->executeQuery($query, $data);
    }

    // Get user files by user ID
    public function getUserFiles($userId) {
        $query = "SELECT * FROM UserFiles WHERE user_id = :user_id";
        $data = [':user_id' => $userId];

        return $this->db->fetchAllRows($query, $data);
    }

    // Update user file information
    public function updateUserFile($fileId, $newFileName, $newFilePath) {
        $query = "UPDATE UserFiles SET file_name = :new_file_name, file_path = :new_file_path WHERE file_id = :file_id";
        $data = [':new_file_name' => $newFileName, ':new_file_path' => $newFilePath, ':file_id' => $fileId];

        return $this->db->executeQuery($query, $data);
    }

    // Delete user file by file ID
    public function deleteUserFile($fileId) {
        $query = "DELETE FROM UserFiles WHERE file_id = :file_id";
        $data = [':file_id' => $fileId];

        return $this->db->executeQuery($query, $data);
    }

    // Store user video information in the database
    public function storeUserVideo($userId, $videoName, $videoPath) {
        $query = "INSERT INTO UserVideos (user_id, video_name, video_path) VALUES (:user_id, :video_name, :video_path)";
        $data = [':user_id' => $userId, ':video_name' => $videoName, ':video_path' => $videoPath];

        return $this->db->executeQuery($query, $data);
    }

    // Get user videos by user ID
    public function getUserVideos($userId) {
        $query = "SELECT * FROM UserVideos WHERE user_id = :user_id";
        $data = [':user_id' => $userId];

        return $this->db->fetchAllRows($query, $data);
    }

    // Update user video information
    public function updateUserVideo($videoId, $newVideoName, $newVideoPath) {
        $query = "UPDATE UserVideos SET video_name = :new_video_name, video_path = :new_video_path WHERE video_id = :video_id";
        $data = [':new_video_name' => $newVideoName, ':new_video_path' => $newVideoPath, ':video_id' => $videoId];

        return $this->db->executeQuery($query, $data);
    }

    // Delete user video by video ID
    public function deleteUserVideo($videoId) {
        $query = "DELETE FROM UserVideos WHERE video_id = :video_id";
        $data = [':video_id' => $videoId];

        return $this->db->executeQuery($query, $data);
    }

    // Additional file-related methods can be added based on project requirements
}

?>
