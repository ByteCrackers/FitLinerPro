<?php
include '../../config.php'; // Include the database connection file

// Get the user_id from request (e.g., from URL parameters or POST data)
$user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;

// SQL query to fetch recent payments for a specific user
$sql = "SELECT payment_month, payment_date, amount FROM payment WHERE user_id = ? ORDER BY payment_date DESC LIMIT 5"; // Adjust table name and column names as necessary

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_id); // Bind the user_id parameter
$stmt->execute();
$result = $stmt->get_result();

$payments = []; // Array to store payment data

while ($row = $result->fetch_assoc()) {
    $payments[] = $row; // Add each row to the array
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($payments);

// Close connection
$stmt->close();
$conn->close();
?>
