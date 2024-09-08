<?php
require_once 'config.php';
require_once 'models/User.php';

// Initialize the User model
$userModel = new User($conn);

// Logout the user
$userModel->logout();

// Redirect to the login page
header('Location: login.php');
exit();
?>
