<?php
require_once '../config.php';
require_once '../models/User.php';

$userModel = new User($conn);

$userModel->logout();

header('Location: ../index.php');
exit();
?>
