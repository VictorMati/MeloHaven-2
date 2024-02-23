<div class="song-card">
    <img src="song-image.jpg" alt="Song Image">
    <div class="song-info">
        <a href="/songs/<?php echo $song['song_id']; ?>"><?php echo $song['title']; ?></a>
        <p><?php echo $song['artist_name']; ?></p>
        <p><?php echo $song['release_date']; ?></p>
    </div>
</div>
