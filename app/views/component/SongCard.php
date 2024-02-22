<!-- song_card.php -->

<div class="song-card">
    <?php
    // Check if dynamic details are available
    if ($dynamicDetailsAvailable) {
        echo '<img src="' . $songImageURL . '" alt="Song Image">';
        echo '<div class="song-details">';
        echo '<h3>' . $songTitle . '</h3>';
        echo '<p>' . $artist . '</p>';
        echo '<p>' . $releaseYear . '</p>';
        echo '</div>';
    } else {
        // Use default or static content
        echo '<img src="/public/images/default_song_image.jpg" alt="Default Song Image">';
        echo '<div class="song-details">';
        echo '<h3>Default Song Title</h3>';
        echo '<p>Default Artist</p>';
        echo '<p>Default Release Year</p>';
        echo '</div>';
    }
    ?>
</div>
