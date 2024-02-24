<!-- genres.php -->

<h1>Genres</h1>

<?php 

// Get list of genres
$genres = $genreModel->getGenres();

foreach ($genres as $genre) {

    echo "<div class='genre-section'>";

    echo "<h2>" . $genre['name'] . "</h2>";

    // Get 12 songs for this genre
    $songs = $songController->getByGenre($genre['id'], 12);

    // Display song cards
    foreach ($songs as $song) {
        include 'components/song-card.php';
    }

    // Link to view more for this genre
    echo "<a href='/genre/" . $genre['id'] . "' class='view-more'>View More</a>";

    echo "</div>";
}

?>
