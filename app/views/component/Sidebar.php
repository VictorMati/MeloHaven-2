<link rel="stylesheet" href="/public/css/Sidebar.css">

<aside class="sidebar">
    <div class="logo">
        <img src="/public/images/app_images/logo 2.jpg" alt="logo">
        <h2>melohaven</h2>
    </div>

    <nav class="sidebar-navigation">
        <div class="section">
            <h3>Browse Music</h3>
            <ul>
                <!-- Inside your navigation links loop -->
                <li <?php echo ($page === 'home') ? 'class="active"' : ''; ?>>
                    <a href="?page=home"><i class="fas fa-home"></i> Home</a>
                </li>
                <li><a href="?page=explore"><i class="fas fa-compass"></i> Explore</a></li>
                <li><a href="?page=genres"><i class="fas fa-music"></i> Genres</a></li>
                <li><a href="?page=artists"><i class="fas fa-users"></i> Artists</a></li>
            </ul>
        </div>
        
        <div class="section">
            <h3>My Library</h3>
            <ul>
                <li><a href="?page=recently_played"><i class="fas fa-history"></i> Recently Played</a></li>
                <li><a href="?page=favorites"><i class="fas fa-heart"></i> Favorite Songs</a></li>
                <li><a href="?page=playlists"><i class="fas fa-list"></i> Playlists</a></li>
            </ul>
        </div>

        <!-- Add more navigation links as needed -->
    </nav>

    <?php if (isset($_SESSION['user_id'])) : ?>
        <div class="sign">
            <a href="?page=logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    <?php else : ?>
        <div class="sign">
            <a href="?page=login"><i class="fas fa-sign-in-alt"></i> Login</a>
        </div>
    <?php endif; ?>
</aside>

