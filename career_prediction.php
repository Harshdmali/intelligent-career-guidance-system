<?php
session_start();
include 'header.php';

// Check if user is logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!-- Add CSS override to hide any Next Steps sections -->
<link rel="stylesheet" href="css/career_prediction_override.css">

<div class="container mt-5 pt-4">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center mb-4">Career Prediction</h2>
            <p class="text-center lead">Discover your ideal career path based on your skills and interests</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="server-status-alert"></div>
            
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-user-graduate mr-2"></i>Career Assessment</h4>
                    <p class="mb-0">Answer these questions to get personalized career recommendations</p>
                </div>
                <div class="card-body">
                    <div class="alert alert-info mb-4">
                        <p class="mb-0"><i class="fas fa-info-circle mr-2"></i>Our career prediction system uses machine learning to analyze your skills, interests, and aptitude to recommend suitable career paths.</p>
                    </div>
                    
                    <div class="text-center mb-4">
                        <a href="http://127.0.0.1:5000/" class="btn btn-primary btn-lg" id="assessment-btn" target="_blank">
                            <i class="fas fa-arrow-right mr-2"></i>Start Career Assessment
                        </a>
                    </div>
                    
                    <div class="row mt-5">
                        <div class="col-md-4 text-center mb-4">
                            <div class="p-3">
                                <i class="fas fa-brain fa-3x mb-3 text-primary"></i>
                                <h5>AI-Powered Analysis</h5>
                                <p>Our machine learning algorithm analyzes multiple factors to find your ideal career match</p>
                            </div>
                        </div>
                        <div class="col-md-4 text-center mb-4">
                            <div class="p-3">
                                <i class="fas fa-list-alt fa-3x mb-3 text-primary"></i>
                                <h5>Multiple Recommendations</h5>
                                <p>Get several career options ranked by how well they match your profile</p>
                            </div>
                        </div>
                        <div class="col-md-4 text-center mb-4">
                            <div class="p-3">
                                <i class="fas fa-graduation-cap fa-3x mb-3 text-primary"></i>
                                <h5>Learning Resources</h5>
                                <p>Receive course recommendations to develop skills for your ideal career</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card mt-4 shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="fas fa-question-circle mr-2"></i>How It Works</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-center mb-3">
                            <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <span class="h5 mb-0">1</span>
                            </div>
                            <h6 class="mt-2">Take Assessment</h6>
                            <p class="small">Answer questions about your skills and interests</p>
                        </div>
                        <div class="col-md-3 text-center mb-3">
                            <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <span class="h5 mb-0">2</span>
                            </div>
                            <h6 class="mt-2">AI Analysis</h6>
                            <p class="small">Our ML model processes your responses</p>
                        </div>
                        <div class="col-md-3 text-center mb-3">
                            <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <span class="h5 mb-0">3</span>
                            </div>
                            <h6 class="mt-2">Get Recommendations</h6>
                            <p class="small">View personalized career suggestions</p>
                        </div>
                        <div class="col-md-3 text-center mb-3">
                            <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <span class="h5 mb-0">4</span>
                            </div>
                            <h6 class="mt-2">Explore Resources</h6>
                            <p class="small">Access learning materials for your career path</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card mt-4 shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="fas fa-briefcase mr-2"></i>Career Categories</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-laptop-code text-primary mr-3" style="font-size: 1.5rem;"></i>
                                <div>
                                    <h6 class="mb-0">Software Developer</h6>
                                    <p class="small text-muted mb-0">Build applications and systems</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-chart-bar text-primary mr-3" style="font-size: 1.5rem;"></i>
                                <div>
                                    <h6 class="mb-0">Data Scientist</h6>
                                    <p class="small text-muted mb-0">Analyze complex data</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-paint-brush text-primary mr-3" style="font-size: 1.5rem;"></i>
                                <div>
                                    <h6 class="mb-0">UI/UX Designer</h6>
                                    <p class="small text-muted mb-0">Create user-friendly interfaces</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-shield-alt text-primary mr-3" style="font-size: 1.5rem;"></i>
                                <div>
                                    <h6 class="mb-0">Cybersecurity Specialist</h6>
                                    <p class="small text-muted mb-0">Protect systems from threats</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-network-wired text-primary mr-3" style="font-size: 1.5rem;"></i>
                                <div>
                                    <h6 class="mb-0">Network Engineer</h6>
                                    <p class="small text-muted mb-0">Design and manage networks</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-chart-line text-primary mr-3" style="font-size: 1.5rem;"></i>
                                <div>
                                    <h6 class="mb-0">Business Analyst</h6>
                                    <p class="small text-muted mb-0">Analyze business processes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card mt-4 shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="fas fa-info-circle mr-2"></i>Getting Started</h5>
                </div>
                <div class="card-body">
                    <ol>
                        <li class="mb-2">Click the "Start Career Assessment" button above</li>
                        <li class="mb-2">Answer questions about your skills, interests, and experience</li>
                        <li class="mb-2">Review your personalized career recommendations</li>
                        <li class="mb-2">Explore skills and courses needed for your recommended careers</li>
                    </ol>
                    <div class="alert alert-warning mt-3">
                        <p class="mb-0"><i class="fas fa-exclamation-triangle mr-2"></i>Note: Make sure the Python server is running before starting the assessment. If you encounter a connection error, please start the server using the <strong>start_career_server.bat</strong> file.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script>
