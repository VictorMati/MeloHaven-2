<link rel="stylesheet" href="/public/css/sidebar.css">

<aside class="sidebar">
    <div class="logo">
        <img src="/public/assets/images/app_images/logo.jpg" alt="logo">
        <h2>Controller</h2>
    </div>

    </div>

    <nav class="sidebar-navigation">
        <div class="section">
            <h3>Browse Music</h3>
            <ul>
                <li><a href="?controller=home"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="?controller=explore"><i class="fas fa-compass"></i> Explore</a></li>
                <li><a href="?controller=genres"><i class="fas fa-music"></i> Genres</a></li>
                <li><a href="?controller=artists"><i class="fas fa-users"></i> Artists</a></li>
            </ul>
        </div>

        <div class="section">
            <h3>My Library</h3>
            <ul>
                <li><a href="?controller=recently_played"><i class="fas fa-history"></i> Recently Played</a></li>
                <li><a href="?controller=favorites"><i class="fas fa-heart"></i> Favorite Songs</a></li>
                <li><a href="?controller=playlists"><i class="fas fa-list"></i> Playlists</a></li>
            </ul>
        </div>

        <!-- Add more navigation links as needed -->
    </nav>

    <?php
    require_once("app/controllers/UserController.php");

    $auth = new UserController();

    ?>

    <div class="chat">

        <?php

        require_once("app/controllers/UserController.php");

        $auth = new UserController();

        if (isset($_SESSION['user_id'])) : ?>

            <a href="/chat">
                <i class="fas fa-comment"></i> Chat
            </a>

        <?php else : ?>

            <a href="/login">
                <i class="fas fa-comment"></i> Chat
            </a>

        <?php endif; ?>
    </div>

    </div>

    </div>

    </div>
</aside>