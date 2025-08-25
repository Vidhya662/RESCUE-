<?php
session_start();
include 'db.php';

if (!isset($_SESSION["agency_id"])) {
    header("Location: login.php");
    exit();
}

// Get all registered agencies
$agencies_sql = "SELECT name, email, location_lat, location_lng FROM agencies";
$agencies_result = $conn->query($agencies_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Agencies</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            width: 90%;
            margin: auto;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #007bff;
            color: white;
        }

        .dashboard-btn {
            display: inline-block;
            padding: 10px 15px;
            margin: 20px;
            color: white;
            background: #28a745;
            text-decoration: none;
            border-radius: 5px;
        }

        .dashboard-btn:hover {
            background: #218838;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Registered Rescue Agencies</h1>
        <a href="dashboard.php" class="dashboard-btn">Go to Dashboard</a>

        <table>
            <tr>
                <th>Agency Name</th>
                <th>Email</th>
                <th>Location (Latitude, Longitude)</th>
            </tr>
            <?php while ($row = $agencies_result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['location_lat'] . ', ' . $row['location_lng']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>

</body>
</html>
