<?php
include '../config.php';

// Initialize variables
$id = '';
$exercise = '';
$reps = '';
$sets = '';
$month = '';
$added_by = '';
$added_date = '';

// Check if 'id' is passed in the URL (for editing)
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch schedule details from the database
    $sql = "SELECT * FROM shedule WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $schedule = $result->fetch_assoc();
        // Populate the form with existing values
        $exercise = $schedule['excercise'];
        $reps = $schedule['reps'];
        $sets = $schedule['sets'];
        $month = $schedule['month'];
        $added_by = $schedule['added_by'];
        $added_date = $schedule['added_date'];
    }
    $stmt->close();
}

// Check if form is submitted (either to update or add a new schedule)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exercise = $_POST['exercise'];
    $reps = $_POST['reps'];
    $sets = $_POST['sets'];
    $month = $_POST['month'];
    $added_by = $_POST['added_by'];
    $added_date = date('Y-m-d H:i:s'); // Current timestamp

    if (!empty($_POST['id'])) {
        // Update existing schedule
        $sql = "UPDATE shedule SET excercise = ?, reps = ?, sets = ?, month = ?, added_by = ?, added_date = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siisssi", $exercise, $reps, $sets, $month, $added_by, $added_date, $_POST['id']);
    } else {
        // Insert new schedule
        $sql = "INSERT INTO shedule (excercise, reps, sets, month, added_by, added_date) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siisss", $exercise, $reps, $sets, $month, $added_by, $added_date);
    }

    if ($stmt->execute()) {
        // Redirect after successful save
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">

                    <a href="../index.php" class="flex ms-2 md:me-24">
                        <img src="../assets/images/logo.png" class="h-8 me-3" alt="FitLiner Logo" />
                        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-orange-600">FitLiner Pro</span>
                    </a>
                </div>
                <!-- Button to toggle sidebar -->
                <button id="sidebarToggle" class="p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-6 h-6 text-gray-500 dark:text-gray-400" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 6h15M4.5 12h15M4.5 18h15" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="?active=schedules" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Schedules</span>
                    </a>
                </li>
                <li>
                    <a href="?active=inbox" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H6.911a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661Z" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">Inbox</span>
                        <span class="inline-flex items-center justify-center w-3 h-3 p-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full ms-3 dark:bg-blue-900 dark:text-blue-300">3</span>
                    </a>
                </li>
                <li>
                    <a href="?active=attendance" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">Attendace</span>
                    </a>
                </li>
                <li>
                    <a href="?active=users" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                    </a>
                </li>
                <li>
                    <a href="../controllers/LogoutController.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">Sign out</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
        <a href="admin_dashboard.php"><button> <img src="../assets/images/Icon/back.png" alt=""></button></a> 
        <br>
        <br>
            <!-- Schedule Form -->
            <form method="POST" action="">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

                <div class="mb-5">
                    <label for="exercise" class="block mb-2 text-sm font-medium text-gray-900">Exercise</label>
                    <input type="text" id="exercise" name="exercise" value="<?php echo htmlspecialchars($exercise); ?>" class="block w-full p-2 border border-gray-300 rounded-md">
                </div>

                <div class="mb-5">
                    <label for="reps" class="block mb-2 text-sm font-medium text-gray-900">Reps</label>
                    <input type="number" id="reps" name="reps" value="<?php echo htmlspecialchars($reps); ?>" class="block w-full p-2 border border-gray-300 rounded-md">
                </div>

                <div class="mb-5">
                    <label for="sets" class="block mb-2 text-sm font-medium text-gray-900">Sets</label>
                    <input type="number" id="sets" name="sets" value="<?php echo htmlspecialchars($sets); ?>" class="block w-full p-2 border border-gray-300 rounded-md">
                </div>

                <div class="mb-5">
                    <label for="month" class="block mb-2 text-sm font-medium text-gray-900">Month</label>
                    <input type="text" id="month" name="month" value="<?php echo htmlspecialchars($month); ?>" class="block w-full p-2 border border-gray-300 rounded-md">
                </div>

                <div class="mb-5">
                    <label for="added_by" class="block mb-2 text-sm font-medium text-gray-900">Added by</label>
                    <input type="text" id="added_by" name="added_by" value="<?php echo htmlspecialchars($added_by); ?>" class="block w-full p-2 border border-gray-300 rounded-md">
                </div>

                <div class="mb-5">
                    <label for="added_date" class="block mb-2 text-sm font-medium text-gray-900">Added Date</label>
                    <input type="text" id="added_date" name="added_date" value="<?php echo htmlspecialchars($added_date); ?>" disabled class="block w-full p-2 border border-gray-300 rounded-md">
                </div>

                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md">Save Schedule</button>
            </form>
            <br>
            


        </div>
    </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('logo-sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');

            sidebarToggle.addEventListener('click', () => {
                if (sidebar.classList.contains('-translate-x-full')) {
                    sidebar.classList.remove('-translate-x-full');
                    sidebar.classList.add('translate-x-0');
                } else {
                    sidebar.classList.remove('translate-x-0');
                    sidebar.classList.add('-translate-x-full');
                }
            });
        });
    </script>

</body>

</html>