<?php 
include '../admin-config.php';
?>


<div class="flex flex-col items-end" >
    <a href="?active=add_message"><button type="button" class="text-white bg-blue-500 hover:bg-blue-80 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700">Add new message</button></a>
</div>

<div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md bg-clip-border rounded-xl">
  <table class="w-full text-left table-auto min-w-max">
    <thead>
      <tr>
        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Date
          </p>
        </th>
        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Sended by
          </p>
        </th>
        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70"></p>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $sql = "SELECT id, date, message, sender FROM message";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<tr class="even:bg-blue-gray-50/50">';
                echo '<td class="p-4">';
                echo '<p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">' . $row['date'] . '</p>';
                echo '</td>';
                echo '<td class="p-4">';
                echo '<p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">' . $row['sender'] . '</p>';
                echo '</td>';
                echo '<td class="p-4">';
                echo '<a href="view_message.php?id=' . $row['id'] . '" class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">View</a>';
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
