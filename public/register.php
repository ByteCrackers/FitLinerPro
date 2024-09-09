
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
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>

<div class="container p-10 px-20 m-6 mx-auto">
    <div class="flex items-center justify-center" >
        <img src="../assets/images/logo.png" alt="logo" width="140px" >
    </div>
    <div class="p-3 text-center" >
        <h2 class="p-3 text-2xl font-bold" >Membership Registration</h2>
        <p class="text-gray-600" >Join the FitLinerPro Family: Your Fitness Journey Starts Here!</p>
    </div>
        <!-- Display error message if any -->
    <?php if (!empty($error)): ?>
      <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
        <?= $error ?>
      </div>
    <?php endif; ?>
<form action="../controllers/AuthController.php" method="POST" >
  <input type="hidden" name="action" value="register">
  <div class="p-10 px-20 m-8 space-y-12">
    <div class="pb-12 border-b border-gray-900/10">
      <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
      <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="col-span-full">
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
          <div class="mt-2">
          <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="col-span-full">
          <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
          <div class="mt-2">
          <input id="password" name="password" type="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="col-span-full">
          <label for="about" class="block text-sm font-medium leading-6 text-gray-900">About</label>
          <div class="mt-2">
            <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
          </div>
          <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about yourself.</p>
        </div>

      </div>
    </div>

    <div class="pb-12 border-b border-gray-900/10">
      <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>

      <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
          <div class="mt-2">
            <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
          <div class="mt-2">
            <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="col-span-full">
          <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name with Initials</label>
          <div class="mt-2">
            <input id="name-with-initials" name="name-with-initials" type="text" autocomplete="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Sex</label>
          <div class="mt-2">
            <select id="sex" name="sex" autocomplete="sex" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
              <option>Male</option>
              <option>Female</option>
            </select>
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Marital Status</label>
          <div class="mt-2">
            <select id="marital" name="marital-status" autocomplete="marital-status" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
              <option>Married</option>
              <option>Unmarried</option>
            </select>
          </div>
        </div>

        <div class="col-span-full">
          <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
          <div class="mt-2">
            <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-2 sm:col-start-1">
          <label for="birthday" class="block text-sm font-medium leading-6 text-gray-900">Birthday</label>
          <div class="mt-2">
            <input type="date" name="birthday" id="city" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-2">
          <label for="age" class="block text-sm font-medium leading-6 text-gray-900">Age</label>
          <div class="mt-2">
            <input type="number" name="age" id="age" autocomplete="age" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-2">
          <label for="height" class="block text-sm font-medium leading-6 text-gray-900">Height</label>
          <div class="mt-2">
            <input type="text" name="height" id="height" autocomplete="height" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-2">
          <label for="weight" class="block text-sm font-medium leading-6 text-gray-900">Weight</label>
          <div class="mt-2">
            <input type="text" name="weight" id="weight" autocomplete="weight" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

      </div>
    </div>

    <div class="pb-12 border-b border-gray-900/10">
      

      <div class="mt-10 space-y-10">

        <fieldset>
          <legend class="text-sm font-semibold leading-6 text-gray-900">Where do you exercises ?</legend>
          <div class="mt-6 space-y-6">
            
            <div class="relative flex gap-x-3">
              <div class="flex items-center h-6">
              <input id="home" name="exercise-location[]" value="home" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-600">
              </div>
              <div class="text-sm leading-6">
                <label for="comments" class="font-medium text-gray-900">Home</label>
              </div>
            </div>
            
            <div class="relative flex gap-x-3">
              <div class="flex items-center h-6">
              <input id="school" name="exercise-location[]" value="school" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-600">
              </div>
              <div class="text-sm leading-6">
                <label for="candidates" class="font-medium text-gray-900">School</label>
              </div>
            </div>
            
            <div class="relative flex gap-x-3">
              <div class="flex items-center h-6">
              <input id="club" name="exercise-location[]" value="club" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-600">
              </div>
              <div class="text-sm leading-6">
                <label for="offers" class="font-medium text-gray-900">Club</label>
              </div>
            </div>
            
            <div class="relative flex gap-x-3">
              <div class="flex items-center h-6">
              <input id="gym" name="exercise-location[]" value="gym" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-600">
              </div>
              <div class="text-sm leading-6">
                <label for="offers" class="font-medium text-gray-900">Fitness Center/Gym</label>
              </div>
            </div>

            <div class="relative flex gap-x-3">
              <div class="flex items-center h-6">
              <input id="gym in-a-star-class-hotel" name="exercise-location[]" value="gym in-a-star-class-hotel" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-600">
              </div>
              <div class="text-sm leading-6">
                <label for="offers" class="font-medium text-gray-900">Gym in a Star class hotel</label>
              </div>
            </div>
            
            <div class="relative flex gap-x-3">
              <div class="flex items-center h-6">
              <input id="jogging-running-on-the-road" name="exercise-location[]" value="jogging-running-on-the-road" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-600">
              </div>
              <div class="text-sm leading-6">
                <label for="offers" class="font-medium text-gray-900">Jogging / Running on the Road</label>
              </div>
            </div>
            
            <div class="relative flex gap-x-3">
              <div class="flex items-center h-6">
              <input id="jogging-running-on-the-ground" name="exercise-location[]" value="jogging-running-on-the-ground" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-600">
              </div>
              <div class="text-sm leading-6">
                <label for="offers" class="font-medium text-gray-900">Jogging / Running on the Ground</label>
              </div>
            </div>
            
            <div class="relative flex gap-x-3">
              <div class="flex items-center h-6">
                <input id="any-other-place" name="exercise-location[]" value="any-other-place" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-600">
              </div>
              <div class="text-sm leading-6">
                <label for="offers" class="font-medium text-gray-900">Any other place</label>
              </div>
            </div>
            
          </div>
        </fieldset>

        <fieldset>
          <legend class="text-sm font-semibold leading-6 text-gray-900">Do you have participated for sports during school/ university ?</legend>
          <div class="mt-6 space-y-6">
            <div class="flex items-center gap-x-3">
              <input id="participated-for-sports-yes" name="participated-in-sports[]" value="yes" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600">
              <label for="push-everything" class="block text-sm font-medium leading-6 text-gray-900">Yes</label>
            </div>
            <div class="flex items-center gap-x-3">
              <input id="participated-for-sports-no" name="participated-in-sports[]" value="no" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600">
              <label for="push-email" class="block text-sm font-medium leading-6 text-gray-900">No</label>
          </div>
        </fieldset>

        <fieldset>
          <legend class="text-sm font-semibold leading-6 text-gray-900">Are you presently doing any sports or any physical activities for fitness ?</legend>
          <div class="mt-6 space-y-6">
            <div class="flex items-center gap-x-3">
              <input id="presently-doing-any-sports-yes" name="currently-doing-sports[]" value="yes" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600">
              <label for="push-everything" class="block text-sm font-medium leading-6 text-gray-900">Yes</label>
            </div>
            <div class="flex items-center gap-x-3">
              <input id="presently-doing-any-sports-no" name="currently-doing-sports[]" value="no" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600">
              <label for="push-email" class="block text-sm font-medium leading-6 text-gray-900">No</label>
          </div>
        </fieldset>

        <fieldset>
          <legend class="text-sm font-semibold leading-6 text-gray-900">How long have you been exercise?</legend>
          <div class="mt-6 space-y-6">
            <div class="flex items-center gap-x-3">
              <input id="for-months" name="exercise-duration[]" value="no" type="for-months" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600">
              <label for="push-everything" class="block text-sm font-medium leading-6 text-gray-900">For months</label>
            </div>
            <div class="flex items-center gap-x-3">
              <input id="3-6-months" name="exercise-duration[]" value="3-6-months" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600">
              <label for="push-email" class="block text-sm font-medium leading-6 text-gray-900">3-6 Months</label>
            </div>
            <div class="flex items-center gap-x-3">
              <input id="6-12-months" name="exercise-duration[]" value="6-12-months" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600">
              <label for="push-email" class="block text-sm font-medium leading-6 text-gray-900">6-12 Months</label>
            </div>
            <div class="flex items-center gap-x-3">
              <input id="1-2-years" name="exercise-duration[]" value="1-2-years" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600">
              <label for="push-email" class="block text-sm font-medium leading-6 text-gray-900">1-2 Years</label>
            </div>
            <div class="flex items-center gap-x-3">
              <input id="3-5-years" name="exercise-duration[]" value="3-5-years" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600">
              <label for="push-email" class="block text-sm font-medium leading-6 text-gray-900">3-5 Years</label>
            </div>
            <div class="flex items-center gap-x-3">
              <input id="over-6-years" name="exercise-duration[]" value="over-6-years" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600">
              <label for="push-email" class="block text-sm font-medium leading-6 text-gray-900">Over 6 Years</label>
            </div>
        </fieldset>

        <fieldset>
          <legend class="text-sm font-semibold leading-6 text-gray-900">Reason for regular exercises / physical activities?</legend>
          <div class="mt-6 space-y-6">
            <div class="relative flex gap-x-3">
              <div class="flex items-center h-6">
                <input id="reduce-weight" name="reduce-weight" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-600">
              </div>
              <div class="text-sm leading-6">
                <label for="comments" class="font-medium text-gray-900">Reduce Weight</label>
              </div>
            </div>
            <div class="relative flex gap-x-3">
              <div class="flex items-center h-6">
                <input id="keep-fit" name="keep-fit" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-600">
              </div>
              <div class="text-sm leading-6">
                <label for="comments" class="font-medium text-gray-900">Keep fit</label>
              </div>
            </div>
            <div class="relative flex gap-x-3">
              <div class="flex items-center h-6">
                <input id="gain-weight" name="gain-weight" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-600">
              </div>
              <div class="text-sm leading-6">
                <label for="comments" class="font-medium text-gray-900">Gain weight</label>
              </div>
            </div>
            <div class="relative flex gap-x-3">
              <div class="flex items-center h-6">
                <input id="doctor-advice" name="doctor-advice" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-600">
              </div>
              <div class="text-sm leading-6">
                <label for="comments" class="font-medium text-gray-900">Doctor's advice</label>
              </div>
            </div>
            <div class="relative flex gap-x-3">
              <div class="flex items-center h-6">
                <input id="manage-stress" name="manage-stress" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-600">
              </div>
              <div class="text-sm leading-6">
                <label for="comments" class="font-medium text-gray-900">Manage Stress</label>
              </div>
            </div>
            <div class="relative flex gap-x-3">
              <div class="flex items-center h-6">
                <input id="other" name="other" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-600">
              </div>
              <div class="text-sm leading-6">
                <label for="comments" class="font-medium text-gray-900">Other</label>
              </div>
            </div>
          </div>
        </fieldset>

      </div>
    </div>
    <div class="flex items-center justify-end mt-6 gap-x-6">
      <a href="../index.php"><button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button></a>
      <button type="submit" class="px-3 py-2 text-sm font-semibold text-white bg-orange-600 rounded-md shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
    </div>
  </div>

</form>
</div>


</body>
</html>