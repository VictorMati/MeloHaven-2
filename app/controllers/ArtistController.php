<?php

class ArtistController {
    private $artistModel;

    public function __construct() {
        // Initialize the Artist model
        $this->artistModel = new Artist();
    }

    // Fetch artist information by artist ID
    public function getArtistInfo($artistId) {
        // Get artist information from the model
        $artistInfo = $this->artistModel->getArtistInfo($artistId);

        // Display or process artist information as needed
        return $artistInfo;
    }

    // Fetch all artists
    public function getAllArtists() {
        // Get all artists from the model
        $allArtists = $this->artistModel->getAllArtists();

        // Display or process all artists as needed
        return $allArtists;
    }

    // Create a new artist
    public function createArtist($artistName, $artistImage) {
        // Create a new artist using the model
        $createResult = $this->artistModel->createArtist($artistName, $artistImage);

        // Return the result of the creation process
        return $createResult;
    }

    // Update artist information
    public function updateArtist($artistId, $artistName, $artistImage) {
        // Update artist information using the model
        $updateResult = $this->artistModel->updateArtist($artistId, $artistName, $artistImage);

        // Return the result of the update process
        return $updateResult;
    }

    // Delete an artist
    public function deleteArtist($artistId) {
        // Delete an artist using the model
        $deleteResult = $this->artistModel->deleteArtist($artistId);

        // Return the result of the deletion process
        return $deleteResult;
    }
}
