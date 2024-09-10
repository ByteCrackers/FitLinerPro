<form class="max-w-sm mx-auto" method="POST" action="../views/admins/actions/add_schedule.php">
  <div class="mb-5">
      <label for="exercise" class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">Exercise</label>
      <input type="text" id="exercise" name="exercise" class="block w-full p-4 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
  </div>
  <div class="mb-5">
      <label for="reps" class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">Reps</label>
      <input type="number" id="reps" name="reps" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
  </div>
  <div class="mb-5">
      <label for="sets" class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">Sets</label>
      <input type="number" id="sets" name="sets" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
  </div>
  <div class="mb-5">
      <label for="added_by" class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">Added By</label>
      <input type="text" id="added_by" name="added_by" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
  </div>
  <div class="mb-5">
      <label for="month" class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">Month</label>
      <input type="text" id="month" name="month" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
      <br>
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>  
  </div>
</form>
