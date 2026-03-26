<?php
session_start();
include 'header.php';
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center mb-4">Career Roadmaps</h2>
            <p class="text-center lead">Explore detailed learning paths for various tech careers</p>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Frontend Development -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Frontend Development</h5>
                    <p class="card-text">Learn the path to becoming a Frontend Developer</p>
                    <a href="https://roadmap.sh/frontend" target="_blank" class="btn btn-primary">View Roadmap</a>
                </div>
            </div>
        </div>

        <!-- Backend Development -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Backend Development</h5>
                    <p class="card-text">Master the backend development journey</p>
                    <a href="https://roadmap.sh/backend" target="_blank" class="btn btn-primary">View Roadmap</a>
                </div>
            </div>
        </div>

        <!-- DevOps -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">DevOps</h5>
                    <p class="card-text">Explore the DevOps engineering path</p>
                    <a href="https://roadmap.sh/devops" target="_blank" class="btn btn-primary">View Roadmap</a>
                </div>
            </div>
        </div>

        <!-- Data Science -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Data Science</h5>
                    <p class="card-text">Learn the path to becoming a Data Scientist</p>
                    <a href="https://roadmap.sh/data-science" target="_blank" class="btn btn-primary">View Roadmap</a>
                </div>
            </div>
        </div>

        <!-- Cyber Security -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Cyber Security</h5>
                    <p class="card-text">Master the cybersecurity learning path</p>
                    <a href="https://roadmap.sh/cyber-security" target="_blank" class="btn btn-primary">View Roadmap</a>
                </div>
            </div>
        </div>

        <!-- AI/ML -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">AI/ML</h5>
                    <p class="card-text">Explore the artificial intelligence journey</p>
                    <a href="https://roadmap.sh/artificial-intelligence" target="_blank" class="btn btn-primary">View Roadmap</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="alert alert-info">
                <h4 class="alert-heading">Want to explore more?</h4>
                <p>Visit <a href="https://roadmap.sh" target="_blank">roadmap.sh</a> to explore more detailed learning paths for various tech careers.</p>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    transition: transform 0.2s;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
.card:hover {
    transform: translateY(-5px);
}
</style>

<?php include 'footer.php'; ?> 