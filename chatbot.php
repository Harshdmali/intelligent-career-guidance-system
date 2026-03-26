<?php
session_start();
include 'header.php';

// Check if user is logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Define career guidance responses
$career_responses = [
    // Coding-related careers
    'coding' => [
        'title' => 'Coding Career Paths',
        'message' => 'You can become a Software Developer, Data Scientist, or Cybersecurity Analyst.',
        'details' => [
            'Software Developer' => 'Build applications and systems using programming languages.',
            'Data Scientist' => 'Analyze and interpret complex data to help organizations make better decisions.',
            'Cybersecurity Analyst' => 'Protect systems and networks from digital attacks and threats.'
        ]
    ],
    
    // Design-related careers
    'design' => [
        'title' => 'Design Career Paths',
        'message' => 'You can become a UI/UX Designer, Graphic Designer, or Product Designer.',
        'details' => [
            'UI/UX Designer' => 'Create user-friendly interfaces and enhance user experience for digital products.',
            'Graphic Designer' => 'Create visual content for various media including print and digital platforms.',
            'Product Designer' => 'Design physical or digital products with a focus on both form and function.'
        ]
    ],
    
    // Marketing-related careers
    'marketing' => [
        'title' => 'Marketing Career Paths',
        'message' => 'You can become a Digital Marketer, Content Strategist, or Social Media Manager.',
        'details' => [
            'Digital Marketer' => 'Promote brands and products through digital channels.',
            'Content Strategist' => 'Develop and manage content to achieve business goals.',
            'Social Media Manager' => 'Manage an organization\'s presence and strategy across social platforms.'
        ]
    ],
    
    // Business-related careers
    'business' => [
        'title' => 'Business Career Paths',
        'message' => 'You can become a Business Analyst, Project Manager, or Management Consultant.',
        'details' => [
            'Business Analyst' => 'Analyze business processes and recommend improvements.',
            'Project Manager' => 'Plan, execute, and close projects efficiently.',
            'Management Consultant' => 'Help organizations improve performance and operations.'
        ]
    ],
    
    // Healthcare-related careers
    'healthcare' => [
        'title' => 'Healthcare Career Paths',
        'message' => 'You can become a Health Informatics Specialist, Biomedical Engineer, or Clinical Research Coordinator.',
        'details' => [
            'Health Informatics Specialist' => 'Manage healthcare data and information systems.',
            'Biomedical Engineer' => 'Design and develop medical equipment and devices.',
            'Clinical Research Coordinator' => 'Oversee and manage clinical trials and research studies.'
        ]
    ],
    
    // Skills for specific careers
    'data science skills' => [
        'title' => 'Data Science Skills',
        'message' => 'Python, Machine Learning, SQL, and Data Visualization.',
        'details' => [
            'Python' => 'Primary programming language for data analysis and machine learning.',
            'Machine Learning' => 'Algorithms and statistical models for predictions and decisions.',
            'SQL' => 'Database querying language for data retrieval and manipulation.',
            'Data Visualization' => 'Tools like Tableau, Power BI, or matplotlib to present insights visually.'
        ]
    ],
    
    'software development skills' => [
        'title' => 'Software Development Skills',
        'message' => 'Programming Languages, Data Structures & Algorithms, Version Control, and Testing.',
        'details' => [
            'Programming Languages' => 'JavaScript, Python, Java, C++, etc.',
            'Data Structures & Algorithms' => 'Efficient ways to organize and manipulate data.',
            'Version Control' => 'Git for tracking and managing code changes.',
            'Testing' => 'Unit testing, integration testing, and debugging techniques.'
        ]
    ],
    
    'ui/ux design skills' => [
        'title' => 'UI/UX Design Skills',
        'message' => 'User Research, Wireframing, Prototyping, and Visual Design.',
        'details' => [
            'User Research' => 'Understanding user needs, behaviors, and motivations.',
            'Wireframing' => 'Creating low-fidelity layouts of digital interfaces.',
            'Prototyping' => 'Building interactive models to test functionality.',
            'Visual Design' => 'Creating aesthetically pleasing interfaces with tools like Figma or Adobe XD.'
        ]
    ],
    
    'cybersecurity skills' => [
        'title' => 'Cybersecurity Skills',
        'message' => 'Network Security, Ethical Hacking, Security Tools, and Risk Assessment.',
        'details' => [
            'Network Security' => 'Protecting network infrastructure from unauthorized access.',
            'Ethical Hacking' => 'Finding and fixing security vulnerabilities.',
            'Security Tools' => 'Familiarity with tools like Wireshark, Metasploit, and Nmap.',
            'Risk Assessment' => 'Identifying and evaluating security threats and vulnerabilities.'
        ]
    ],
    
    // Course recommendations
    'data science courses' => [
        'title' => 'Recommended Data Science Courses',
        'message' => 'Consider taking courses in Python Programming, Statistics, Machine Learning, and Big Data.',
        'details' => [
            'Python for Data Science (Coursera)' => 'Learn Python specifically for data analysis and visualization.',
            'Machine Learning by Stanford (Coursera)' => 'Comprehensive introduction to machine learning algorithms.',
            'Data Science Specialization (Coursera)' => 'Series of courses covering the data science pipeline.',
            'Deep Learning Specialization (Coursera)' => 'Advanced neural networks and deep learning techniques.'
        ]
    ],
    
    'web development courses' => [
        'title' => 'Recommended Web Development Courses',
        'message' => 'Consider taking courses in HTML/CSS, JavaScript, React, and Backend Development.',
        'details' => [
            'The Web Developer Bootcamp (Udemy)' => 'Comprehensive course covering frontend and backend development.',
            'JavaScript: Understanding the Weird Parts (Udemy)' => 'Deep dive into JavaScript fundamentals.',
            'React - The Complete Guide (Udemy)' => 'Learn React.js for building modern web applications.',
            'The Complete Node.js Developer Course (Udemy)' => 'Backend development with Node.js and Express.'
        ]
    ],
    
    'design courses' => [
        'title' => 'Recommended Design Courses',
        'message' => 'Consider taking courses in UI/UX Fundamentals, Visual Design, and Design Tools.',
        'details' => [
            'UI/UX Design Specialization (Coursera)' => 'Comprehensive introduction to user interface and experience design.',
            'Graphic Design Specialization (Coursera)' => 'Learn visual communication and graphic design principles.',
            'Learn Figma - UI/UX Design Essential Training (Udemy)' => 'Master the industry-standard design tool.',
            'Adobe XD - UI/UX Design (Udemy)' => 'Create modern interfaces with Adobe XD.'
        ]
    ]
];
?>

