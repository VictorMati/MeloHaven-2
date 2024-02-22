<!-- header.php -->
<link rel="stylesheet" href="/public/css/Header.css">

<header>
    <div class="sidebar-toggle">
        <!-- Add your sidebar open/close icon here -->
        <i class="fas fa-bars" aria-hidden="true"></i>
    </div>

    <nav class="navigation-links">
        <a href="?page=music">Music</a>
        <a href="?page=movies">Movies</a>
        <a href="?page=games">Games</a>
    </nav>

    <div class="search-bar">
        <form action="?page=search" method="GET">
            <input type="text" id="search-input" name="q" placeholder="Search for songs" autocomplete="off">
            <button type="submit" aria-label="Search"><i class="fas fa-search" aria-hidden="true"></i></button>
        </form>
    </div>

    <div class="user-profile">
        <?php if ($userController->isUserLoggedIn()) : ?>
            <img src="<?php echo $userModel->getProfilePicture($_SESSION['user_id']); ?>" alt="User Avatar">
            <span class="username">
                <?php echo $_SESSION['username'] ?? 'Guest'; ?>
                <div class="dropdown-menu">
                    <a href="?page=profile"><i class="fas fa-user" aria-hidden="true"></i> Profile</a>
                    <a href="?page=notifications"><i class="fas fa-bell" aria-hidden="true"></i> Notifications</a>
                    <a href="?page=settings"><i class="fas fa-cog" aria-hidden="true"></i> Settings</a>
                    <a href="?page=logout"><i class="fas fa-sign-out-alt" aria-hidden="true"></i> Logout</a>
                </div>
            </span>
        <?php else : ?>
            <a href="?page=login">Login</a>
            <a href="?page=register">Register</a>
        <?php endif; ?>
    </div>

    <!-- Add your JavaScript code for dropdown menu here -->
    <script src="path/to/dropdown.js"></script>
</header>
