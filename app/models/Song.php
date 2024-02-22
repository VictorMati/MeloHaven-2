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
}

// Example usage:
// $songModel = new Song();
// $uploadResult = $songModel->uploadSong($title, $artistId, $album, $genreId, $releaseDate, $filePathAudio, $songImage, $duration, $uploadedBy);
// $updateResult = $songModel->updateSong($songId, $title, $artistId, $album, $genreId, $releaseDate, $filePathAudio, $songImage, $duration);
// $deleteResult = $songModel->deleteSong($songId);



// Delete a song and its related information
// public function deleteSong($songId) {
//     // Start a database transaction to ensure atomicity
//     $this->db->beginTransaction();

//     try {
//         // Delete the song from the Songs table
//         $querySong = "DELETE FROM Songs WHERE song_id = :song_id";
//         $dataSong = [':song_id' => $songId];
//         $this->db->executeQuery($querySong, $dataSong);

//         // Delete related information from other tables (adjust table names and relationships as per your schema)
//         $queryRelatedInfo1 = "DELETE FROM SongRelatedTable1 WHERE song_id = :song_id";
//         $dataRelatedInfo1 = [':song_id' => $songId];
//         $this->db->executeQuery($queryRelatedInfo1, $dataRelatedInfo1);

//         $queryRelatedInfo2 = "DELETE FROM SongRelatedTable2 WHERE song_id = :song_id";
//         $dataRelatedInfo2 = [':song_id' => $songId];
//         $this->db->executeQuery($queryRelatedInfo2, $dataRelatedInfo2);

//         // Commit the transaction if all queries are successful
//         $this->db->commit();

//         return true;
//     } catch (Exception $e) {
//         // Rollback the transaction if any query fails
//         $this->db->rollback();

//         return false;
//     }
// }
