<?php
define('DB_HOST', '132.145.56.110');
define('DB_USER', 'lolc-life');        
define('DB_PASS', 'Y8JcgU6t1APy3JQ');            
define('DB_NAME', 'fitLiner'); 

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");

?>
