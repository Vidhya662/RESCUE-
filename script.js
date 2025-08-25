document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById("map")) {
        var map = L.map("map").setView([20, 78], 5);
        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: "&copy; OpenStreetMap contributors"
        }).addTo(map);

        // Fetch agencies only if the user is logged in
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
    }
});
