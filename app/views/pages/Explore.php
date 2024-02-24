<!-- explore.php -->

<h1>Explore</h1>

<h2>Mixed Genres</h2>

<?php

// Get array of random songs across genres
$mixedSongs = $songModel->getMixedSongs();

// Loop through songs and display
foreach ($mixedSongs as $song) {
  include 'components/song-card.php'; 
}

?>


<h2>Public Playlists</h2>

<?php

// Get public playlists
$publicPlaylists = $playlistModel->getPublicPlaylists();

// Display each playlist
foreach ($publicPlaylists as $playlist) {
  
  echo "<div class='playlist'>";
  echo "<h3>" . $playlist['name'] . "</h3>";
  
  // Show playlist song preview
  $playlistSongs = $playlistModel->getPlaylistSongs($playlist['id']);
  foreach (array_slice($playlistSongs, 0, 3) as $song) {
    include 'components/song-card.php';
  }
  
  echo "</div>";
  
}

?>


<h2>Top Artists</h2>

<?php

// Get top artists
$topArtists = $artistModel->getTopArtists();

// Show top 3 songs from each artist
foreach ($topArtists as $artist) {

  echo "<div class='artist'>";
  echo "<h3>" . $artist['name'] . "</h3>";

  $topSongs = $songModel->getTopSongsByArtist($artist['id'], 3);

  foreach ($topSongs as $song) {
    include 'components/song-card.php';
  }

  echo "</div>";

}

?>
