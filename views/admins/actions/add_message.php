<?php
// Include database configuration
include '../../../admin-config.php';

// Initialize variables
$sender = $message = '';
$errors = [];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get and sanitize form input
    $sender = trim($_POST['sender']);
    $message = trim($_POST['message']);

    // Validate input
    if (empty($sender)) {
        $errors[] = 'Sender is required.';
    }
    if (empty($message)) {
        $errors[] = 'Message cannot be empty.';
    }

    // If no errors, insert the message into the database
    if (empty($errors)) {
        $sql = "INSERT INTO message (date, sender, message) VALUES (NOW(), ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $sender, $message);
        if ($stmt->execute()) {
            header('Location: ../../../public/admin_dashboard.php?active=inbox'); // Redirect to the list of messages
            exit();
        } else {
            $errors[] = 'Failed to add message.';
        }
        $stmt->close();
    }
}

$conn->close();
?>