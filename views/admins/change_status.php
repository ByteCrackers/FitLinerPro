<?php
include '../../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = intval($_POST['user_id']);
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE users SET status = ? WHERE id = ?");
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param('si', $status, $user_id);

    if ($stmt->execute()) {
        header("Location: ../../public/admin_dashboard.php?active=users"); 
    } else {
        die("Error executing query: " . $stmt->error);
    }

    $stmt->close();
}
$conn->close();
?>
