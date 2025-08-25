<?php
include 'db.php';

$sql = "SELECT name, email, location_lat, location_lng FROM agencies WHERE location_lat IS NOT NULL AND location_lng IS NOT NULL";
$result = $conn->query($sql);

$agencies = [];
while ($row = $result->fetch_assoc()) {
    $agencies[] = $row;
}

echo json_encode($agencies);
?>
