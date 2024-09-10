<?php
include '../config.php';

// Check if the current day is within the first 10 days of the month
$currentDay = date('j'); // 'j' returns the day of the month without leading zeros
if ($currentDay <= 10) {
  // Begin transaction
  $conn->begin_transaction();

  try {
    // Update all payments with status 'Paid' to 'Due'
    $stmt = $conn->prepare("UPDATE payment SET status = 'Due' WHERE status = 'Paid'");
    if (!$stmt) {
      throw new Exception("Failed to prepare statement: " . $conn->error);
    }
    if (!$stmt->execute()) {
      throw new Exception("Failed to update payment statuses: " . $stmt->error);
    }

    // Commit transaction
    $conn->commit();
  } catch (Exception $e) {
    // Rollback transaction in case of error
    $conn->rollback();
    echo '<p class="text-red-500">Error: ' . $e->getMessage() . '</p>';
  }
}

// Fetch and display the payment data
$sql = "
SELECT u.id, u.name, u.email, p.status
FROM users u
LEFT JOIN payment p ON u.id = p.id
WHERE u.role = 'user'
";
$result = $conn->query($sql);

?>

<div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md bg-clip-border rounded-xl">
  <table class="w-full text-left table-auto min-w-max">
    <thead>
      <tr>
        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Name
          </p>
        </th>
        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Email
          </p>
        </th>
        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Status
          </p>
        </th>
        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70"></p>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<tr class="even:bg-blue-gray-50/50">';
          echo '<td class="p-4">';
          echo '<p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">' . htmlspecialchars($row['name']) . '</p>';
          echo '</td>';
          echo '<td class="p-4">';
          echo '<p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">' . htmlspecialchars($row['email']) . '</p>';
          echo '</td>';
          echo '<td class="p-4">';
          echo '<p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">' . htmlspecialchars($row['status'] ?? 'Null') . '</p>';
          echo '</td>';
          echo '<td class="p-4">';
          echo '<a href="../views/admins/actions/mark_as_paid.php?id=' . htmlspecialchars($row['id']) . '" class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">Mark as Paid</a>';
          echo '</td>';
          echo '</tr>';
        }
      } else {
        echo '<tr><td colspan="4" class="p-4 text-center">No records found</td></tr>';
      }

      $conn->close();
      ?>
    </tbody>
  </table>
</div>