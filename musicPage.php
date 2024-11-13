<?php
    require 'db.php';
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

    // Handle search query
    $searchQuery = '';
    if (isset($_GET['search'])) {
        $searchQuery = $_GET['search'];
    }

    // Fetch music uploads based on search query
    $musicQuery = "SELECT * FROM music WHERE music_title LIKE '%$searchQuery%' OR music_description LIKE '%$searchQuery%'";
    $musicResult = $conn->query($musicQuery);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fungle</title>
    <link rel="stylesheet" href="style.css">
    <audio id="audio-player" preload="none"></audio>
    <link rel="icon" type="image/x-icon" href="images/Fungle_logo.png">
</head>
<body>
    <!-- Header with Logo and Navigation -->
    <header class="main-header">
    <div class="logo">
        <a href="index.php"><img src="images/Fungle_logo.png" alt="Fungle Logo"></a>
    </div>
    <h1>Fungle Music</h1>

    <!-- Mobile Toggle Button -->
    <button class="nav-toggle" aria-label="Toggle navigation">☰</button>

    <nav>
        <button id="dark-mode-button" class="dark-mode-toggle">
            <span class="toggle-circle"></span>
            <span class="toggle-text">Light Mode</span>
        </button>
        <a href="index.php" class="btn-upload">Back</a>
        <a href="uploadPage.php" class="btn-upload">Upload Song</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>


    <!-- Search Bar -->
    <div class="search-container">
        <form action="musicPage.php" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search for songs..." value="<?php echo htmlspecialchars($searchQuery); ?>">
            <button type="submit" class="btn-search">Search</button>
        </form>
    </div>


    <!-- Main Content Section -->
    <div class="container">
        <h2>All Music</h2>
        <div class="music-gallery">
    <?php if ($musicResult->num_rows > 0): ?>
        <?php while ($music = $musicResult->fetch_assoc()): ?>
            <div class="music-item" data-file="uploads/<?php echo $music['music_file']; ?>" data-cover="uploads/<?php echo $music['cover_image']; ?>" data-title="<?php echo $music['music_title']; ?>">
                <img src="uploads/<?php echo $music['cover_image']; ?>" alt="Cover Image">
                <h3><?php echo $music['music_title']; ?></h3>
                <p><?php echo $music['music_description']; ?></p>
                <img class="play-song-btn" src="images/playicon.png" alt="Play" style="cursor: pointer; width: 30px; height: 30px;"> <!-- Image for Play button -->
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No music found.</p>
    <?php endif; ?>
</div>

    </div>

  <!-- Music Player Section -->
<div class="music-player">
    <!-- Song Info (Cover Image + Title) -->
    <div class="song-info">
        <img id="song-cover" src="uploads/default_cover.png" alt="Song Cover" class="cover-image">
        <div id="song-title" class="song-title">Song Title</div>
    </div>

    <!-- Player Controls (Centered) -->
    <div class="controls">
        <img id="prev-btn" src="images/prevbtn.png" alt="Previous" title="Previous">
        <img id="play-pause-btn" src="images/playbtn.png" alt="Play/Pause" title="Play/Pause">
        <img id="next-btn" src="images/nextbtn.png" alt="Next" title="Next">
        <img id="loop-btn" src="images/loopbtn.png" alt="Loop" title="Loop">
    </div>

    <!-- Progress Bar + Time -->
    <div class="progress-container">
        <span id="current-time">0:00</span>
        <input id="progress-bar" type="range" min="0" max="100" value="0">
        <span id="duration">0:00</span>
    </div>

    <!-- Volume Control -->
    <div class="volume-control">
        <input id="volume-slider" type="range" min="0" max="1" step="0.01" value="1">
    </div>
</div>

    <script src="script.js"></script>
</body>
</html>
