<div class="relative flex flex-col w-full h-full text-gray-700 bg-white rounded-xl bg-clip-border">
  <table class="w-full text-left table-auto min-w-max">
    <thead>
      <tr>
        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Program Name
          </p>
        </th>
        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Month
          </p>
        </th>
        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Date
          </p>
        </th>
      </tr>
    </thead>
    <tbody id="program-table-body">
      <!-- Dynamic rows will be added here -->
    </tbody>
  </table>
</div>

<script>
  // Function to fetch program data from PHP
  async function fetchProgramData() {
    const response = await fetch('../views/users/fetch_programs.php'); // Adjust path as needed
    const data = await response.json();
    populateTable(data);
  }

  // Function to populate the table with program data
  function populateTable(data) {
    const tableBody = document.getElementById('program-table-body');
    tableBody.innerHTML = ''; // Clear existing rows

    data.forEach(item => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td class="p-4 border-b border-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">${item.program_name}</p>
        </td>
        <td class="p-4 border-b border-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">${item.month}</p>
        </td>
        <td class="p-4 border-b border-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">${item.created_date}</p>
        </td>
      `;
      tableBody.appendChild(row);
    });
  }

  // Call the function to fetch and display program data on page load
  document.addEventListener('DOMContentLoaded', fetchProgramData);
</script>
