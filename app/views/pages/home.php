<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MeloHaven-home</title>
    <link rel="stylesheet" href="/public/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
        <div class="container">
            <nav>
                <a href="/explore">Explore</a>
                <a href="/new-releases">New Releases</a>
                <a href="/recommended">Recommended</a>
                <a href="/popular-artists">Popular Artists</a>
                <a href="/popular-songs">Popular Songs</a>
            </nav>
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
                <?php $this->load->view('cards/album', ['albums' => $newReleases]) ?>
            </section>

            <section class="recommended">
                <h2>Recommended for you</h2>
                <?php $this->load->view('cards/song', ['songs' => $recommendedMusic]) ?>
            </section>

            <section class="popular-artists">
                <h2>Popular Artists</h2>
                <?php $this->load->view('cards/artist', ['artists' => $popularArtists]) ?>
            </section>

            <section class="popular-songs">
                <h2>Popular Songs</h2>
                <?php $this->load->view('cards/song', ['songs' => $popularSongs]) ?>
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

</body>
</html>
