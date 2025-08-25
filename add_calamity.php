<?php
session_start();
include 'db.php';

if (!isset($_SESSION["agency_id"])) {
    header("Location: login.php");
    exit();
}

// Get all registered agencies
$agencies_sql = "SELECT id, name FROM agencies";
$agencies_result = $conn->query($agencies_sql);

// Get all reported calamities
$calamities_sql = "SELECT agencies.name AS agency_name, calamities.calamity_name, calamities.calamity_date, 
                   calamities.calamity_time, calamities.severity, calamities.address FROM calamities 
                   JOIN agencies ON calamities.agency_id = agencies.id";
$calamities_result = $conn->query($calamities_sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $agency_id = $_POST["agency_id"];
    $calamity_name = $_POST["calamity_name"];
    $calamity_date = $_POST["calamity_date"];
    $calamity_time = $_POST["calamity_time"];
    $severity = $_POST["severity"];
    $address = $_POST["address"];

    $sql = "INSERT INTO calamities (agency_id, calamity_name, calamity_date, calamity_time, severity, address) 
            VALUES ('$agency_id', '$calamity_name', '$calamity_date', '$calamity_time', '$severity', '$address')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p class='success'>Calamity reported successfully! <a href='dashboard.php'>Go to Dashboard</a></p>";
    } else {
        echo "<p class='error'>Error: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Report Calamity</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            width: 90%;
            margin: auto;
        }

        .left-section {
            width: 60%;
        }

        .right-section {
            width: 35%;
            padding: 20px;
            border-radius: 10px;
        }

        .calamity-box {
            background:white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 15px;
        }

        .calamity-box h3 {
            margin: 0;
            color:red;
        }

        .success {
            color: green;
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body class="add-calamity-page">

    <div class="dashboard-buttons">
        <a href="dashboard.php" class="btn">Dashboard</a>
    </div>

    <div class="container">
        <!-- Left Section: Report Calamity Form -->
        <div class="left-section">
            <h1>Report a Calamity</h1>
            <form method="POST">
                <label>Select Agency:</label>
                <select name="agency_id" required>
                    <?php while ($row = $agencies_result->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php } ?>
                </select><br>

                <label>Calamity Name:</label>
                <input type="text" name="calamity_name" required><br>

                <label>Date:</label>
                <input type="date" name="calamity_date" required><br>

                <label>Approximate Time:</label>
                <input type="time" name="calamity_time" required><br>

                <label>Severity:</label>
                <select name="severity" required>
                    <option value="High">High</option>
                    <option value="Average">Average</option>
                    <option value="Safe">Safe</option>
                </select><br>

                <label>Address:</label>
                <input type="text" name="address" required><br>

                <button type="submit">Report Calamity</button>
            </form>
        </div>

        <!-- Right Section: Calamities Reported by Other Agencies -->
        <div class="right-section">
            <h2>Calamities Reported by Other Agencies</h2>
            <?php while ($row = $calamities_result->fetch_assoc()) { ?>
                <div class="calamity-box">
                    <h3><?php echo $row['calamity_name']; ?> (<?php echo $row['severity']; ?>)</h3>
                    <p><strong>Agency:</strong> <?php echo $row['agency_name']; ?></p>
                    <p><strong>Date & Time:</strong> <?php echo $row['calamity_date']; ?> - <?php echo $row['calamity_time']; ?></p>
                    <p><strong>Location:</strong> <?php echo $row['address']; ?></p>
                </div>
            <?php } ?>
        </div>
    </div>

</body>
</html>
