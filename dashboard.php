<?php
session_start();
if (!isset($_SESSION["agency_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <body class="dashboard-page">

</head>
<body>

    <h1>Rescue Agency Dashboard</h1>

    <div class="dashboard-buttons">
        <a href="view_map.php" class="btn">View Map</a>
        <a href="view_agencies.php"class="btn">view agency registered</a>
        <a href="add_calamity.php" class="btn">Add Calamity</a>
        <a href="add_equipment.php" class="btn">Add Equipment</a>
        <a href="logout.php" class="btn logout">Logout</a>
   
<div class="box">
    <h3>Feedback</h3>
    <a href="feedback.php"><button class="btn">Submit Feedback</button></a>
    <a href="view_feedback.php"><button class="btn">View Feedback</button></a>
</div>
<div class="box">
    <h3>📩 Messages</h3>
    <a href="send_messages.php"><button class="btn">Send Message</button></a>
    <a href="get_messages.php"><button class="btn">View Messages</button></a>
    <a href="about_us.php">About Us</a>


</div>

    </div>

</body>
</html>
<?php
