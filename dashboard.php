<?php
session_start();
include 'header.php';

// Check if user is logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!-- Add Chart.js for analytics -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container mt-5 pt-5">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h2>Welcome back, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h2>
                    <p class="mb-0">Track your career development journey</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Advanced Analytics Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Advanced Analytics</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Skill Development Chart -->
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-title">Skill Development Progress</h6>
                                    <canvas id="skillChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- Career Path Analysis -->
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-title">Career Path Analysis</h6>
                                    <canvas id="careerChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Learning Progress -->
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-title">Learning Progress Over Time</h6>
                                    <canvas id="progressChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- Achievement Distribution -->
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-title">Achievement Distribution</h6>
                                    <canvas id="achievementChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Dashboard Grid -->
    <div class="row">
        <!-- Career Goals -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">My Career Goals</h5>
                </div>
                <div class="card-body">
                    <div class="goal-list">
                        <div class="goal-item mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6>Primary Goal</h6>
                                <span class="badge bg-success">In Progress</span>
                            </div>
                            <p class="mb-1">Software Developer</p>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 75%"></div>
                            </div>
                        </div>
                        <div class="goal-item mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6>Secondary Goal</h6>
                                <span class="badge bg-warning">Planned</span>
                            </div>
                            <p class="mb-1">Data Scientist</p>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 30%"></div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-outline-success btn-sm mt-2">Update Goals</button>
                </div>
            </div>
        </div>

        <!-- Learning Schedule -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Learning Schedule</h5>
                </div>
                <div class="card-body">
                    <div class="schedule-list">
                        <div class="schedule-item mb-3">
                            <div class="d-flex justify-content-between">
                                <h6>Today's Tasks</h6>
                                <small class="text-muted">3 of 5 completed</small>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Complete Python Basics
                                    <span class="badge bg-success">Done</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Practice SQL Queries
                                    <span class="badge bg-success">Done</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Web Development Project
                                    <span class="badge bg-warning">In Progress</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Read Tech Articles
                                    <span class="badge bg-secondary">Pending</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Practice Coding
                                    <span class="badge bg-secondary">Pending</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <button class="btn btn-outline-info btn-sm mt-2">View Full Schedule</button>
                </div>
            </div>
        </div>

        <!-- Achievement Badges -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-warning text-white">
                    <h5 class="mb-0">My Achievements</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 text-center mb-3">
                            <div class="badge-item">
                                <i class="fa fa-code fa-2x text-warning"></i>
                                <p class="mb-0">Code Master</p>
                                <small class="text-muted">Level 3</small>
                            </div>
                        </div>
                        <div class="col-4 text-center mb-3">
                            <div class="badge-item">
                                <i class="fa fa-database fa-2x text-warning"></i>
                                <p class="mb-0">Data Pro</p>
                                <small class="text-muted">Level 2</small>
                            </div>
                        </div>
                        <div class="col-4 text-center mb-3">
                            <div class="badge-item">
                                <i class="fa fa-laptop fa-2x text-warning"></i>
                                <p class="mb-0">Web Dev</p>
                                <small class="text-muted">Level 1</small>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-outline-warning btn-sm mt-2">View All Badges</button>
                </div>
            </div>
        </div>

        <!-- Progress Report -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">Progress Report</h5>
                </div>
                <div class="card-body">
                    <div class="progress-stats">
                        <div class="stat-item mb-3">
                            <h6>Overall Progress</h6>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 65%"></div>
                            </div>
                            <small class="text-muted">65% Complete</small>
                        </div>
                        <div class="stat-item mb-3">
                            <h6>Skills Development</h6>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 80%"></div>
                            </div>
                            <small class="text-muted">80% Complete</small>
                        </div>
                        <div class="stat-item">
                            <h6>Course Completion</h6>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 45%"></div>
                            </div>
                            <small class="text-muted">45% Complete</small>
                        </div>
                    </div>
                    <button class="btn btn-outline-danger btn-sm mt-2">View Detailed Report</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Skill Development Chart
const skillCtx = document.getElementById('skillChart').getContext('2d');
new Chart(skillCtx, {
    type: 'radar',
    data: {
        labels: ['Programming', 'Database', 'Problem Solving', 'Communication', 'Web Development', 'Data Analysis'],
        datasets: [{
            label: 'Current Skills',
            data: [75, 60, 85, 70, 65, 55],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            r: {
                beginAtZero: true,
                max: 100
            }
        }
    }
});

// Career Path Analysis Chart
const careerCtx = document.getElementById('careerChart').getContext('2d');
new Chart(careerCtx, {
    type: 'doughnut',
    data: {
        labels: ['Software Development', 'Data Science', 'Web Development', 'AI/ML'],
        datasets: [{
            data: [40, 25, 20, 15],
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)'
            ]
        }]
    }
});

// Learning Progress Chart
const progressCtx = document.getElementById('progressChart').getContext('2d');
new Chart(progressCtx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'Progress',
            data: [20, 35, 45, 60, 75, 85],
            borderColor: 'rgba(75, 192, 192, 1)',
            tension: 0.4
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                max: 100
            }
        }
    }
});

// Achievement Distribution Chart
const achievementCtx = document.getElementById('achievementChart').getContext('2d');
new Chart(achievementCtx, {
    type: 'bar',
    data: {
        labels: ['Code Master', 'Data Pro', 'Web Dev', 'Problem Solver', 'Team Player'],
        datasets: [{
            label: 'Level',
            data: [3, 2, 1, 4, 3],
            backgroundColor: 'rgba(153, 102, 255, 0.8)'
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                max: 5
            }
        }
    }
});
</script>

<style>
.card {
    transition: transform 0.2s;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
.card:hover {
    transform: translateY(-5px);
}
.badge-item {
    padding: 10px;
    border-radius: 8px;
    background-color: #f8f9fa;
}
.badge-item:hover {
    background-color: #e9ecef;
}
.progress {
    height: 8px;
    margin-bottom: 5px;
}
.list-group-item {
    border-left: none;
    border-right: none;
}
.list-group-item:first-child {
    border-top: none;
}
.list-group-item:last-child {
    border-bottom: none;
}
canvas {
    max-height: 300px;
    width: 100% !important;
}
</style>

<?php include 'footer.php'; ?> 