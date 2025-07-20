<?php
include '../../../admin-config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $exercise = $_POST['exercise'];
    $reps = $_POST['reps'];
    $sets = $_POST['sets'];
    $month = $_POST['month'];
    $added_by = $_POST['added_by'];
    
    // Automatically generate the current date for added_date
    $added_date = date('Y-m-d H:i:s');
    
    // Prepare the SQL statement to insert data into the schedule table
    $stmt = $conn->prepare("INSERT INTO shedule (excercise, reps, sets, month, added_by, added_date) VALUES (?, ?, ?, ?, ?, ?)");
    
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    
    // Bind parameters
    $stmt->bind_param('siisss', $exercise, $reps, $sets, $month, $added_by, $added_date);
    
    // Execute the query
    if ($stmt->execute()) {
        echo "New record added successfully!";
        // Optionally, redirect back to the form or a different page
        // header('Location: your_redirect_page.php');
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close the statement and the connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
