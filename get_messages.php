<?php
include 'db.php'; // Database connection

$result = mysqli_query($conn, "SELECT * FROM messages ORDER BY sent_at ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Chat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>💬 Group Chat</h2>

<div class="chat-container">
    <div class="chat-box">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="chat-message">
                <p class="sender-name">👤 <?php echo htmlspecialchars($row['sender_name']); ?></p>
                <p class="message-content"><?php echo htmlspecialchars($row['message']); ?></p>
                <span class="timestamp"><?php echo date('h:i A', strtotime($row['sent_at'])); ?></span>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Go to Dashboard Button -->
<a href="dashboard.php"><button class="btn-dashboard">🏠 Go to Dashboard</button></a>

</body>
</html>

