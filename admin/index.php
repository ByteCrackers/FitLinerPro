<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        $admin = $result->fetch_assoc();

        // Replace with password_verify if you're using hashed passwords
        if ($admin['password'] === $password) {
            $_SESSION['admin_id'] = $admin['admin_id'];
            $_SESSION['fName'] = $admin['fName'];
            header("Location: admin_dashboard.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Admin not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <h2>Admin Login</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
