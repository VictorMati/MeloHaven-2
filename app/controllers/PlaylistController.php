<?php

class PlaylistController extends Controller{
    private $playlistModel;

    public function __construct() {
        parent::__construct();
        $this->playlistModel = $this->loadModel('Playlist');
    }

    public function index() {
        // Get all playlists
        $playlists = $this->playlistModel->getPlaylists();

        // Render the view
        $this->loadView('playlists/index', ['playlists' => $playlists]);
    }

    public function create() {
        // Render the view
        $this->loadView('playlists/create');
    }

    public function store() {
        // Get the playlist name and created by user ID from the request
        $playlistName = $_POST['playlist_name'];
        $createdBy = $_POST['created_by'];

        // Create a new playlist
        $createPlaylistResult = $this->playlistModel->createPlaylist($playlistName, $createdBy);

        // Redirect to the playlists index page
        $this->redirectTo('playlists');
    }

    public function show($playlistId) {
        // Get the playlist by ID
        $playlist = $this->playlistModel->getPlaylistById($playlistId);

        // Render the view
        $this->loadView('playlists/show', ['playlist' => $playlist]);
    }

    public function edit($playlistId) {
        // Get the playlist by ID
        $playlist = $this->playlistModel->getPlaylistById($playlistId);

        // Render the view
        $this->loadView('playlists/edit', ['playlist' => $playlist]);
    }

    public function update($playlistId) {
        // Get the playlist name from the request
        $playlistName = $_POST['playlist_name'];

        // Update the playlist
        $updatePlaylistResult = $this->playlistModel->updatePlaylist($playlistId, $playlistName);

        // Redirect to the playlist show page
        $this->redirectTo('playlists/' . $playlistId);
    }

    public function destroy($playlistId) {
        // Delete the playlist
        $deletePlaylistResult = $this->playlistModel->deletePlaylist($playlistId);

        // Redirect to the playlists index page
        $this->redirectTo('playlists');
    }
}
