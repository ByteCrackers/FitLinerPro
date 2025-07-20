<?php
session_start();
include '../config.php'; // include your database connection file

if (isset($_POST['week']) && isset($_POST['program_id'])) {
    $user_id = $_SESSION['user_id']; // Get user ID from session
    $program_id = $_POST['program_id']; // Get program ID from POST request
    $week = $_POST['week']; // Get week (w1, w2, etc.) from POST request

    // Validate week input to prevent SQL injection
    $allowed_weeks = ['w1', 'w2', 'w3', 'w4'];
    if (!in_array($week, $allowed_weeks)) {
        echo "Invalid week selected.";
        exit;
    }

    // Prepare the SQL query to update the specific week as completed (1)
    $sql = "UPDATE program_comp SET $week = 1 WHERE user_id = ? AND program_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $program_id); // Bind user_id and program_id to query

    if ($stmt->execute()) {
        echo "Week marked as completed successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
