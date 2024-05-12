<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate the form data here
    
    // Process the form data here (e.g., send invitations, update database, etc.)
    
    // Redirect the user to a thank you page or back to the main page
    header("Location: thank_you_page.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invite Friends</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<main>
    <h2>Invite Friends</h2>
    <p>Share the link to invite your friends to join our video sharing website!</p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <!-- Your form fields for inviting friends (e.g., email addresses, message) -->
        <label for="friend_email">Friend's Email:</label>
        <input type="email" id="friend_email" name="friend_email" required><br><br>
        
        <label for="message">Your Message:</label><br>
        <textarea id="message" name="message" rows="4" cols="50"></textarea><br><br>
        
        <input type="submit" value="Send Invitation">
    </form>
</main>

<?php include 'footer.php'; ?>

</body>
</html>
