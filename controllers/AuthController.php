<?php
session_start(); 

require_once '../config.php';
require_once '../models/User.php';

$userModel = new User($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? 'login';

    if ($action == 'login') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($userModel->login($email, $password)) {
            header('Location: ../public/dashboard.php');
            exit();
        } else {
            $_SESSION['error'] = 'Login failed: ' . $userModel->getLastError();
            header("Location: ../index.php");
            exit();
        }
    } elseif ($action == 'register') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($userModel->register($name, $email, $password)) {
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