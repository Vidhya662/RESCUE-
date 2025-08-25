<form action="submit_feedback.php" method="POST">
    <label>Agency name</label>
    <input type="text" name="agency name" required>
    
    <label>Your Name:</label>
    <input type="text" name="user_name" required>

    <label>Rating (1-5):</label>
    <input type="number" name="rating" min="1" max="5" required>

    <label>Comments:</label>
    <textarea name="comments"></textarea>

    <button type="submit">Submit Feedback</button>
</form>
<link rel="stylesheet" href="style.css">
