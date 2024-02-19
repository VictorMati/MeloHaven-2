<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MeloHaven</title>
    <link rel="stylesheet" href="/public/css/Index.css">
    <link rel="stylesheet" href="/public/css/SongCard.css">
    <link rel="stylesheet" href="/public/css/Player.css">
    <link rel="stylesheet" href="/public/css/Variables.css">
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
        <?php include("../melohaven/app/views/components/Sidebar.php"); ?>
    </div>

    <div class="main-container">
        <header>
            <?php include("../melohaven/app/Views/components/Header.php"); ?>
        </header>

        <?php
            // Include the main content based on the requested page
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';

            $allowedPages = ['home', 'search', 'profile', 'login', 'signup', 'playlist', 'favorite', 'GenreView', 'upload', 'SongView', 'downloads'];

            if (in_array($page, $allowedPages)) {
                include("../melohaven/app/Views/users/" . $page . ".php");
            } else {
                // Handle 404 or redirect to a default page
                include 'pages/404.php';
            }
        ?>
    </div>
</main>
    <footer>
        <?php include("../melohaven/app/Views/components/Player.php"); ?>
    </footer>
</body>
</html>