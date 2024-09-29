<?php
session_start();

require_once '../config.php';
require_once '../models/User.php';

$userModel = new User($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? 'login';

    if ($action == 'login') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Check if login is successful
        if ($userModel->login($email, $password)) {
            $userId = $_SESSION['user_id'];
            // Check if it's the user's first login
            if ($userModel->isFirstLogin($userId)) {
                // Redirect to payment page
                header('Location: ../reg_checkout.php');
                exit();
            } else {
                header('Location: ../public/user_dashboard.php');
                exit();
            }
        } else {
            $_SESSION['error'] = 'Login failed: ' . $userModel->getLastError();
            header("Location: ../index.php");
            exit();
        }
    } elseif ($action == 'register') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $firstName = $_POST['first-name'] ?? '';
        $lastName = $_POST['last-name'] ?? '';
        $nameWithInitials = $_POST['name-with-initials'] ?? '';
        $sex = $_POST['sex'] ?? '';
        $maritalStatus = $_POST['marital-status'] ?? '';
        $address = $_POST['street-address'] ?? '';
        $birthday = $_POST['birthday'] ?? '';
        $contactNumber = $_POST['contact-number'] ?? '';
        $eContactNumber = $_POST['e-contact-number'] ?? '';

        // Validate the password and confirm password match
        if ($_POST['password'] !== $_POST['confirm-password']) {
            $_SESSION['error'] = 'Passwords do not match.';
            header("Location: ../public/register.php");
            exit();
        }

        if ($userModel->register(
            $email,
            $password,
            $firstName,
            $lastName,
            $nameWithInitials,
            $sex,
            $maritalStatus,
            $address,
            $birthday,
            $contactNumber,
            $eContactNumber
        )) {
            $_SESSION['success'] = 'Registration successful. Please log in.';
            header("Location: ../public/reg_succ.php");
            exit();
        } else {
            $_SESSION['error'] = 'Registration failed: ' . $userModel->getLastError();
            header("Location: ../public/register.php");
            exit();
        }
    }
}

// This method will be called after payment is completed
function handlePaymentSuccess($userId, $paymentId, $amount) {
    global $conn; // Access the connection variable

    // Prepare and execute the insert query
    $stmt = $conn->prepare("INSERT INTO payment (user_id, payment_id, payment_date, payment_month, amount) VALUES (?, ?, NOW(), MONTH(NOW()), ?)");
    $stmt->bind_param("isi", $userId, $paymentId, $amount);

    if ($stmt->execute()) {
        return true; // Payment recorded successfully
    } else {
        return false; // Failed to record payment
    }
}

?>
