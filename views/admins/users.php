<?php
include '../admin-config.php';

// Use the MySQLi connection object
$query = "SELECT * FROM users";
$result = $conn->query($query);

if ($result === false) {
    die("Error: " . $conn->error);
}

$users = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md bg-clip-border rounded-xl">
    <table class="w-full text-left table-auto min-w-max">
        <thead>
            <tr>
                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">ID</p>
                </th>
                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Name</p>
                </th>
                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Role</p>
                </th>
                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Status</p>
                </th>
                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr class="even:bg-blue-gray-50/50">
                    <td class="p-4">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900"><?php echo htmlspecialchars($user['id']); ?></p>
                    </td>
                    <td class="p-4">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900"><?php echo htmlspecialchars($user['name']); ?></p>
                    </td>
                    <td class="p-4">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900"><?php echo htmlspecialchars($user['role']); ?></p>
                    </td>
                    <td class="p-4">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900"><?php echo htmlspecialchars($user['status']); ?></p>
                    </td>
                    <td class="p-4">
                        <div class="max-w-lg mx-auto">
                            <form action="../views/admins/change_status.php" method="POST">
                                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user['id']); ?>">
                                <button type="submit" name="status" value="Active" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center">Set Active</button>
                                <button type="submit" name="status" value="Inactive" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center">Set Inactive</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
