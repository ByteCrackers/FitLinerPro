<?php
// require_once './models/User.php';

// $userModel = new User($conn);

// if (!$userModel->isLoggedIn()) {
//     header('Location: ../index.php');
//     exit();
// }

$userId = $_SESSION['user_id'];

require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51Q4NQ32K72b2EFxnSh2MQLjhUcnXZqIusV20ntGichWD5EwSXHM3BKBzU4IB76OMWLefVsqmhnFHbm4QJ4OMzwTR00nXMXXijJ";
\Stripe\Stripe::setApiKey($stripe_secret_key);

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost/FitLinerPro/success.php?session_id={CHECKOUT_SESSION_ID}",
    "cancel_url" => "http://localhost/FitLinerPro/index.php",
    "locale" => "auto",
    "line_items" => [
        [
            "quantity" => 1,
            "price_data" => [
                "currency" => "lkr", // Currency set to LKR
                "unit_amount" => 450000, // Amount in LKR (4500 LKR)
                "product_data" => [
                    "name" => "Membership Registration"
                ]
            ]
        ],
    ]
]);

// Redirect to the Stripe Checkout session
http_response_code(303);
header("Location: " . $checkout_session->url);
exit();

// You won't reach here because of the redirect, 
// but if you need to handle payment success, 
// you will need to use webhooks or check after redirection.
