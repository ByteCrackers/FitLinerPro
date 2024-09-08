<?php
// Database configuration
define('DB_HOST', '132.145.56.110');
define('DB_USER', 'lolc-life');        // Database username
define('DB_PASS', 'Y8JcgU6t1APy3JQ');            // Database password
define('DB_NAME', 'fitlinerpro'); // Database name

// Create a connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Set the charset to utf8 for proper encoding
$conn->set_charset("utf8");

// Start the session
session_start();
?>
