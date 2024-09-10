<?php 
// Initialize variables
$sender = $message = '';
$errors = [];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Message</title>
    <!-- Include your CSS files here -->
    <link rel="stylesheet" href="path/to/your/styles.css">
</head>
<body>
    <div class="flex flex-col items-end">
        <a href="view_message_list.php">
            <button type="button" class="text-white bg-blue-500 hover:bg-blue-800 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700">
                Back to Message List
            </button>
        </a>
    </div>

    <div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md bg-clip-border rounded-xl">
        <h3 class="p-4 text-lg font-semibold">Add New Message</h3>
        <?php if (!empty($errors)): ?>
            <div class="p-4 text-red-600">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form action="../views/admins/actions/add_message.php" method="POST" class="p-4">
            <div class="mb-4">
                <label for="sender" class="block text-sm font-medium text-gray-700">Sender</label>
                <input type="text" id="sender" name="sender" value="<?php echo htmlspecialchars($sender); ?>" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea id="message" name="message" rows="4" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required><?php echo htmlspecialchars($message); ?></textarea>
            </div>
            <div>
                <button type="submit" class="text-white bg-blue-500 hover:bg-blue-800 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700">
                    Add Message
                </button>
            </div>
        </form>
    </div>
</body>
</html>