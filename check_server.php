<?php
// This file checks if the Python server is running
header('Content-Type: application/json');

function isServerRunning() {
    $connection = @fsockopen('127.0.0.1', 5000, $errno, $errstr, 1);
    
    if (is_resource($connection)) {
        fclose($connection);
        return true;
    }
    
    return false;
}

if (isServerRunning()) {
    echo json_encode([
        'status' => 'running',
        'message' => 'The server is running correctly.'
    ]);
} else {
    echo json_encode([
        'status' => 'not_running',
        'message' => 'The Python server is not running. Please start it using the start_career_server.bat file or contact the administrator.'
    ]);
}
?> 