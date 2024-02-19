<?php

class Download {
    private $db;

    public function __construct() {
        // Create a new instance of the Database class
        $this->db = new Database();
    }

    // Download-related methods

    // Get user downloads
    public function getUserDownloads($userId) {
        $query = "SELECT Downloads.download_id, Downloads.download_date, User_Files.file_id, User_Files.file_type, User_Files.file_path
                  FROM Downloads
                  JOIN User_Files ON Downloads.file_id = User_Files.file_id
                  WHERE Downloads.user_id = :user_id
                  ORDER BY Downloads.download_date DESC";

        $data = [':user_id' => $userId];

        return $this->db->fetchAllRows($query, $data);
    }
}

// Example usage:
// $downloadModel = new Download();
// $userDownloads = $downloadModel->getUserDownloads($userId);
