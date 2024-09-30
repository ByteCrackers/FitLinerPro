<?php
include '../../config.php'; // Include the database connection file

// SQL query to fetch program data
$sql = "SELECT program_name, month, created_date FROM schedule"; // Adjust table name and column names as necessary
$result = $conn->query($sql);

$programs = []; // Array to store program data

if ($result->num_rows > 0) {
    // Fetch each row and add to the array
    while ($row = $result->fetch_assoc()) {
        $programs[] = $row;
    }
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($programs);

// Close connection
$conn->close();
?>
