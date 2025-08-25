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
    <title>Rescue Agency Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body class="map-page">

    <h1>Rescue Agency Locations</h1>
    <a href="dashboard.php" class="btn">Go to Dashboard</a>

    <div id="map" style="height: 500px; width: 90%; margin: auto;"></div>

    <script>
        var map = L.map("map").setView([20, 78], 7); // Zoom level 7 for state-level view

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: "&copy; OpenStreetMap contributors"
        }).addTo(map);

        // Restrict zooming out beyond a certain level
        map.setMinZoom(6); // Prevents zooming out beyond state-level
        map.setMaxZoom(10); // Allows zooming in for more detail if needed

        fetch("get_agencies.php")
            .then(response => response.json())
            .then(data => {
                data.forEach(agency => {
                    L.marker([agency.location_lat, agency.location_lng])
                        .addTo(map)
                        .bindPopup(`<b>${agency.name}</b><br>Email: ${agency.email}`);
                });
            })
            .catch(error => console.error("Error fetching agencies:", error));
    </script>

</body>
</html>


