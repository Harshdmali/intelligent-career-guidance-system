<?php
session_start();
include 'header.php';
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Career Aptitude Test</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form id="aptitudeTestForm" method="POST" action="process_aptitude.php">
                        <div id="questions">
                            <!-- Logical Reasoning -->
                            <div class="question-section mb-4">
                                <h4>Logical Reasoning</h4>
                                <div class="question">
                                    <p>1. If all A are B, and all B are C, then:</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q1" value="1" required>
                                        <label class="form-check-label">All A are C</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q1" value="0">
                                        <label class="form-check-label">Some A are C</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q1" value="0">
                                        <label class="form-check-label">No A are C</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Numerical Ability -->
                            <div class="question-section mb-4">
                                <h4>Numerical Ability</h4>
                                <div class="question">
                                    <p>2. What is the next number in the sequence: 2, 4, 8, 16, ...?</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q2" value="0">
                                        <label class="form-check-label">24</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q2" value="1" required>
                                        <label class="form-check-label">32</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q2" value="0">
                                        <label class="form-check-label">28</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Problem Solving -->
                            <div class="question-section mb-4">
                                <h4>Problem Solving</h4>
                                <div class="question">
                                    <p>3. If you have to debug a complex system, what would be your first approach?</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q3" value="1" required>
                                        <label class="form-check-label">Break down the problem into smaller parts</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q3" value="0">
                                        <label class="form-check-label">Try random solutions</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q3" value="0">
                                        <label class="form-check-label">Ask others to solve it</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Technical Aptitude -->
                            <div class="question-section mb-4">
                                <h4>Technical Aptitude</h4>
                                <div class="question">
                                    <p>4. Which of these best describes your experience with programming?</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q4" value="1" required>
                                        <label class="form-check-label">I can write complex programs</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q4" value="0">
                                        <label class="form-check-label">I know basic programming</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q4" value="0">
                                        <label class="form-check-label">I have no programming experience</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Communication Skills -->
                            <div class="question-section mb-4">
                                <h4>Communication Skills</h4>
                                <div class="question">
                                    <p>5. How comfortable are you in explaining technical concepts to non-technical people?</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q5" value="1" required>
                                        <label class="form-check-label">Very comfortable</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q5" value="0">
                                        <label class="form-check-label">Somewhat comfortable</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q5" value="0">
                                        <label class="form-check-label">Not comfortable</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Submit Test</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('aptitudeTestForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Calculate score
    let score = 0;
    const questions = document.querySelectorAll('.question');
    questions.forEach(question => {
        const selected = question.querySelector('input[type="radio"]:checked');
        if (selected) {
            score += parseInt(selected.value);
        }
    });

    // Send score to server
    fetch('process_aptitude.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'score=' + score
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'career_results.php?score=' + score;
        } else {
            alert('Error processing your test. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error processing your test. Please try again.');
    });
});
</script>

<?php include 'footer.php'; ?> 