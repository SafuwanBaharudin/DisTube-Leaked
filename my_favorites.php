<?php
session_start();

// Dummy array of videos (replace this with your database query)
$videos = array(
    array("id" => 1, "title" => "Video 1"),
    array("id" => 2, "title" => "Video 2"),
    array("id" => 3, "title" => "Video 3")
);

// Dummy favorites (replace this with your session favorites)
$favorites = isset($_SESSION['favorites']) ? $_SESSION['favorites'] : array();

// Include header
include "header.php"; // Replace with your header file

echo "<h1>My Favorites</h1>";

// Display user's favorite videos
if (!empty($favorites)) {
    echo "<ul>";
    foreach ($favorites as $favoriteId) {
        foreach ($videos as $video) {
            if ($video['id'] == $favoriteId) {
                echo "<li>{$video['title']}</li>";
                break; // Stop searching once found
            }
        }
    }
    echo "</ul>";
} else {
    echo "<p>You haven't added any videos to your favorites yet.</p>";
}

// Include footer
include "footer.php"; // Replace with your footer file
?>
