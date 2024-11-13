<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fungle</title>
    <link rel="stylesheet" href="main.css">
    <link rel="icon" type="image/x-icon" href="images/Fungle_logo.png">
</head>
<body>

    <!-- Splash Screen with Fungle Text -->
    <div class="splash-screen">
        <h1 id="fungle-text" class="fade-in">Fungle</h1>
    </div>

    <!-- Main Content Section -->
    <div class="main-content">
        <header class="main-header">
            <div class="logo">
            <a href="index.php"><img src="images/Fungle_logo.png" alt="Fungle Logo" style="border-radius: 15px;"></a>
            </div>
            <h1>Welcome to Fungle</h1>
        </header>

        <!-- Info Section -->
        <section class="intro-section">
            <h2>About Us</h2>
            <p>At Fungle, we bring music and video experiences together. Whether you're here to explore music or dive into engaging videos, we have it all. Get started by choosing a platform below.</p>
        </section>

        <!-- Two Column Layout for Links -->
        <div class="column-section">
            <div class="column music-column">
                <a href="musicPage.php">
                    <img src="images/musicIcon.png" alt="Music Icon">
                    <h3>Explore Music</h3>
                </a>
            </div>
            <div class="column video-column">
                <a href="videoPage.php">
                    <img src="images/videoIcon.png" alt="Video Icon">
                    <h3>Watch Videos</h3>
                </a>
            </div>
        </div>
    </div>

    <footer>
        <p class="copyright">© Fungle Company 2024</p>
    </footer>

    <script src="main.js"></script>
</body>
</html>
