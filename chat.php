<?php
include 'db.php'; // Database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Chat</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<h2>💬 Rescue Agency Group Chat</h2>

<!-- Chat Messages Display -->
<div id="chat-box"></div>

<!-- Message Input Form -->
<form id="chat-form">
    <input type="text" id="sender_name" placeholder="Enter Your Name" required>
    <input type="text" id="message" placeholder="Type a message..." required>
    <button type="submit">Send</button>
</form>

<!-- Go to Dashboard Button -->
<a href="dashboard.php"><button>🏠 Go to Dashboard</button></a>

<script>
    // Fetch messages every 2 seconds
    function loadMessages() {
        $.ajax({
            url: "fetch_messages.php",
            method: "GET",
            success: function(data) {
                $("#chat-box").html(data);
            }
        });
    }

    // Send message using AJAX
    $("#chat-form").submit(function(e) {
        e.preventDefault();
        var sender_name = $("#sender_name").val();
        var message = $("#message").val();

        $.ajax({
            url: "send_message.php",
            method: "POST",
            data: { sender_name: sender_name, message: message },
            success: function(response) {
                $("#message").val(""); // Clear input after sending
                loadMessages(); // Reload messages instantly
            }
        });
    });

    // Load messages automatically every 2 seconds
    setInterval(loadMessages, 2000);
</script>


</body>
</html>
