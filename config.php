<?php
define('DB_SERVER', 'localhost');  // XAMPP runs on localhost
define('DB_USERNAME', 'root');     // Default XAMPP username
define('DB_PASSWORD', '');         // Default XAMPP password (empty)
define('DB_NAME', 'my_db');        // Make sure this matches exactly

// Connect to MySQL
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if (!$link) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
