<?php

session_start(); // Start the session

// Check if the user is logged in by verifying if 'user_id' exists in the session
if (!isset($_SESSION['user_id'])) {
  // If user is not logged in, redirect to the login page
  header('Location: ../index.php');
  exit(); // Stop script execution after the redirect
}

?>


<head>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&amp;display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&amp;display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Nunito+Sans&amp;family=Raleway:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
    rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/brands.min.css"
    integrity="sha512-apX8rFN/KxJW8rniQbkvzrshQ3KvyEH+4szT3Sno5svdr6E/CP0QE862yEeLBMUnCqLko8QaugGkzvWS7uNfFQ=="
    crossorigin="anonymous">
  <script src="https://cdn.tailwindcss.com/3.4.1?plugins=forms,typography,aspect-ratio,line-clamp"></script>

  <meta charset="UTF-8">


</head>

<body class="undefined">
  <!--Web App Dashboard (1) Starts Here-->
  <div>
    <!--Navigation Section Starts Here-->
    <div class="w-full border-b-2 border-gray-200">
      <div class="bg-white h-16 px-4 mx-auto flex items-center justify-between container">
        <div class="mt-0 mr-0 mb-0 ml-6 xl:ml-0">
          <img src="../assets/images/logo/logo.png" class="block h-8 w-auto">
        </div>
        <div class="flex items-center justify-end space-x-6 ml-auto">
          <div class="relative">
          </div>
          <div class="flex items-center justify-center relative">
            <p class="text-sm font-semibold"><?php echo $_SESSION['user_id'] ?></p>
          </div>
        </div>
      </div>
    </div>
    <!--Navigation Section Ends Here-->
    <div class="grid mx-auto bg-white flex-col container grid-cols-1 gap-8 pt-4 pr-4 pb-4 pl-4 lg:grid-cols-12">
      <div class="flex-grow w-full flex flex-col justify-between mt-0 mr-8 mb-0 ml-0 lg:col-span-8">
        <div class="w-full rounded-2xl pr-4 pl-4 border-2">

          <nav class="">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
              <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a href="../reg_checkout.php"> <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Make
                    payment</button></a>
              </div>
              <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul
                  class="flex flex-col font-medium p-4 md:p-0 mt-4  rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white ">
                  Next payment:
                </ul>
              </div>
            </div>
          </nav>
        </div>
        <div class="rounded-2xl text-center bg-white w-full mt-8 mr-0 mb-8 ml-0 pt-2 pr-4 pb-0 pl-4 border-2">
          <?php include '../views/users/shedules.php' ?>
        </div>

        <!--Table Starts Here-->
        <div class="w-full pt-0 pr-4 pb-0 pl-4 mt-0 mr-auto mb-8 ml-auto border-2 rounded-2xl lg:mb-0">
          <div class="mt-0 mr-auto mb-0 ml-auto max-w-5xl overflow-x-auto overflow-y-hidden">
            <div class="border-b border-gray-200 dark:border-neutral-700">
              <nav class="-mb-0.5 flex justify-end space-x-6" aria-label="Tabs" role="tablist"
                aria-orientation="horizontal">
                <button type="button"
                  class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500 active"
                  id="horizontal-right-alignment-item-1" aria-selected="true"
                  data-hs-tab="#horizontal-right-alignment-1" aria-controls="horizontal-right-alignment-1" role="tab">
                  Program 01
                </button>
                <button type="button"
                  class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500"
                  id="horizontal-right-alignment-item-2" aria-selected="false"
                  data-hs-tab="#horizontal-right-alignment-2" aria-controls="horizontal-right-alignment-2" role="tab">
                  Program 02
                </button>
                <button type="button"
                  class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500"
                  id="horizontal-right-alignment-item-3" aria-selected="false"
                  data-hs-tab="#horizontal-right-alignment-3" aria-controls="horizontal-right-alignment-3" role="tab">
                  Program 03
                </button>
              </nav>
            </div>

            <div class="mt-3">
              <div id="horizontal-right-alignment-1" role="tabpanel"
                aria-labelledby="horizontal-right-alignment-item-1">
                <p class="text-gray-500 dark:text-neutral-400">

                <div id="currentRow">
                  <div class="w-full rounded-2xl pr-4 pl-4 border-2">
                    <div class="container mt-0 mr-auto mb-0 ml-auto">
                      <div class="flex flex-wrap justify-evenly">
                        <div class="w-full pt-4 pr-4 pb-4 pl-4 sm:w-1/2 lg:w-1/3">
                          <div class="bg-gray-800 shadow w-full rounded-lg pt-6 pr-6 pb-6 pl-6">
                            <div class="w-full flex justify-between mb-2">
                              <div class="flex flex-col justify-evenly items-end">
                                <p class="text-gray-200 text-xl font-bold text-end whitespace-nowrap">15 Reps</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="w-full pt-4 pr-4 pb-4 pl-4 sm:w-1/2 lg:w-1/3">
                          <div class="bg-gray-800 shadow w-full rounded-lg pt-6 pr-6 pb-6 pl-6">
                            <div class="flex justify-between mb-2">
                              <div class="flex flex-col justify-evenly items-end text-white">
                                <p class="text-gray-200 text-xl font-bold text-end whitespace-nowrap">3 Sets</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="w-full pt-4 pr-4 pb-4 pl-4 sm:w-1/2 lg:w-1/3">
                          <div class="rounded-lg shadow bg-white pt-6 pr-6 pb-6 pl-6">
                            <div class="flex justify-between mb-2">
                              <div class="flex items-end flex-col justify-evenly">
                                <p class="text-gray-800 text-xl font-bold text-end whitespace-nowrap">Week 3</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <table class="w-full table-auto mt-0 mr-0 mb-8 ml-0">
                    <tbody>
                      <!-- Current row to be removed -->
                      <tr class="text-base rounded-3xl shadow-xl">
                        <td class="pt-5 pr-0 pb-5 pl-10 text-base hidden lg:block">Exercise</td>
                      </tr>
                    </tbody>
                    <tr id="currentRow" class="text-base rounded-3xl">
                      <td class="pt-5 pr-0 pb-5 pl-10 text-base hidden lg:block">
                        <p>
                          <a id="markCompleteLink"
                            class="text-blue-600 hover:text-blue-500 decoration-2 hover:underline focus:outline-none focus:underline opacity-90"
                            href="javascript:void(0);">Mark as completed</a>
                        </p>
                      </td>
                    </tr>
                  </table>
                </div>

                <!-- Second row, initially hidden -->
                <div id="secondRow" class="overflow-hidden w-full rounded-2xl pr-4 pl-4 border-2"
                  style="display: none;">
                  <div class="container mt-0 mr-auto mb-0 ml-auto">
                    <div class="flex flex-wrap justify-evenly">
                      <div class="w-full pt-4 pr-4 pb-4 pl-4 sm:w-1/2 lg:w-1/3">
                        <div class="bg-gray-800 shadow w-full rounded-lg pt-6 pr-6 pb-6 pl-6">
                          <div class="w-full flex justify-between mb-2">
                            <div class="flex flex-col justify-evenly items-end">
                              <p class="text-gray-200 text-xl font-bold text-end whitespace-nowrap">15 Reps</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="w-full pt-4 pr-4 pb-4 pl-4 sm:w-1/2 lg:w-1/3">
                        <div class="bg-gray-800 shadow w-full rounded-lg pt-6 pr-6 pb-6 pl-6">
                          <div class="flex justify-between mb-2">
                            <div class="flex flex-col justify-evenly items-end text-white">
                              <p class="text-gray-200 text-xl font-bold text-end whitespace-nowrap">3 Sets</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="w-full pt-4 pr-4 pb-4 pl-4 sm:w-1/2 lg:w-1/3">
                        <div class="rounded-lg shadow bg-white pt-6 pr-6 pb-6 pl-6">
                          <div class="flex justify-between mb-2">
                            <div class="flex items-end flex-col justify-evenly">
                              <p class="text-gray-800 text-xl font-bold text-end whitespace-nowrap">Week 4</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <table class="w-full table-auto mt-0 mr-0 mb-8 ml-0">
                    <tbody>
                      <!-- Current row to be removed -->
                      <tr class="text-base rounded-3xl shadow-xl">
                        <td class="pt-5 pr-0 pb-5 pl-10 text-base hidden lg:block">Exercise</td>
                      </tr>
                    </tbody>
                    <tr id="currentRow" class="text-base rounded-3xl">
                      <td class="pt-5 pr-0 pb-5 pl-10 text-base hidden lg:block">
                        <p>
                          <a id="markCompleteLink"
                            class="text-blue-600 hover:text-blue-500 decoration-2 hover:underline focus:outline-none focus:underline opacity-90"
                            href="javascript:void(0);">Mark as completed</a>
                        </p>
                      </td>
                    </tr>
                  </table>
                </div>

                </p>
              </div>

              <div id="horizontal-right-alignment-2" class="hidden" role="tabpanel"
                aria-labelledby="horizontal-right-alignment-item-2">
                <p class="text-gray-500 dark:text-neutral-400">
                  This is the <em class="font-semibold text-gray-800 dark:text-neutral-200">second</em> item's tab body.
                </p>
              </div>
              <div id="horizontal-right-alignment-3" class="hidden" role="tabpanel"
                aria-labelledby="horizontal-right-alignment-item-3">
                <p class="text-gray-500 dark:text-neutral-400">
                  This is the <em class="font-semibold text-gray-800 dark:text-neutral-200">third</em> item's tab body.
                </p>
              </div>
            </div>

          </div>
        </div>
        <!--Table Ends Here-->
      </div>
      <div class="flex-grow w-full lg:col-span-4">
        <div class="h-full flex flex-col justify-between container">
          <div class="bg-white rounded-2xl flex flex-col w-full pt-5 pr-6 pb-5 pl-6 border-2">
            <div class="flex items-center justify-between mb-4">
              <p class="text-xl font-bold">Total compleated</p>
              <p class="pt-1 pr-1 pb-1 pl-1 border-2 rounded-md">
                <svg width="1.25rem" height="1.25rem" viewBox="0 0 512 512" data-name="Layer 1" id="Layer_1"
                  xmlns="http://www.w3.org/2000/svg">
                  <title></title>
                  <path
                    d="M256,62.24c-106.82,0-193.72,86.56-193.72,192.94s86.9,193,193.72,193,193.72-86.56,193.72-192.95S362.82,62.24,256,62.24Zm0,369.89c-98,0-177.72-79.38-177.72-176.95S158,78.24,256,78.24s177.72,79.38,177.72,176.94S354,432.13,256,432.13Zm127.58-103.6h0v0h0a8,8,0,0,1-10.9,2.91l-20-11.51a8,8,0,0,1,8-13.87l12.91,7.41A130.31,130.31,0,0,0,387,263.19H372.18a8,8,0,0,1,0-16H387a129.36,129.36,0,0,0-13.56-50.32l-12.87,7.4a7.91,7.91,0,0,1-4,1.07,8,8,0,0,1-4-14.94l12.8-7.35a131.91,131.91,0,0,0-37-36.83L321,159a8,8,0,0,1-13.84-8l7.39-12.75A130.71,130.71,0,0,0,264,124.73v14.76a8,8,0,0,1-16,0V124.73a130.71,130.71,0,0,0-50.56,13.5L204.83,151A8,8,0,1,1,191,159l-7.41-12.78a132,132,0,0,0-37,36.82l12.8,7.36a8,8,0,1,1-8,13.87l-12.88-7.4A129.36,129.36,0,0,0,125,247.18h14.86a8,8,0,0,1,0,16H125a130.31,130.31,0,0,0,13.53,50.33l12.9-7.41a8,8,0,1,1,8,13.87l-20,11.51a8,8,0,0,1-10.89-2.91h0l0,0h0a146.26,146.26,0,0,1-19.71-72.94c0-.14,0-.27,0-.41s0-.24,0-.36A145.42,145.42,0,0,1,128,182.59a7.54,7.54,0,0,1,.38-.75,7.25,7.25,0,0,1,.53-.79,148.09,148.09,0,0,1,52.63-52.42,7.52,7.52,0,0,1,.75-.5,8.52,8.52,0,0,1,.8-.4,146.86,146.86,0,0,1,72.51-19.25h.72a146.86,146.86,0,0,1,72.51,19.25,8.52,8.52,0,0,1,.8.4,7.52,7.52,0,0,1,.75.5,148,148,0,0,1,52.63,52.42,7.25,7.25,0,0,1,.53.79c.14.25.27.5.38.75a145.42,145.42,0,0,1,19.33,72.23c0,.12,0,.24,0,.37s0,.26,0,.4a146.26,146.26,0,0,1-19.7,72.92Zm-96.33-73.37a31.24,31.24,0,0,0-39.42-30l-27.56-47.54a8,8,0,1,0-13.84,8L234,233.15a31.09,31.09,0,0,0,22,53.14,31.5,31.5,0,0,0,8.15-1.08l5.28,9.12a8,8,0,0,0,13.84-8L278,277.22A31.13,31.13,0,0,0,287.25,255.16Zm-46.43,0a15.16,15.16,0,0,1,7.59-13.08h0a15.1,15.1,0,1,1-7.6,13.08Zm61.61,84.5H209.57a8,8,0,0,0-8,8v46.23a8,8,0,0,0,8,8h92.86a8,8,0,0,0,8-8V347.66A8,8,0,0,0,302.43,339.66Zm-8,46.23H217.57V355.66h76.86Z">
                  </path>
                </svg>
              </p>
            </div>
            <div data_type="radial" class="pt-0 pr-2 pb-0 pl-2 chart w-full"></div>
            <div class="text-center">
              <div class="flex items-end justify-center mb-2">
                <p class="text-4xl font-bold text-gray-800">3</p>
              </div>
              <div class="text-center flex items-center justify-Center">
                <p class="text-sm font-medium text-gray-500 mr-2">Weeks</p>
                <p class="rounded-full text-xs text-green-500 bg-green-50 pt-1 pr-2 pb-1 pl-2">Compleated</p>
              </div>
            </div>
          </div>

          <?php include '../views/users/r_payments.php' ?>


          <div class="rounded-2xl border-2">
            <div class="mt-4 mr-0 mb-0 ml-0 w-full">
              <div class="pt-4 pr-6 pb-6 pl-6 bg-white rounded relative">
                <div class="mt-0 mr-0 mb-6 ml-0">
                  <p class="text-lg font-bold">Goals</p>
                </div>
                <div class="relative">
                  <div class="flex items-center flex-col mt-0 mr-0 mb-8 ml-0">
                    <div class="flex items-center justify-between w-full mb-2">
                      <p class="text-base font-medium">Attendance</p>
                      <div class="flex items-center">
                        <p class="text-sm">90%</p>
                      </div>
                    </div>
                    <div class="w-full">
                      <div class="mt-0 mr-0 mb-1 ml-0 h-1 w-full bg-gray-300 rounded">
                        <div class="h-1 w-8/12 bg-gray-800 rounded"></div>
                      </div>
                    </div>
                  </div>
                  <div class="flex items-center flex-col mt-0 mr-0 mb-8 ml-0">
                    <div class="flex items-center justify-between w-full mb-2">
                      <p class="text-base font-medium">Compleated</p>
                      <div class="flex items-center">
                        <p class="text-sm">90%</p>
                      </div>
                    </div>
                    <div class="w-full">
                      <div class="mt-0 mr-0 mb-1 ml-0 h-1 w-full bg-gray-300 rounded">
                        <div class="h-1 w-8/12 bg-gray-800 rounded"></div>
                      </div>
                    </div>
                  </div>
                  <div class="flex items-center flex-col mt-0 mr-0 mb-8 ml-0">
                    <div class="flex items-center justify-between w-full mb-2">
                      <div class="flex items-center">
                      </div>
                    </div>
                    <div class="w-full">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!--Web App Dashboard (1) Ends Here-->


  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script>
    // Function to handle tab switching
    function switchTab(event, tabId) {
      // Hide all tab contents
      let tabContents = document.querySelectorAll('[role="tabpanel"]');
      tabContents.forEach((tabContent) => {
        tabContent.classList.add('hidden');
      });

      // Deactivate all tab buttons
      let tabButtons = document.querySelectorAll('[role="tab"]');
      tabButtons.forEach((tabButton) => {
        tabButton.setAttribute('aria-selected', 'false');
        tabButton.classList.remove('active');
      });

      // Activate the clicked tab button
      event.currentTarget.setAttribute('aria-selected', 'true');
      event.currentTarget.classList.add('active');

      // Show the corresponding tab content
      let activeTabContent = document.querySelector(tabId);
      activeTabContent.classList.remove('hidden');
    }

    // Add event listeners to the buttons
    document.getElementById('horizontal-right-alignment-item-1').addEventListener('click', function(event) {
      switchTab(event, '#horizontal-right-alignment-1');
    });

    document.getElementById('horizontal-right-alignment-item-2').addEventListener('click', function(event) {
      switchTab(event, '#horizontal-right-alignment-2');
    });

    document.getElementById('horizontal-right-alignment-item-3').addEventListener('click', function(event) {
      switchTab(event, '#horizontal-right-alignment-3');
    });

    // JavaScript to remove the current row and show the second row
    document.getElementById('markCompleteLink').addEventListener('click', function() {
      // Remove the current row
      var currentRow = document.getElementById('currentRow');
      currentRow.style.display = 'none';

      // Show the second row
      document.getElementById('secondRow').style.display = 'block';
    });
  </script>


</body>