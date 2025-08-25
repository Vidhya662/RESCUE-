<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM feedback ORDER BY submitted_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Feedback</title>
    <link rel="stylesheet" href="style.css"> <!-- Linking CSS -->
</head>
<body>

<h2>📊 Feedback from Users</h2>

<div class="feedback-container">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="feedback-box">
            <p><strong>👤 <?php echo htmlspecialchars($row['user_name']); ?></strong></p>
            <p>⭐ Rating: <?php echo htmlspecialchars($row['rating']); ?>/5</p>
            <p>💬 "<?php echo htmlspecialchars($row['comments']); ?>"</p>
            <p class="timestamp">🕒 <?php echo $row['submitted_at']; ?></p>
        </div>
    <?php } ?>
</div>

<!-- Go to Dashboard Button -->
<a href="dashboard.php" class="btn-dashboard">🏠 Go to Dashboard</a>

</body>
</html>


