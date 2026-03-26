<?php
// This file redirects users back to the main page
session_start();

// Redirect to main.php
header("Location: main.php");
exit;
?> 