// Function to check server status
function checkServerStatus() {
    fetch('check_server.php')
        .then(response => response.json())
        .then(data => {
            const alertContainer = document.getElementById('server-status-alert');
            const assessmentBtn = document.getElementById('assessment-btn');
            
            if (data.status === 'not_running') {
                // Create alert if server is not running
                alertContainer.innerHTML = `
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                        <strong>Server Not Running!</strong> ${data.message}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                `;
                
                // Disable the Start Assessment button
                assessmentBtn.classList.add('disabled');
                assessmentBtn.setAttribute('disabled', 'disabled');
                assessmentBtn.innerHTML = '<i class="fas fa-exclamation-triangle mr-2"></i>Server Not Running';
            } else {
                // Server is running, show success message
                alertContainer.innerHTML = `
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                        <strong>Server Running!</strong> The career prediction server is active and ready.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                `;
                
                // Ensure button is enabled
                assessmentBtn.classList.remove('disabled');
                assessmentBtn.removeAttribute('disabled');
                assessmentBtn.innerHTML = '<i class="fas fa-arrow-right mr-2"></i>Start Career Assessment';
            }
        })
        .catch(error => {
            console.error('Error checking server status:', error);
            document.getElementById('server-status-alert').innerHTML = `
                <div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                    <strong>Unable to check server status!</strong> Please make sure the server is running before starting the assessment.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            `;
        });
}

// Function to remove any Next Steps sections
function removeNextStepsSections() {
    // Remove elements with IDs containing "next-steps"
    document.querySelectorAll('[id*="next-steps"]').forEach(el => el.remove());
    
    // Remove elements with classes containing "next-steps"
    document.querySelectorAll('[class*="next-steps"]').forEach(el => el.remove());
    
    // Remove elements with heading text containing "Next Steps"
    document.querySelectorAll('h1, h2, h3, h4, h5, h6').forEach(heading => {
        if (heading.textContent.toLowerCase().includes('next steps')) {
            // Find the closest parent section or card
            const section = heading.closest('.card, .section, section, div');
            if (section) {
                section.remove();
            } else {
                heading.remove();
            }
        }
    });
}

// Check server status when page loads
document.addEventListener('DOMContentLoaded', function() {
    checkServerStatus();
    
    // Check server status every 30 seconds
    setInterval(checkServerStatus, 30000);
    
    // Remove Next Steps sections
    removeNextStepsSections();
    
    // Also run after a short delay to catch any dynamically added elements
    setTimeout(removeNextStepsSections, 500);
    setTimeout(removeNextStepsSections, 1500);
    setTimeout(removeNextStepsSections, 3000);
});
</script> 