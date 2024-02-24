// song-card.php

<?php

$song = $params['song']; // array containing song data

?>

<div class="song-card">
  <img src="<?php echo $song['image']; ?>" alt="<?php echo $song['title']; ?>">

  <div class="song-info">
    <a href="/songs/<?php echo $song['id']; ?>"><?php echo $song['title']; ?></a>
    <p><?php echo $song['artist']; ?></p>
    <p><?php echo $song['release_date']; ?></p>
  </div>
</div>