<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="container mt-5 pt-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-robot fa-2x"></i>
                        </div>
                        <div>
                            <h5 class="mb-0">Career Guide Assistant</h5>
                            <small>Ask me about career paths, skills, and courses</small>
                        </div>
                    </div>
                </div>
                
                <div class="card-body chat-container" id="chatContainer" style="height: 400px; overflow-y: auto;">
                    <!-- Initial bot message -->
                    <div class="chat-message bot-message">
                        <div class="message-content">
                            <p>👋 Hi there! I'm your Career Guide Assistant.</p>
                            <p>I can help you with:</p>
                            <ul>
                                <li>🎯 Career suggestions based on your interests</li>
                                <li>💡 Skills needed for specific career paths</li>
                                <li>📚 Course recommendations to develop those skills</li>
                            </ul>
                            <p>Try asking me questions like:</p>
                            <div class="example-questions">
                                <span class="example" onclick="askExample(this)">What career is best for coding?</span>
                                <span class="example" onclick="askExample(this)">Which skills do I need for Data Science?</span>
                                <span class="example" onclick="askExample(this)">Recommend courses for web development</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer bg-light">
                    <form id="chatForm" class="d-flex">
                        <input type="text" id="userInput" class="form-control me-2" placeholder="Type your question here..." required>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="card mt-3 shadow-sm">
                <div class="card-header bg-light">
                    <h6 class="mb-0"><i class="fas fa-lightbulb text-warning me-2"></i>Popular Career Questions</h6>
                </div>
                <div class="card-body">
                    <div class="popular-questions">
                        <button class="btn btn-outline-primary btn-sm m-1" onclick="askQuestion('What career is best for coding?')">
                            <i class="fas fa-code me-1"></i> Coding Careers
                        </button>
                        <button class="btn btn-outline-primary btn-sm m-1" onclick="askQuestion('What career is best for design?')">
                            <i class="fas fa-paint-brush me-1"></i> Design Careers
                        </button>
                        <button class="btn btn-outline-primary btn-sm m-1" onclick="askQuestion('What career is best for marketing?')">
                            <i class="fas fa-ad me-1"></i> Marketing Careers
                        </button>
                        <button class="btn btn-outline-primary btn-sm m-1" onclick="askQuestion('What career is best for business?')">
                            <i class="fas fa-briefcase me-1"></i> Business Careers
                        </button>
                        <button class="btn btn-outline-primary btn-sm m-1" onclick="askQuestion('Which skills do I need for Data Science?')">
                            <i class="fas fa-chart-bar me-1"></i> Data Science Skills
                        </button>
                        <button class="btn btn-outline-primary btn-sm m-1" onclick="askQuestion('Which skills do I need for UI/UX Design?')">
                            <i class="fas fa-desktop me-1"></i> UI/UX Design Skills
                        </button>
                        <button class="btn btn-outline-primary btn-sm m-1" onclick="askQuestion('Recommend courses for web development')">
                            <i class="fas fa-laptop-code me-1"></i> Web Dev Courses
                        </button>
                        <button class="btn btn-outline-primary btn-sm m-1" onclick="askQuestion('Recommend courses for data science')">
                            <i class="fas fa-database me-1"></i> Data Science Courses
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.chat-container {
    padding: 20px;
    background-color: #f8f9fa;
}

