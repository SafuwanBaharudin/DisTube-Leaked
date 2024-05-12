<!-- outbox.php -->

<?php 
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // Insert the message into the messages table
    $sql = "INSERT INTO messages (sender_name, sender_email, message) VALUES ('$name', '$email', '$message')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='container'>";
        echo "<h2>Message Sent</h2>";
        echo "<p>Your message has been sent successfully.</p>";
        echo "</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
?>

<div class="container">
    <h2>Contact Me</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label for="name">Your Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Your Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
</div>

<?php 
} // End of else block

// Close the database connection
$conn->close();

include 'footer.php'; 
?>
