<?php
include '../config.php';

if (isset($_POST['done'])) {
    $program_id = $_POST['program_id'];
    $exercise_no = $_POST['exercise_no'];

    // Prepare the SQL to increment the count field by 1
    $sql = "UPDATE program_comp SET count = count + 1 WHERE program_id = ? AND exercise_no = ?";

    // Prepare statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("ii", $program_id, $exercise_no);

        // Execute the query
        if ($stmt->execute()) {
            echo "Count updated successfully!";
            header("Location: user_dashboard.php");
            exit;
        } else {
            echo "Error updating count: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing query: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