.chat-message {
    margin-bottom: 20px;
    max-width: 85%;
    position: relative;
}

.bot-message {
    margin-right: auto;
    background-color: white;
    border-radius: 15px 15px 15px 0;
    padding: 15px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    border-left: 4px solid #007bff;
}

.user-message {
    margin-left: auto;
    background-color: #007bff;
    color: white;
    border-radius: 15px 15px 0 15px;
    padding: 15px;
    text-align: right;
}

.message-content p {
    margin-bottom: 10px;
}

.message-content ul {
    padding-left: 20px;
    margin-bottom: 10px;
}

.example-questions {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-top: 10px;
}

.example {
    background-color: #e9ecef;
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 0.85rem;
    cursor: pointer;
    transition: background-color 0.2s;
}

.example:hover {
    background-color: #dee2e6;
}

.popular-questions {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.career-details {
    background-color: #f8f9fa;
    border-radius: 8px;
    padding: 10px;
    margin-top: 10px;
}

.career-details h5 {
    font-size: 1rem;
    margin-bottom: 8px;
    color: #007bff;
}

.career-details ul {
    padding-left: 20px;
    margin-bottom: 0;
}

.btn-outline-primary {
    border-color: #007bff;
    color: #007bff;
}

.btn-outline-primary:hover {
    background-color: #007bff;
    border-color: #007bff;
}
</style>

<script>
// Convert PHP array to JavaScript object
const careerResponses = <?php echo json_encode($career_responses); ?>;

document.getElementById('chatForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const userInput = document.getElementById('userInput');
    const message = userInput.value.trim();
    
    if (message) {
        addMessage(message, 'user');
        processUserInput(message);
        userInput.value = '';
    }
});

