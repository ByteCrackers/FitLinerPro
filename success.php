<?php
session_start();
require_once './config.php'; // Ensure the DB connection is established
require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51Q4NQ32K72b2EFxnSh2MQLjhUcnXZqIusV20ntGichWD5EwSXHM3BKBzU4IB76OMWLefVsqmhnFHbm4QJ4OMzwTR00nXMXXijJ";
\Stripe\Stripe::setApiKey($stripe_secret_key);

// Retrieve the Checkout session using the session ID from the URL
$session_id = $_GET['session_id'];
$checkout_session = \Stripe\Checkout\Session::retrieve($session_id);

// Get the user ID from the session
$userId = $_SESSION['user_id'];

// Prepare to insert payment record
$paymentId = $checkout_session->payment_intent; // Payment Intent ID
// $amount = $checkout_session->amount_total; // Total amount paid
$amount = 4500; // Total amount paid

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO payment (user_id, payment_id, payment_date, payment_month, amount) VALUES (?, ?, NOW(), MONTH(NOW()), ?)");
$stmt->bind_param("isi", $userId, $paymentId, $amount);

// Execute the query
if ($stmt->execute()) {
    echo "Payment recorded successfully!";
} else {
    echo "Failed to record payment: " . $stmt->error;
}

// Optionally, redirect the user to the dashboard or a confirmation page
header('Location: ./public/payment_succ.php');
exit();
