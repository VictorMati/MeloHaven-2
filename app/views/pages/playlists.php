<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
    <h1>Profile</h1>

    <?php if (isset($_SESSION['user'])) { ?>
        <p>Welcome, <?php echo $_SESSION['user']['username']; ?></p>

        <form action="/profile/update" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $_SESSION['user']['username']; ?>">

            <label for="bio">Bio:</label>
            <textarea id="bio" name="bio"><?php echo $_SESSION['user']['bio']; ?></textarea>

            <label for="profile_picture">Profile Picture:</label>
            <input type="file" id="profile_picture" name="profile_picture">

            <input type="submit" value="Update Profile">
        </form>

        <a href="/profile/downloads">View Downloads</a>

        <hr>

        <h2>Friends</h2>

        <ul>
            <?php foreach ($friends as $friend) { ?>
                <li><?php echo $friend['username']; ?></li>
            <?php } ?>
        </ul>

        <hr>

        <h2>Recent Activity</h2>

        <ul>
            <?php foreach ($recent_activity as $activity) { ?>
                <li><?php echo $activity['description']; ?></li>
            <?php } ?>
        </ul>

        <hr>

        <h2>Playlists</h2>

        <?php foreach ($playlists as $playlist) { ?>
            <h3><?php echo $playlist['playlist_name']; ?></h3>

            <ul>
                <?php foreach ($playlist['songs'] as $song) { ?>
                    <li><?php echo $song['song_name']; ?></li>
                <?php } ?>
            </ul>

            <a href="/playlists/<?php echo $playlist['playlist_id']; ?>">View all</a>

            <hr>
        <?php } ?>

    <?php } else { ?>
        <p>You are not logged in.</p>
        <a href="/login">Log in</a>
    <?php } ?>

</body>
</html>
