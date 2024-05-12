<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page
    header("Location: login.php");
    exit;
}

// Include the header
include 'header.php';

// Database credentials
$servername = "hosting"; // Change this to your database host
$username = "username"; // Change this to your database username
$password = "password"; // Change this to your database password
$dbname = "DisTube"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have a session variable containing the username of the currently logged-in user
// Change 'username' to the appropriate session variable name
$username = $_SESSION['username']; // Example: $_SESSION['username']

?>

<div class="container">
    <h2>View Messages</h2>
    <?php
    // Select messages from the messages table excluding messages sent by the currently logged-in user
    $sql = "SELECT sender_name, sender_email, message
            FROM messages
            WHERE sender_name <> '$username'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>Name:</strong> " . $row["sender_name"] . "</p>";
            echo "<p><strong>Email:</strong> " . $row["sender_email"] . "</p>";
            echo "<p><strong>Message:</strong> " . $row["message"] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "No messages yet.";
    }
    ?>
</div>

<?php
// Close the database connection
$conn->close();

// Include the footer
include 'footer.php';
?>
