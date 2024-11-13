<?php
require 'db.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Fetch video uploads
$videoQuery = "SELECT * FROM videos";
$videoResult = $conn->query($videoQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Video Uploads</title>
    <link rel="stylesheet" href="style2.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/Fungle_logo.png">
</head>
<body>
    <!-- Header with Logo -->
    <header class="main-header">
        <div class="logo">
            <a href="index.php"><img src="images/Fungle_logo.png" alt="Logo"></a>
        </div>
        <h1>Upload Video</h1>
        <nav>
            <a href="videoPage.php" class="btn-upload">Back</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <!-- Main Content Section -->
    <div class="container">
        <h2>Upload Your Video</h2>
        <form action="uploadVideo.php" method="POST" enctype="multipart/form-data" class="upload-form">
            <input type="text" name="video_title" placeholder="Video Title" required><br>
            <textarea name="video_description" placeholder="Video Description" required></textarea><br>

            <label for="video_file">Choose Video File:</label>
            <input type="file" name="video_file" accept="video/*" required><br>

            <button type="submit" class="btn-upload">Upload Video</button>
        </form>

        <h2>Uploaded Videos</h2>
        <div class="video-gallery">
            <?php while ($video = $videoResult->fetch_assoc()): ?>
                <div class="video-item">
                    <h3><?php echo $video['video_title']; ?></h3>
                    <p><?php echo $video['video_description']; ?></p>
                    <video controls>
                        <source src="uploads/<?php echo $video['video_file']; ?>" type="video/mp4">
                         Your browser does not support the video tag.
                    </video>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
