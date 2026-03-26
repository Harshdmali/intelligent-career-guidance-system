<?php
session_start();
include 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = isset($_POST['score']) ? intval($_POST['score']) : 0;
    
    // Store the score in session
    $_SESSION['aptitude_score'] = $score;
    
    // Determine career recommendations based on score
    $career_recommendations = [];
    
    if ($score >= 4) {
        // High score - Technical roles
        $career_recommendations = [
            'Software_developer.php',
            'Data_Scientist.php',
            'AI_ML_Specialist.php',
            'Cyber_Security_Specialist.php'
        ];
    } elseif ($score >= 3) {
        // Medium-high score - Mixed technical and analytical roles
        $career_recommendations = [
            'Business_Analyst.php',
            'Project_Manager.php',
            'Database_Administrator.php',
            'Information_security.php'
        ];
    } else {
        // Lower score - Support and entry-level roles
        $career_recommendations = [
            'Helpdesk_Engineer.php',
            'Customer_service_executive.php',
            'Application_Support_Engineer.php',
            'Technical_writer.php'
        ];
    }
    
    // Store recommendations in session
    $_SESSION['career_recommendations'] = $career_recommendations;
    
    echo json_encode([
        'success' => true,
        'score' => $score,
        'recommendations' => $career_recommendations
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method'
    ]);
}
?> 