function addMessage(message, sender) {
    const chatContainer = document.getElementById('chatContainer');
    const messageDiv = document.createElement('div');
    messageDiv.className = `chat-message ${sender}-message`;
    
    const messageContent = document.createElement('div');
    messageContent.className = 'message-content';
    messageContent.innerHTML = message;
    
    messageDiv.appendChild(messageContent);
    chatContainer.appendChild(messageDiv);
    
    // Scroll to bottom
    chatContainer.scrollTop = chatContainer.scrollHeight;
}

function processUserInput(input) {
    // Convert input to lowercase for easier matching
    const lowerInput = input.toLowerCase();
    
    // Check for exact matches first
    if (lowerInput === 'what career is best for coding?' || lowerInput.includes('career') && lowerInput.includes('coding')) {
        respondWithCareerInfo('coding');
        return;
    }
    
    if (lowerInput === 'what career is best for design?' || lowerInput.includes('career') && lowerInput.includes('design')) {
        respondWithCareerInfo('design');
        return;
    }
    
    if (lowerInput === 'what career is best for marketing?' || lowerInput.includes('career') && lowerInput.includes('marketing')) {
        respondWithCareerInfo('marketing');
        return;
    }
    
    if (lowerInput === 'what career is best for business?' || lowerInput.includes('career') && lowerInput.includes('business')) {
        respondWithCareerInfo('business');
        return;
    }
    
    if (lowerInput === 'what career is best for healthcare?' || lowerInput.includes('career') && lowerInput.includes('healthcare')) {
        respondWithCareerInfo('healthcare');
        return;
    }
    
    // Check for skills questions
    if (lowerInput === 'which skills do i need for data science?' || 
        (lowerInput.includes('skills') && lowerInput.includes('data science'))) {
        respondWithCareerInfo('data science skills');
        return;
    }
    
    if (lowerInput.includes('skills') && lowerInput.includes('software') || 
        lowerInput.includes('skills') && lowerInput.includes('developer')) {
        respondWithCareerInfo('software development skills');
        return;
    }
    
    if (lowerInput.includes('skills') && (lowerInput.includes('ui') || lowerInput.includes('ux') || lowerInput.includes('design'))) {
        respondWithCareerInfo('ui/ux design skills');
        return;
    }
    
    if (lowerInput.includes('skills') && lowerInput.includes('cyber')) {
        respondWithCareerInfo('cybersecurity skills');
        return;
    }
    
    // Check for course recommendations
    if (lowerInput.includes('course') && lowerInput.includes('data')) {
        respondWithCareerInfo('data science courses');
        return;
    }
    
    if (lowerInput.includes('course') && (lowerInput.includes('web') || lowerInput.includes('developer'))) {
        respondWithCareerInfo('web development courses');
        return;
    }
    
    if (lowerInput.includes('course') && lowerInput.includes('design')) {
        respondWithCareerInfo('design courses');
        return;
    }
    
    // If no match found
    setTimeout(() => {
        addMessage("I'm not sure. Can you ask in another way? Try asking about specific careers like coding, design, or marketing, or ask about skills and courses for a particular field.", 'bot');
    }, 500);
}

function respondWithCareerInfo(category) {
    if (careerResponses[category]) {
        const response = careerResponses[category];
        let message = `<h5>${response.title}</h5><p>${response.message}</p>`;
        
        // Add details if available
        if (response.details) {
            message += '<div class="career-details"><h5>More Details:</h5><ul>';
            for (const [key, value] of Object.entries(response.details)) {
                message += `<li><strong>${key}:</strong> ${value}</li>`;
            }
            message += '</ul></div>';
        }
        
        setTimeout(() => {
            addMessage(message, 'bot');
        }, 500);
    } else {
        setTimeout(() => {
            addMessage("I'm not sure about that specific career path yet. Can you ask about coding, design, marketing, or business careers?", 'bot');
        }, 500);
    }
}

function askQuestion(question) {
    addMessage(question, 'user');
    processUserInput(question);
}

function askExample(element) {
    const question = element.textContent;
    addMessage(question, 'user');
    processUserInput(question);
}
</script>

<?php include 'footer.php'; ?> 