<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Fetch music uploads
$musicQuery = "SELECT * FROM music";
$musicResult = $conn->query($musicQuery);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Music Uploads</title>
    <link rel="stylesheet" href="style2.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/Fungle_logo.png">
</head>
<body>
    <!-- Header with Logo -->
    <header class="main-header">
        <div class="logo">
        <a href="index.php"><img src="images/Fungle_logo.png"></a>
        </div>
        <h1>Upload Music</h1>
        <nav>
        <a href="musicPage.php" class="btn-upload">Back</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <!-- Main Content Section -->
    <div class="container">
        <h2>Upload Your Music</h2>
        <form action="upload.php" method="POST" enctype="multipart/form-data" class="upload-form">
            <input type="text" name="music_title" placeholder="Music Title" required><br>
            <textarea name="music_description" placeholder="Music Description" required></textarea><br>
            <label for="music_file">Choose Music File:</label>
            <input type="file" name="music_file" required><br>
            <label for="cover_image">Choose Cover Image:</label>
            <input type="file" name="cover_image" required><br>
            <button type="submit" class="btn-upload">Upload Music</button>
        </form>

        <h2>Uploaded Music</h2>
        <div class="music-gallery">
            <?php while ($music = $musicResult->fetch_assoc()): ?>
                <div class="music-item">
                    <img src="uploads/<?php echo $music['cover_image']; ?>" alt="Cover Image">
                    <h3><?php echo $music['music_title']; ?></h3>
                    <p><?php echo $music['music_description']; ?></p>
                    <audio controls>
                        <source src="uploads/<?php echo $music['music_file']; ?>" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
