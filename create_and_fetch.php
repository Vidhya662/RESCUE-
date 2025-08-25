<?php
include 'db.php';

// Step 1: Create a table if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS test_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($table_sql) === TRUE) {
    echo "Table 'test_table' created successfully or already exists.<br>";
} else {
    die("Error creating table: " . $conn->error);
}

// Step 2: Insert sample data if the table is empty
$check_sql = "SELECT COUNT(*) AS count FROM test_table";
$result = $conn->query($check_sql);
$row = $result->fetch_assoc();
if ($row['count'] == 0) {
    $insert_sql = "INSERT INTO test_table (name, email) VALUES 
        ('John Doe', 'john@example.com'),
        ('Jane Smith', 'jane@example.com')";
    if ($conn->query($insert_sql) === TRUE) {
        echo "Sample data inserted successfully.<br>";
    } else {
        die("Error inserting data: " . $conn->error);
    }
}

// Step 3: Fetch and display all data
$fetch_sql = "SELECT * FROM test_table";
$result = $conn->query($fetch_sql);

echo "<h2>Stored Data in test_table</h2>";
echo "<table border='1'>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Created At</th>
</tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['created_at']}</td>
    </tr>";
}

echo "</table>";

$conn->close();
?>
