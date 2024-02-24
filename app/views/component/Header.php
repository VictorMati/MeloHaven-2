<!-- header.php -->
<link rel="stylesheet" href="/public/css/header.css"> 
<!-- header.php -->

<header>

    <div class="logo">
        <a href="/">
            <img src="/images/logo.png" alt="Logo">
        </a>
    </div>

    <nav>
        <a href="/">Home</a>
        <a href="/songs">Songs</a>
        <a href="/artists">Artists</a>
        <a href="/albums">Albums</a>
    </nav>

    <div class="search-bar">
        <form action="/search" method="GET">
            <input type="text" name="query" placeholder="Search...">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>

    <div class="user-profile">

        <?php
        // Require the UserController
        require_once 'C:\Users\hp\Documents\GitHub\MeloHaven-2\app\controllers\UserController.php';

        $userController = new UserController();

        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        ?>

            <div class="dropdown">
                <a href="#"><?= $user->username ?></a>
                <div class="dropdown-content">
                    <a href="/profile">Profile</a>
                    <a href="/logout">Logout</a>
                </div>
            </div>

        <?php } else { ?>

            <a href="/login">Login</a>
            <a href="/register" class="btn">Sign Up</a>

        <?php } ?>

    </div>
</header>

</header>
