<?php
session_start();

$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';

unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>FitLiner Pro - Register</title>
  <style>
    .step {
      display: none;
    }

    .step.active {
      display: block;
    }
  </style>
</head>

<body>

  <div class="container p-10 px-20 m-6 mx-auto">
    <div class="flex items-center justify-center">
      <img src="../assets/images/logo.png" alt="logo" width="140px">
    </div>
    <div class="p-3 text-center">
      <h2 class="p-3 text-2xl font-bold">Membership Registration</h2>
      <p class="text-gray-600">Join the FitLinerPro Family: Your Fitness Journey Starts Here!</p>
    </div>

    <?php if (!empty($error)): ?>
      <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form action="../controllers/AuthController.php" method="POST">
      <input type="hidden" name="action" value="register">
      <div class="p-10 px-20 m-8 space-y-12">

        <!-- Step 1: Profile -->
        <div class="step active">
          <div class="pb-12 border-b border-gray-900/10">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
            <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="col-span-full">
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                <div class="mt-2">
                  <input id="email" name="email" type="email" autocomplete="email" required
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>

              <div class="col-span-full">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                <div class="mt-2">
                  <input id="password" name="password" type="password" required
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>

              <div class="col-span-full">
                <label for="about" class="block text-sm font-medium leading-6 text-gray-900">About</label>
                <div class="mt-2">
                  <textarea id="about" name="about" rows="3" required
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                </div>
                <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about yourself.</p>
              </div>
            </div>
          </div>
          <br>
          <button type="button" class="next-btn px-3 py-2 text-sm font-semibold text-white bg-orange-600 rounded-md shadow-sm hover:bg-orange-500">Next</button>
        </div>

        <!-- Step 2: Personal Information -->
        <div class="step">
          <div class="pb-12 border-b border-gray-900/10">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
            <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                <div class="mt-2">
                  <input type="text" name="first-name" id="first-name" required autocomplete="given-name"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>

              <div class="sm:col-span-3">
                <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                <div class="mt-2">
                  <input type="text" name="last-name" id="last-name" required autocomplete="family-name"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>

              <div class="col-span-full">
                <label for="name-with-initials" class="block text-sm font-medium leading-6 text-gray-900">Name with Initials</label>
                <div class="mt-2">
                  <input id="name-with-initials" name="name-with-initials" type="text" required autocomplete="name"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>

              <div class="sm:col-span-3">
                <label for="sex" class="block text-sm font-medium leading-6 text-gray-900">Sex</label>
                <div class="mt-2">
                  <select id="sex" name="sex" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option value="" disabled selected>Select your sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>

              <div class="sm:col-span-3">
                <label for="marital-status" class="block text-sm font-medium leading-6 text-gray-900">Marital Status</label>
                <div class="mt-2">
                  <select id="marital-status" name="marital-status" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option value="" disabled selected>Select your marital status</option>
                    <option value="Married">Married</option>
                    <option value="Unmarried">Unmarried</option>
                  </select>
                </div>
              </div>

              <div class="col-span-full">
                <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                <div class="mt-2">
                  <input type="text" name="street-address" id="street-address" required autocomplete="street-address"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>

              <div class="sm:col-span-2 sm:col-start-1">
                <label for="birthday" class="block text-sm font-medium leading-6 text-gray-900">Birthday</label>
                <div class="mt-2">
                  <input type="date" name="birthday" id="birthday" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>
            </div>
          </div>
          <br>
          <button type="button" class="prev-btn px-3 py-2 text-sm font-semibold text-white bg-gray-600 rounded-md shadow-sm hover:bg-gray-500">Previous</button>
          <button type="button" class="next-btn px-3 py-2 text-sm font-semibold text-white bg-orange-600 rounded-md shadow-sm hover:bg-orange-500">Next</button>
        </div>

        <!-- Step 3: Confirmation -->
        <div class="step">
          <div class="pb-12 border-b border-gray-900/10">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Confirmation</h2>
            <div class="mt-10">
              <p class="text-sm leading-6 text-gray-600">Please review your information:</p>
              <div class="mt-4 text-left">
                <p id="confirmation-email" class="font-medium"></p>
                <p id="confirmation-first-name" class="font-medium"></p>
                <p id="confirmation-last-name" class="font-medium"></p>
                <p id="confirmation-name-with-initials" class="font-medium"></p>
                <p id="confirmation-sex" class="font-medium"></p>
                <p id="confirmation-marital-status" class="font-medium"></p>
                <p id="confirmation-street-address" class="font-medium"></p>
                <p id="confirmation-birthday" class="font-medium"></p>
              </div>
            </div>
          </div>
          <br>
          <button type="button" class="prev-btn px-3 py-2 text-sm font-semibold text-white bg-gray-600 rounded-md shadow-sm hover:bg-gray-500">Previous</button>
          <button type="submit" class="submit-btn px-3 py-2 text-sm font-semibold text-white bg-blue-700 rounded-md shadow-sm hover:bg-blue-500">Submit</button>
        </div>

      </div>
    </form>
  </div>

  <script>
    const nextButtons = document.querySelectorAll('.next-btn');
    const prevButtons = document.querySelectorAll('.prev-btn');
    const steps = document.querySelectorAll('.step');

    let currentStep = 0;

    function showStep(stepIndex) {
      steps.forEach((step, index) => {
        step.classList.toggle('active', index === stepIndex);
      });
    }

    function updateConfirmation() {
      document.getElementById('confirmation-email').innerText = 'Email: ' + document.getElementById('email').value;
      document.getElementById('confirmation-first-name').innerText = 'First Name: ' + document.getElementById('first-name').value;
      document.getElementById('confirmation-last-name').innerText = 'Last Name: ' + document.getElementById('last-name').value;
      document.getElementById('confirmation-name-with-initials').innerText = 'Name with Initials: ' + document.getElementById('name-with-initials').value;
      document.getElementById('confirmation-sex').innerText = 'Sex: ' + document.getElementById('sex').value;
      document.getElementById('confirmation-marital-status').innerText = 'Marital Status: ' + document.getElementById('marital-status').value;
      document.getElementById('confirmation-street-address').innerText = 'Address: ' + document.getElementById('street-address').value;
      document.getElementById('confirmation-birthday').innerText = 'Birthday: ' + document.getElementById('birthday').value;
    }

    nextButtons.forEach(button => {
      button.addEventListener('click', () => {
        if (currentStep < steps.length - 1) {
          currentStep++;
          showStep(currentStep);
        }
        if (currentStep === steps.length - 1) {
          updateConfirmation();
        }
      });
    });

    prevButtons.forEach(button => {
      button.addEventListener('click', () => {
        if (currentStep > 0) {
          currentStep--;
          showStep(currentStep);
        }
      });
    });
  </script>
</body>
</html>
