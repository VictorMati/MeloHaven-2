<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="/public/css/profile.css">
</head>
<body>
    <h1>Profile</h1>

    <?php if (isset($_SESSION['user'])) { ?>
        <p>Welcome, <?php echo $_SESSION['user']['username']; ?></p>

        <a href="" class="edit-profile-link">Edit Profile</a>

        <div class="profile-page">
            <div class="profile-info">
                <img src="<?php echo $_SESSION['user']['profile_picture']; ?>" alt="Profile Picture">
                <p>Username: <?php echo $_SESSION['user']['username']; ?></p>
                <p>Bio: <?php echo $_SESSION['user']['bio']; ?></p>
            </div>

            <div class="profile-activity">
                <h2>Recent Activity</h2>
                <ul>
                    <?php foreach ($recent_activity as $activity) { ?>
                        <li><?php echo $activity['description']; ?></li>
                    <?php } ?>
                </ul>
            </div>

            <div class="profile-friends">
                <h2>Friends</h2>
                <ul>
                    <?php foreach ($friends as $friend) { ?>
                        <li><?php echo $friend['username']; ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <div class="edit-profile-form">
            <form action="../controllers/ProfileController.php" method="post" enctype="multipart/form-data">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $_SESSION['user']['username']; ?>">

                <label for="bio">Bio:</label>
                <textarea id="bio" name="bio"><?php echo $_SESSION['user']['bio']; ?></textarea>

                <label for="profile_picture">Profile Picture:</label>
                <input type="file" id="profile_picture" name="profile_picture">

                <input type="submit" value="Update Profile">
                <a href="" class="cancel-edit-profile-link">Cancel</a>
            </form>
        </div>

    <?php } else { ?>
        <p>You are not logged in.</p>
        <a href="../views/login.php">Log in</a>
    <?php } ?>

    <script src="/public/js/profile.js"></script>

</body>
</html>
