<?php
session_start();
include 'header.php';

// Check if user is logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center mb-4">Your Career Recommendations</h2>
            <p class="text-center lead">Based on your responses, here are some career paths that might suit you</p>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <div id="resultsContainer">
                        <!-- Results will be populated by JavaScript -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 text-center">
            <a href="career_prediction.php" class="btn btn-secondary">Take Test Again</a>
            <a href="main.php" class="btn btn-primary">Back to Home</a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const resultsContainer = document.getElementById('resultsContainer');
    const careerResults = JSON.parse(sessionStorage.getItem('careerResults'));

    if (!careerResults) {
        resultsContainer.innerHTML = '<div class="alert alert-info">No results found. Please take the career prediction test first.</div>';
        return;
    }

    const jobs_dict = {
        0: 'AI ML Specialist',
        1: 'API Integration Specialist',
        2: 'Application Support Engineer',
        3: 'Business Analyst',
        4: 'Customer Service Executive',
        5: 'Cyber Security Specialist',
        6: 'Data Scientist',
        7: 'Database Administrator',
        8: 'Graphics Designer',
        9: 'Hardware Engineer',
        10: 'Helpdesk Engineer',
        11: 'Information Security Specialist',
        12: 'Networking Engineer',
        13: 'Project Manager',
        14: 'Software Developer',
        15: 'Software Tester',
        16: 'Technical Writer'
    };

    let html = '<div class="recommendations">';
    
    // Primary recommendation
    if (careerResults.job0 !== undefined) {
        html += `
            <div class="primary-recommendation mb-4">
                <h4 class="text-primary">Primary Recommendation</h4>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">${jobs_dict[careerResults.job0]}</h5>
                        <p class="card-text">This career path best matches your skills and interests.</p>
                    </div>
                </div>
            </div>
        `;
    }

    // Alternative recommendations
    if (careerResults.final_res && Object.keys(careerResults.final_res).length > 0) {
        html += '<h4 class="text-primary mb-3">Alternative Recommendations</h4>';
        Object.values(careerResults.final_res).forEach((careerIndex) => {
            html += `
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">${jobs_dict[careerIndex]}</h5>
                        <p class="card-text">This could also be a good fit based on your profile.</p>
                    </div>
                </div>
            `;
        });
    }

    html += '</div>';
    resultsContainer.innerHTML = html;
});
</script>

<style>
.recommendations .card {
    transition: transform 0.2s;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
.recommendations .card:hover {
    transform: translateY(-5px);
}
.primary-recommendation .card {
    border: 2px solid #007bff;
}
</style>

<?php include 'footer.php'; ?> 