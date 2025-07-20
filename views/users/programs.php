<?php include '../config.php';
$sql = "SELECT program_id, exercise_no, exercise, reps, sets FROM program";
$result = $conn->query($sql);
?>


<div id="currentRow">
    <div class="w-full rounded-2xl pr-4 pl-4 border-2">
        <div class="container mt-0 mr-auto mb-0 ml-auto">
            <div class="flex flex-wrap justify-evenly">

                <?php if ($result->num_rows > 0) {
                    // Output data for each row
                    while ($row = $result->fetch_assoc()) { ?>

                        <div class="w-full pt-4 pr-4 pb-4 pl-4 sm:w-1/2 lg:w-1/3">
                            <div class="bg-gray-800 shadow w-full rounded-lg pt-6 pr-6 pb-6 pl-6">
                                <div class="w-full flex justify-between mb-2">
                                    <div class="flex flex-col justify-evenly items-end">
                                        <p class="text-gray-200 text-xl font-bold text-end whitespace-nowrap"><?php echo $row['reps']; ?> Reps</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full pt-4 pr-4 pb-4 pl-4 sm:w-1/2 lg:w-1/3">
                            <div class="bg-gray-800 shadow w-full rounded-lg pt-6 pr-6 pb-6 pl-6">
                                <div class="flex justify-between mb-2">
                                    <div class="flex flex-col justify-evenly items-end text-white">
                                        <p class="text-gray-200 text-xl font-bold text-end whitespace-nowrap"><?php echo $row['sets']; ?> Sets</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full pt-4 pr-4 pb-4 pl-4 sm:w-1/2 lg:w-1/3">
                            <div class="rounded-lg shadow bg-white pt-6 pr-6 pb-6 pl-6">
                                <div class="flex justify-between mb-2">
                                    <div class="flex items-end flex-col justify-evenly">
                                        <p class="text-gray-800 text-xl font-bold text-end whitespace-nowrap">No: <?php echo $row['exercise_no']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="w-full table-auto mt-0 mr-0 mb-8 ml-0">
                            <tbody>
                                <tr class="text-base rounded-3xl shadow-xl">
                                    <td class="pt-5 pr-0 pb-5 pl-10 text-base hidden lg:block"><?php echo $row['exercise']; ?></td>
                                </tr>
                            </tbody>
                            <tr id="currentRow" class="text-base rounded-3xl">
                                <td class="pt-5 pr-0 pb-5 pl-10 text-base hidden lg:block">
                                    <form method="POST" action="update_program_comp.php">
                                        <input type="hidden" name="program_id" value="<?php echo $row['program_id']; ?>">
                                        <input type="hidden" name="exercise_no" value="<?php echo $row['exercise_no']; ?>">
                                        <button type="submit" name="done" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-800 dark:bg-white dark:border-gray-700 dark:text-gray-900 dark:hover:bg-gray-200 me-2 mb-2">
                                            Done
                                        </button>
                                    </form>
                                </td>
                            </tr>

                        </table>

                <?php }
                } else {
                    echo "No exercises found.";
                }
                ?>

            </div>
        </div>
    </div>
</div>
