<?php
session_start();
include 'db.php';

if (!isset($_SESSION["agency_id"])) {
    header("Location: login.php");
    exit();
}

$agency_id = $_SESSION["agency_id"];

// Get all registered agencies
$agencies_sql = "SELECT id, name FROM agencies";
$agencies_result = $conn->query($agencies_sql);

// Get all equipment needed by other agencies
$equipment_sql = "SELECT agencies.name AS agency_name, equipment.equipment_name, equipment.quantity, equipment.needed FROM equipment 
                  JOIN agencies ON equipment.agency_id = agencies.id WHERE equipment.needed = 1";
$equipment_result = $conn->query($equipment_sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $equipment_name = $_POST["equipment_name"];
    $quantity = $_POST["quantity"];
    $needed = isset($_POST["needed"]) ? 1 : 0;

    $sql = "INSERT INTO equipment (agency_id, equipment_name, quantity, needed) VALUES ('$agency_id', '$equipment_name', '$quantity', '$needed')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p class='success'>Equipment added successfully! <a href='dashboard.php'>Go to Dashboard</a></p>";
    } else {
        echo "<p class='error'>Error: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Equipment</title>
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
            background: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .equipment-box {
            background: #d1e7ff;
            padding: 15px;
            margin: 10px 0;
            border-left: 5px solid blue;
            border-radius: 8px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }

        .equipment-box strong {
            color: #004085;
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
<body class="add-equipment-page">

    <div class="dashboard-buttons">
        <a href="dashboard.php" class="btn">Dashboard</a>
    </div>

    <div class="container">
        <!-- Left Section: Add Equipment Form -->
        <div class="left-section">
            <h1>Add Equipment</h1>
            <form method="POST">
                <label>Equipment Name:</label>
                <input type="text" name="equipment_name" required><br>

                <label>Quantity:</label>
                <input type="number" name="quantity" required><br>

                <label>Needed (Check if requesting this equipment):</label>
                <input type="checkbox" name="needed" value="1"><br>

                <button type="submit">Submit</button>
            </form>
        </div>

        <!-- Right Section: Equipment Needed by Other Agencies -->
        <div class="right-section">
            <h2>Equipment Needed by Other Agencies</h2>
            <?php while ($row = $equipment_result->fetch_assoc()) { ?>
                <div class="equipment-box">
                    <strong><?php echo $row['agency_name']; ?></strong> needs:  
                    <p><strong>Equipment:</strong> <?php echo $row['equipment_name']; ?></p>
                    <p><strong>Quantity Needed:</strong> <?php echo $row['quantity']; ?></p>
                </div>
            <?php } ?>
        </div>
    </div>

</body>
</html>
