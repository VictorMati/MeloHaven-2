// search.php

<?php

// Get search query 
$searchQuery = $_GET['q'];

// Get search results
$searchResults = $searchModel->search($searchQuery); 

?>

<h1>Search Results</h1>

<?php if (count($searchResults) > 0): ?>

  <p>Showing results for '<?php echo $searchQuery; ?>':</p>

  <?php foreach ($searchResults as $song): ?>

    <?php 
      // Pass song data to reusable component
      $params = ['song' => $song];
      include 'components/song-card.php'; 
    ?>

  <?php endforeach; ?>

<?php else: ?>

  <p>No results found for '<?php echo $searchQuery; ?>'.</p>

<?php endif; ?>
