<?php
include 'db.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sender_name = $_POST['sender_name'];  // Sender's name
    $message = $_POST['message'];  // Message content

    if (!empty($sender_name) && !empty($message)) {
        $sql = "INSERT INTO messages (sender_name, message) VALUES ('$sender_name', '$message')";

        if (mysqli_query($conn, $sql)) {
            echo "✅ Message sent!";
        } else {
            echo "❌ Error: " . mysqli_error($conn);
        }
    } else {
        echo "⚠️ Please enter your name and message!";
    }
}
?>

<!-- Message Input Form -->
<form action="send_messages.php" method="POST">
    <label>Your Name:</label>
    <input type="text" name="sender_name" required>

    <label>Message:</label>
    <textarea name="message" required></textarea>

    <link rel="stylesheet" href="style.css">
    <button type="submit">Send Message</button>
</form>

<!-- Go to Dashboard Button -->
<a href="dashboard.php"><button>🏠 Go to Dashboard</button></a>

