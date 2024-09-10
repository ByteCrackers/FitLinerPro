<?php
// update-attendance.php

// Include database configuration
include('../config.php');

// Get the checked attendance IDs
$attendanceIds = $_POST['attendance'] ?? [];

// Prepare SQL statement
$sql = "INSERT INTO attendance (user_id, attendance) VALUES (?, 1) 
        ON DUPLICATE KEY UPDATE attendance = attendance + 1";

if ($stmt = $conn->prepare($sql)) {
    foreach ($attendanceIds as $userId) {
        $stmt->bind_param('i', $userId);
        $stmt->execute();
    }

    // Close the statement
    $stmt->close();
} else {
    // Handle SQL prepare error
    echo json_encode(['success' => false, 'error' => $conn->error]);
    exit();
}

// Close the connection
$conn->close();

// Return a success response
header('Content-Type: application/json');
echo json_encode(['success' => true]);
?>
