<?php
include 'db.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $agency_name = $_POST['agency_name'];
    $user_name = $_POST['user_name'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];

    $sql = "INSERT INTO feedback (agency_name, user_name, rating, comments) 
            VALUES ('$agency_name', '$user_name', '$rating', '$comments')";

    if (mysqli_query($conn, $sql)) {
        echo "<h2>✅ Feedback submitted successfully!</h2>";
    } else {
        echo "<h2>❌ Error: " . mysqli_error($conn) . "</h2>";
    }
}
?>

<!-- Go to Dashboard Button -->
<a href="dashboard.php" class="btn-dashboard">🏠 Go to Dashboard</a>
<link rel="stylesheet" href="style.css">