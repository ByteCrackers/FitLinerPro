<?php 
include '../../../admin-config.php';

if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);
    
    // Begin transaction
    $conn->begin_transaction();

    try {
        // Update payment status to 'Paid'
        $stmt = $conn->prepare("UPDATE payment SET status = 'Paid' WHERE id = ?");
        if (!$stmt) {
            throw new Exception("Failed to prepare statement: " . $conn->error);
        }
        $stmt->bind_param("i", $userId);
        if (!$stmt->execute()) {
            throw new Exception("Failed to update payment status: " . $stmt->error);
        }

        // Commit transaction
        $conn->commit();
        echo '<p class="text-green-500">Payment status updated to Paid.</p>';
        header("Location: ../../../public/admin_dashboard.php?active=payment");

    } catch (Exception $e) {
        // Rollback transaction in case of error
        $conn->rollback();
        echo '<p class="text-red-500">Error: ' . $e->getMessage() . '</p>';
    }
} else {
    echo '<p class="text-red-500">Invalid user ID.</p>';
}

$conn->close();
?>
