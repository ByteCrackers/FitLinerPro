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

        if ($userModel->login($email, $password)) {
            $userRole = $_SESSION['user_role'] ?? 'user'; 
            if ($userRole === 'admin') {
                header('Location: ../public/admin_dashboard.php');
            } else {
                header('Location: ../public/user_dashboard.php');
            }
            exit();
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
        $age = $_POST['age'] ?? '';
        $height = $_POST['height'] ?? '';
        $weight = $_POST['weight'] ?? '';
        $about = $_POST['about'] ?? '';
        $exerciseLocation = $_POST['exercise-location'] ?? '';
        $participatedInSports = $_POST['participated-in-sports'] ?? '';
        $currentlyDoingSports = $_POST['currently-doing-sports'] ?? '';
        $exerciseDuration = $_POST['exercise-duration'] ?? '';

        if ($userModel->register($email, $password, $firstName, $lastName, $nameWithInitials, $sex, $maritalStatus, $address, $birthday, $age, $height, $weight, $about, $exerciseLocation, $participatedInSports, $currentlyDoingSports, $exerciseDuration)) {
            $_SESSION['success'] = 'Registration successful. Please log in.';
            header("Location: ../index.php");
            exit();
        } else {
            $_SESSION['error'] = 'Registration failed: ' . $userModel->getLastError();
            header("Location: ../public/register.php");
            exit();
        }
    }
}
?>
