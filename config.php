<?php
define('DB_HOST', 'IP_HERE');
define('DB_USER', 'DB_USER');        
define('DB_PASS', 'DB_PASSWORD');            
define('DB_NAME', 'DB_NAME'); 

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");

?>
