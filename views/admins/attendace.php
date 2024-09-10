<?php
// Include database configuration
include('../config.php');

// Get today's date
$today_date = date('d/m/Y');

// Fetch users and attendance data
$sql = "
    SELECT u.id, u.name, u.email, a.attendance, p.status
    FROM users u
    LEFT JOIN attendance a ON u.id = a.user_id 
    LEFT JOIN payment p ON u.id = p.id
    WHERE u.role = 'user'
";

$result = $conn->query($sql);
?>

<h3>Today Date: <?php echo $today_date; ?></h3>
<div class="flex flex-col items-end">
  <button id="update-list" class="text-white bg-blue-500 hover:bg-blue-800 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700">Update List</button>
</div>
<br>
<div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md bg-clip-border rounded-xl">
  <form id="attendance-form" method="POST">
    <table class="w-full text-left table-auto min-w-max">
      <thead>
        <tr>
          <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Name</th>
          <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Email</th>
          <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Mark</th>
          <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Attendance</th>
          <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Payment Status</th>
          <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Send Warning</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr class="even:bg-blue-gray-50/50">
            <td class="p-4"><?php echo htmlspecialchars($row['name']); ?></td>
            <td class="p-4"><?php echo htmlspecialchars($row['email']); ?></td>
            <td class="p-4">
              <input type="checkbox" name="attendance[]" value="<?php echo htmlspecialchars($row['id']); ?>">
            </td>
            <td class="p-4"><?php echo htmlspecialchars($row['attendance'] ?? '0'); ?></td>
            <td class="p-4"><?php echo htmlspecialchars($row['status'] ? $row['status'] : 'Null'); ?></td>
            <td class="p-4">
              <a href="#" class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">Send</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </form>
</div>

<script>
  $('#update-list').on('click', function() {
    var checkedItems = $('input[name="attendance[]"]:checked').map(function() {
      return $(this).val();
    }).get();

    $.ajax({
      url: 'update-attendance.php',
      method: 'POST',
      data: {
        attendance: checkedItems
      },
      success: function(response) {
        alert('Attendance updated successfully!');
        location.reload();
      },
      error: function(xhr, status, error) {
        alert('An error occurred: ' + error);
      }
    });
  });
</script>

<?php
// Close the database connection
$conn->close();
?>