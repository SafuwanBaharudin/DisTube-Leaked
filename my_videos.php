<!DOCTYPE html>
<html>
<head>
    <title>My Videos</title>
    <style>
        /* Add some basic CSS for styling */
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; }
        .video-list { list-style-type: none; padding: 0; }
        .video-item { margin-bottom: 10px; }
        .video-title { font-size: 18px; }
        .delete-btn { background-color: #ff0000; color: #fff; padding: 5px 10px; text-decoration: none; }
    </style>
</head>
<body>
    <?php include 'header.php'; ?> <!-- Include header -->
    <div class="container">
        <h1>My Videos</h1>
        <ul class="video-list">
            <?php
            // Start session to access session variables
            session_start();

            // Check if the user is logged in
            if (!isset($_SESSION['username'])) {
                // If not logged in, redirect to the login page
                header("Location: login.php");
                exit(); // Stop script execution
            }

            // Connect to your MySQL database
            $host = 'mysql.ct8.pl'; // Change this to your database host
            $username = 'm42766_fuck'; // Change this to your database username
            $password = 'Ad150169@@'; // Change this to your database password
            $database = 'm42766_DisTube'; // Change this to your database name

            $conn = new mysqli($host, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch videos uploaded by the logged-in user from the database
            $uploader = $_SESSION['username']; // Get the username of the logged-in user
            $sql = "SELECT VideoID, VideoName FROM videodb WHERE Uploader = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $uploader);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<li class="video-item">';
                    echo '<span class="video-title">' . $row["VideoName"] . '</span>';
                    echo '<a href="delete_video.php?id=' . $row["VideoID"] . '" class="delete-btn">Delete</a>';
                    echo '</li>';
                }
            } else {
                echo "You haven't uploaded any videos yet.";
            }

            // Close the database connection
            $conn->close();
            ?>
        </ul>
    </div>
    <?php include 'footer.php'; ?> <!-- Include footer -->
</body>
</html>
