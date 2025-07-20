<?php 
include '../admin-config.php';
?>


<div class="flex flex-col items-end" >
    <a href="?active=add_schedules"><button type="button" class="text-white bg-blue-500 hover:bg-blue-80 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700">Add Shedule</button></a>
</div>

<div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md bg-clip-border rounded-xl">
  <table class="w-full text-left table-auto min-w-max">
    <thead>
      <tr>
        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            ID
          </p>
        </th>
        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Month
          </p>
        </th>
        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Added by
          </p>
        </th>
        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Added date
          </p>
        </th>
        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70"></p>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $sql = "SELECT id, month, added_by, added_date FROM shedule";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<tr class="even:bg-blue-gray-50/50">';
                echo '<td class="p-4">';
                echo '<p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">' . $row['id'] . '</p>';
                echo '</td>';
                echo '<td class="p-4">';
                echo '<p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">' . $row['month'] . '</p>';
                echo '</td>';
                echo '<td class="p-4">';
                echo '<p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">' . $row['added_by'] . '</p>';
                echo '</td>';
                echo '<td class="p-4">';
                echo '<p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">' . $row['added_date'] . '</p>';
                echo '</td>';
                echo '<td class="p-4">';
                echo '<a href="schedule_form.php?id=' . $row['id'] . '" class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">Edit</a>';
                echo '</td>';                
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="5" class="p-4 text-center">No records found</td></tr>';
        }

        $conn->close();
      ?>
    </tbody>
  </table>
</div>
