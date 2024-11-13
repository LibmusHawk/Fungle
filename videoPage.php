<?php
require 'db.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Handle search query
$searchQuery = '';
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
}

// Fetch videos based on search query
$videoQuery = "SELECT * FROM videos WHERE video_title LIKE '%$searchQuery%' OR video_description LIKE '%$searchQuery%'";
$videoResult = $conn->query($videoQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fungle Videos</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="icon" type="image/x-icon" href="images/Fungle_logo.png">
</head>
<body>
    <!-- Header with Logo and Navigation -->
    <header class="main-header">
        <div class="logo">
            <a href="index.php"><img src="images/Fungle_logo.png" alt="Fungle Logo"></a>
        </div>
        <h1>Fungle Videos</h1>
        <button class="nav-toggle" aria-label="Toggle navigation">☰</button>
        <nav>
            <button id="dark-mode-button" class="dark-mode-toggle">
                <span class="toggle-circle"></span>
                <span class="toggle-text">Light Mode</span>
            </button>
            <a href="index.php" class="btn-upload">Back</a>
            <a href="uploadVideoPage.php" class="btn-upload">Upload Video</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <!-- Search Bar -->
    <div class="search-container">
        <form action="videoPage.php" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search for videos..." value="<?php echo htmlspecialchars($searchQuery); ?>">
            <button type="submit" class="btn-search">Search</button>
        </form>
    </div>

    <!-- Main Content Section -->
    <div class="container">
        <h2>All Videos</h2>
        <div class="video-gallery">
            <?php if ($videoResult->num_rows > 0): ?>
                <?php while ($video = $videoResult->fetch_assoc()): ?>
                    <div class="video-item">
                        <div class="video-thumbnail">
                            <video controls>
                                <source src="uploads/<?php echo $video['video_file']; ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="video-description">
                            <h3><?php echo $video['video_title']; ?></h3>
                            <p><?php echo $video['video_description']; ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No videos found.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
