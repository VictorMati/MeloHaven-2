<!-- genre.php -->

<?php

// Get genre details
$genre = $genreController->getGenreDetails($genreId);

// Default sort is by popularity  
$sort = $_GET['sort'] ?? 'popularity';

// Default order is descending
$order = $_GET['order'] ?? 'desc';

// Page number
$page = $_GET['page'] ?? 1;

// Items per page
$limit = 12;

// Calculate offset for pagination
$offset = ($page - 1) * $limit;

// Get filtered, sorted songs
$genreSongs = $songController->getSongsByGenre(
    $genreId,
    $limit,
    $offset,
    $sort,
    $order
);

// Get total count for pagination
$totalSongs = $songController->getTotalSongsByGenre($genreId);

?>


<!-- Genre banner -->

<div class="genre-header">

    <!-- Pagination links -->

    <div class="pagination">
        <?php if ($page > 1) : ?>
            <a href="?page=<?php echo $page - 1; ?>">Prev</a>
        <?php endif; ?>

        <?php if ($totalSongs > ($page * $limit)) : ?>
            <a href="?page=<?php echo $page + 1; ?>">Next</a>
        <?php endif; ?>
    </div>

    <!-- Sorting links -->

    <div class="sort">
        <a href="?sort=name">Name</a>
        <a href="?sort=popularity">Popularity</a>
        <a href="?sort=release_date">Release Date</a>
    </div>

</div>


<!-- Display song cards -->

<?php foreach ($genreSongs as $song) : ?>
    <?php include 'components/song-card.php' ?>
<?php endforeach; ?>