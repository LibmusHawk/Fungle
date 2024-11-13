<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $music_title = $_POST['music_title'];
    $music_description = $_POST['music_description'];
    $user_id = $_SESSION['user_id'];

    // Handle file upload
    $music_file = $_FILES['music_file']['name'];
    $music_tmp = $_FILES['music_file']['tmp_name'];
    move_uploaded_file($music_tmp, "uploads/$music_file");

    $cover_image = $_FILES['cover_image']['name'];
    $cover_tmp = $_FILES['cover_image']['tmp_name'];
    move_uploaded_file($cover_tmp, "uploads/$cover_image");

    // Insert into the database
    $sql = "INSERT INTO music (user_id, music_title, music_description, music_file, cover_image) 
            VALUES ('$user_id', '$music_title', '$music_description', '$music_file', '$cover_image')";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: musicPage.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
