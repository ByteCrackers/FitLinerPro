<?php
session_start(); 

require_once '../config.php';
require_once '../models/User.php';

$userModel = new User($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $firstName = $_POST['first-name'] ?? '';
        $lastName = $_POST['last-name'] ?? '';
        $nameWithInitials = $_POST['name-with-initials'] ?? '';
        $sex = $_POST['sex'] ?? '';
        $maritalStatus = $_POST['marital-status'] ?? '';
        $address = $_POST['address'] ?? '';
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
            header("Location: ../public/reg_suc.php");
            exit();
        } else {
            $_SESSION['error'] = 'Registration failed: ' . $userModel->getLastError();
            header("Location: ../public/register.php");
            exit();
        }
}
?>
