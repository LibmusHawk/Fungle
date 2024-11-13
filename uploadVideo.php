<?php
require 'db.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $videoTitle = $_POST['video_title'];
    $videoDescription = $_POST['video_description'];
    $videoFile = $_FILES['video_file'];
    $thumbnailFile = $_FILES['thumbnail'];

    // Define only filenames for database and full paths for storage
    $videoFilename = basename($videoFile['name']);         // Only the filename for the database
    $thumbnailFilename = basename($thumbnailFile['name']); // Only the filename for the database
    $videoPath = 'uploads/' . $videoFilename;              // Full path for storage
    $thumbnailPath = 'uploads/' . $thumbnailFilename;      // Full path for storage

    // Move files to "uploads" and store filenames in database
    if (move_uploaded_file($videoFile['tmp_name'], $videoPath) && 
        move_uploaded_file($thumbnailFile['tmp_name'], $thumbnailPath)) {

        // Insert video metadata into the database
        $stmt = $conn->prepare("INSERT INTO videos (video_title, video_description, video_file, thumbnail) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $videoTitle, $videoDescription, $videoFilename, $thumbnailFilename);

        if ($stmt->execute()) {
            // Redirect back to the video upload page
            header('Location: uploadVideoPage.php');
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Failed to upload video or thumbnail.";
    }
}
?>
