<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MeloHaven</title>
    <link rel="stylesheet" href="/public/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <div class="container">
            <a href="/" class="logo">MeloHaven</a>
            <nav>
                <a href="/explore">Explore</a>
                <a href="/new-releases">New Releases</a>
                <a href="/recommended">Recommended</a>
                <a href="/popular-artists">Popular Artists</a>
                <a href="/popular-songs">Popular Songs</a>
            </nav>
            <div class="search-bar">
                <form action="/search" method="get">
                    <input type="text" name="q" placeholder="Search for music...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <section class="banner">
                <div class="image">
                    <img src="images/banner.jpg" alt="MeloHaven Banner">
                </div>
                <div class="text">
                    <h1>MeloHaven</h1>
                    <p>Discover the world's best music.</p>
                    <a href="/explore" class="btn">Explore</a>
                </div>
            </section>

            <section class="new-releases">
                <h2>New Releases</h2>
                <div class="albums">
                    <?php foreach ($newReleases as $newRelease) { ?>
                        <div class="album">
                            <img src="<?php echo $newRelease['album_image']; ?>" alt="<?php echo $newRelease['album_name']; ?>">
                            <div class="info">
                                <a href="/albums/<?php echo $newRelease['album_id']; ?>"><?php echo $newRelease['album_name']; ?></a>
                                <p><?php echo $newRelease['artist_name']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </section>

            <section class="recommended">
                <h2>Recommended for you</h2>
                <div class="albums">
                    <?php foreach ($recommendedMusic as $recommendedSong) { ?>
                        <div class="album">
                            <img src="<?php echo $recommendedSong['album_image']; ?>" alt="<?php echo $recommendedSong['album_name']; ?>">
                            <div class="info">
                                <a href="/albums/<?php echo $recommendedSong['album_id']; ?>"><?php echo $recommendedSong['album_name']; ?></a>
                                <p><?php echo $recommendedSong['artist_name']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </section>

            <section class="popular-artists">
                <h2>Popular Artists</h2>
                <div class="artists">
                    <?php foreach ($popularArtists as $popularArtist) { ?>
                        <div class="artist">
                            <img src="<?php echo $popularArtist['artist_image']; ?>" alt="<?php echo $popularArtist['artist_name']; ?>">
                            <div class="info">
                                <a href="/artists/<?php echo $popularArtist['artist_id']; ?>"><?php echo $popularArtist['artist_name']; ?></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </section>

            <section class="popular-songs">
                <h2>Popular Songs</h2>
                <div class="songs">
                    <?php foreach ($popularSongs as $popularSong) { ?>
                        <div class="song">
                            <img src="<?php echo $popularSong['song_image']; ?>" alt="<?php echo $popularSong['song_name']; ?>">
                            <div class="info">
                                <a href="/songs/<?php echo $popularSong['song_id']; ?>"><?php echo $popularSong['song_name']; ?></a>
                                <p><?php echo $popularSong['artist_name']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </section>

            <div class="load-more">
                <button type="button" onclick="loadMore()">Load More</button>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2023 MeloHaven. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script src="/public/js/home.js"></script>
</body>
</html>
