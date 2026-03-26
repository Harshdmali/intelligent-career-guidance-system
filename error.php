<?php
session_start();
include 'header.php';
?>

<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0"><i class="fas fa-exclamation-triangle mr-2"></i>Error</h4>
                </div>
                <div class="card-body text-center">
                    <h2 class="mb-4">Page Not Found</h2>
                    <p class="lead">The page you are looking for does not exist or has been moved.</p>
                    <p>Please check the URL or go back to the home page.</p>
                    
                    <div class="mt-4">
                        <a href="main.php" class="btn btn-primary">
                            <i class="fas fa-home mr-2"></i>Go to Home Page
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?> 