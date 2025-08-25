<?php
$host = "localhost";  // XAMPP default
$user = "root";       // Default MySQL username
$pass = "";           // Default password (empty in XAMPP)
$dbname = "rescue_db"; // Database name

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "rescue_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

