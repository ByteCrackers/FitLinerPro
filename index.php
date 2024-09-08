<?php
session_start(); // Start the session

// Check if there's an error message in the session and store it in a variable
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';

// Clear the error message from the session after displaying it
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitLiner Pro - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div class="flex flex-col justify-center min-h-full px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="w-auto h-12 mx-auto" src="./assets/images/logo.png" alt="FitLiner Pro">
    <h2 class="mt-10 text-2xl font-bold leading-9 tracking-tight text-center text-gray-900">Sign in to your account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <!-- Display error message if any -->
    <?php if (!empty($error)): ?>
      <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form class="space-y-6" method="POST" action="./controllers/AuthController.php">
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
        <div class="mt-2">
          <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
          <div class="text-sm">
            <a href="#" class="font-semibold text-orange-600 hover:text-orange-400">Forgot password?</a>
          </div>
        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-orange-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
      </div>
    </form>

    <p class="mt-10 text-sm text-center text-gray-500">
      Not a member?
      <a href="./public/register.php" class="font-semibold leading-6 text-orange-600 hover:text-orange-400">Register for new membership</a>
    </p>
  </div>
</div>

</body>
</html>
