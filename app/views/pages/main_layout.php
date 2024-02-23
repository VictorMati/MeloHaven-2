<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MeloHaven</title>
    <link rel="stylesheet" href="/public/css/main-view.css">
    <!-- Add more CSS files as needed for specific pages -->

    <link rel="icon" href="/public/images/app_images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Add any additional external stylesheets here -->

    <!-- Add any additional script tags or external script references here -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
   <main>

    <div class="sidebar-container">
        <?php include("../component/sidebar.php"); ?>
    </div>

    <div class="main-container">
        <header>
            <?php include("../component/header.php"); ?>
        </header>

        <?php
            // Include the main content based on the requested page
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';

            $allowedPages = ['home', 'search', 'profile', 'login', 'register', 'playlist', 'favorite', 'artist_view', 'upload', 'explore', 'genres'];

            if (in_array($page, $allowedPages)) {
                include("../pages/" . $page . ".php");
            } else {
                // Handle 404 or redirect to a default page
                include 'pages/404.php';
            }
        ?>
    </div>
</main>
    <footer>
        <?php include("../component/player.php"); ?>
    </footer>
</body>
</html>