<!-- Add this code to your layout where you want the player to appear -->
<div class="music-player">
    <?php
    // Assuming you have a SongController with a getCurrentSongDetails() method
    $songController = new SongController();
    $currentSong = $songController->getCurrentSongDetails();
    ?>

    <div class="currently-playing">
        <img src="<?php echo $currentSong['song_image']; ?>" alt="Active Song Image">
        <div class="song-info">
            <p class="song-title"><?php echo $currentSong['title']; ?></p>
            <p class="artist"><?php echo $currentSong['artist']; ?></p>
        </div>
    </div>

    <audio controls>
        <source src="<?php echo $currentSong['file_path_audio']; ?>" type="audio/mp3">
        Your browser does not support the audio tag.
    </audio>

    <div class="player-controls">
        <button onclick="addToFavorites('<?php echo $currentSong['song_id']; ?>', '<?php echo $currentUserId; ?>')">
            <i class="fas fa-heart"></i> Add to Favorites
        </button>
        <button onclick="addToPlaylist('<?php echo $currentSong['song_id']; ?>', '<?php echo $currentPlaylistId; ?>', '<?php echo $currentPosition; ?>')">
            <i class="fas fa-plus"></i> Add to Playlist
        </button>
        <button onclick="downloadSong('<?php echo $currentSong['song_id']; ?>', '<?php echo $currentUserId; ?>')">
            <i class="fas fa-download"></i> Download
        </button>
    </div>
</div>

<script>
    function addToFavorites(songId, userId) {
        // Call the corresponding method in SongController to add to favorites
        // Example: SongController.addToFavorites(userId, songId);
        <?php
        // Assuming you have a logged-in user with an ID (replace 1 with actual user ID)
        $userId = "userId"; // replace with actual user ID
        $songController->addToFavorites($userId, songId);
        ?>
        alert("Song added to favorites successfully.");
    }

    function addToPlaylist(songId, playlistId, position) {
        // Call the corresponding method in SongController to add to playlist
        // Example: SongController.addSongToPlaylist(playlistId, songId, position);
        <?php
        // Assuming you have a playlist ID and position (replace 1 and 1 with actual values)
        $playlistId = "playlistId"; // replace with actual playlist ID
        $position = "position"; // replace with actual position
        $songController->addSongToPlaylist($playlistId, songId, $position);
        ?>
        alert("Song added to playlist successfully.");
    }

    function downloadSong(songId, userId) {
        // Call the corresponding method in SongController to download the song
        // Example: SongController.addDownload(userId, songId);
        <?php
        // Assuming you have a logged-in user with an ID (replace 1 with actual user ID)
        $userId = "userId"; // replace with actual user ID
        $songController->addDownload($userId, songId);
        ?>
        alert("Downloaded song successfully.");
    }
</script>
