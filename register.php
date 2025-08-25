<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $location_lat = $_POST["location_lat"];
    $location_lng = $_POST["location_lng"];

    $sql = "INSERT INTO agencies (name, email, password, location_lat, location_lng) 
            VALUES ('$name', '$email', '$password', '$location_lat', '$location_lng')";
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful! <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .button-container {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Register Your Agency</h1>
    
    <form method="POST">
        <label>Agency Name:</label>
        <input type="text" name="name" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <input type="hidden" name="location_lat" id="location_lat">
        <input type="hidden" name="location_lng" id="location_lng">

        <div class="button-container">
            <button type="submit">Register</button>
            <button type="button" onclick="window.location.href='login.php'">Sign up</button>
        </div>
    </form>

    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    document.getElementById("location_lat").value = position.coords.latitude;
                    document.getElementById("location_lng").value = position.coords.longitude;
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }
        getLocation();
        <a href="about_us.php">About Us</a>
    </script>
</body>
</html>


