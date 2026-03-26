from flask import Flask, render_template, request, jsonify
import numpy as np
import pickle
import os
from sklearn.ensemble import RandomForestClassifier
from sklearn.preprocessing import StandardScaler

app = Flask(__name__)

# Define career categories
CAREER_CATEGORIES = {
    0: 'Software Developer',
    1: 'Data Scientist',
    2: 'UI/UX Designer',
    3: 'Cybersecurity Specialist',
    4: 'Network Engineer',
    5: 'Business Analyst',
    6: 'Project Manager',
    7: 'Digital Marketer',
    8: 'Content Creator',
    9: 'Technical Writer'
}

# Check if model exists, if not create a simple model
MODEL_PATH = 'career_model.pkl'
SCALER_PATH = 'career_scaler.pkl'

def create_sample_model():
    """Create a simple model if one doesn't exist"""
    print("Creating new career prediction model...")
    
    # Create a simple random forest classifier
    model = RandomForestClassifier(n_estimators=100, random_state=42)
    
    # Create some sample training data
    # Features: [programming, database, problem_solving, communication, interest, experience]
    X_train = np.array([
        [4, 3, 4, 3, 1, 3],  # Software Developer
        [4, 3, 4, 3, 1, 2],  # Software Developer
        [3, 4, 4, 3, 2, 3],  # Data Scientist
        [3, 4, 4, 3, 4, 2],  # Data Scientist
        [3, 2, 4, 4, 1, 2],  # UI/UX Designer
        [2, 2, 4, 4, 1, 2],  # UI/UX Designer
        [4, 3, 4, 3, 3, 3],  # Cybersecurity Specialist
        [3, 3, 4, 3, 3, 2],  # Cybersecurity Specialist
        [3, 3, 3, 3, 1, 3],  # Network Engineer
        [3, 2, 3, 3, 1, 2],  # Network Engineer
        [2, 2, 4, 4, 5, 3],  # Business Analyst
        [2, 3, 4, 4, 5, 2],  # Business Analyst
        [2, 2, 3, 4, 5, 4],  # Project Manager
        [2, 2, 3, 4, 5, 3],  # Project Manager
        [2, 2, 3, 4, 1, 2],  # Digital Marketer
        [1, 1, 3, 4, 1, 2],  # Digital Marketer
        [2, 1, 3, 4, 1, 2],  # Content Creator
        [1, 1, 3, 4, 1, 1],  # Content Creator
        [3, 2, 4, 4, 1, 2],  # Technical Writer
        [2, 2, 3, 4, 1, 2],  # Technical Writer
    ])
    
    # Labels
    y_train = np.array([0, 0, 1, 1, 2, 2, 3, 3, 4, 4, 5, 5, 6, 6, 7, 7, 8, 8, 9, 9])
    
    # Create and fit scaler
    scaler = StandardScaler()
    X_scaled = scaler.fit_transform(X_train)
    
    # Train the model
    model.fit(X_scaled, y_train)
    
    # Save the model and scaler
    with open(MODEL_PATH, 'wb') as f:
        pickle.dump(model, f)
    
    with open(SCALER_PATH, 'wb') as f:
        pickle.dump(scaler, f)
    
    return model, scaler

# Load or create model
if not os.path.exists(MODEL_PATH) or not os.path.exists(SCALER_PATH):
    model, scaler = create_sample_model()
else:
    with open(MODEL_PATH, 'rb') as f:
        model = pickle.load(f)
    with open(SCALER_PATH, 'rb') as f:
        scaler = pickle.load(f)

@app.route('/')
def home():
    return render_template('career_home.html')

@app.route('/predict', methods=['POST'])
def predict():
    if request.method == 'POST':
        # Get form data
        form_data = request.form
        
        # Extract features
        features = [
            int(form_data.get('programming', 1)),
            int(form_data.get('database', 1)),
            int(form_data.get('problem_solving', 1)),
            int(form_data.get('communication', 1)),
            int(form_data.get('interest', 1)),
            int(form_data.get('experience', 1))
        ]
        
        # Convert to numpy array and reshape
        features_array = np.array(features).reshape(1, -1)
        
        # Scale features
        scaled_features = scaler.transform(features_array)
        
        # Make prediction
        prediction = model.predict(scaled_features)[0]
        
        # Get prediction probabilities
        proba = model.predict_proba(scaled_features)[0]
        
        # Get top 3 career recommendations
        top_indices = proba.argsort()[-3:][::-1]
        
        # Create recommendations
        recommendations = []
        for idx in top_indices:
            if proba[idx] > 0.05:  # Only include if probability > 5%
                recommendations.append({
                    'career': CAREER_CATEGORIES[idx],
                    'probability': round(proba[idx] * 100, 2)
                })
        
        # Career descriptions
        career_descriptions = {
            'Software Developer': 'Builds applications and systems using programming languages and frameworks.',
            'Data Scientist': 'Analyzes and interprets complex data to help organizations make better decisions.',
            'UI/UX Designer': 'Creates user-friendly interfaces and enhances user experience for digital products.',
            'Cybersecurity Specialist': 'Protects systems and networks from digital attacks and threats.',
            'Network Engineer': 'Designs, implements and manages computer networks for organizations.',
            'Business Analyst': 'Analyzes business processes and recommends improvements.',
            'Project Manager': 'Plans, executes, and closes projects efficiently.',
            'Digital Marketer': 'Promotes brands and products through digital channels.',
            'Content Creator': 'Develops engaging content for various platforms and audiences.',
            'Technical Writer': 'Creates documentation for technical products and processes.'
        }
        
        # Skill recommendations for each career
        skill_recommendations = {
            'Software Developer': ['Programming (Python, Java, JavaScript)', 'Web Development', 'Database Management', 'Version Control', 'Problem Solving'],
            'Data Scientist': ['Python', 'Statistics', 'Machine Learning', 'Data Visualization', 'SQL'],
            'UI/UX Designer': ['User Research', 'Wireframing', 'Prototyping', 'Visual Design', 'User Testing'],
            'Cybersecurity Specialist': ['Network Security', 'Ethical Hacking', 'Security Tools', 'Risk Assessment', 'Cryptography'],
            'Network Engineer': ['Network Protocols', 'Router Configuration', 'Network Security', 'Troubleshooting', 'Cloud Networking'],
            'Business Analyst': ['Requirements Analysis', 'Data Analysis', 'Process Modeling', 'Communication', 'Problem Solving'],
            'Project Manager': ['Project Planning', 'Risk Management', 'Team Leadership', 'Budgeting', 'Stakeholder Management'],
            'Digital Marketer': ['SEO', 'Social Media Marketing', 'Content Strategy', 'Analytics', 'Email Marketing'],
            'Content Creator': ['Writing', 'Video Production', 'Graphic Design', 'Social Media', 'Audience Engagement'],
            'Technical Writer': ['Technical Documentation', 'Information Architecture', 'Clarity in Writing', 'Research', 'Tool Knowledge']
        }
        
        # Course recommendations for each career
        course_recommendations = {
            'Software Developer': ['The Complete Web Developer Bootcamp', 'Python for Everybody', 'Java Programming Masterclass', 'The Complete JavaScript Course', 'Database Design and Development'],
            'Data Scientist': ['Python for Data Science and Machine Learning', 'Statistics for Data Science', 'Machine Learning A-Z', 'SQL for Data Analysis', 'Data Visualization with Tableau'],
            'UI/UX Designer': ['UI/UX Design Specialization', 'User Experience Research and Design', 'Graphic Design Fundamentals', 'Web Design for Usability', 'Adobe XD Essential Training'],
            'Cybersecurity Specialist': ['CompTIA Security+ Certification', 'Ethical Hacking', 'Network Security Fundamentals', 'Cybersecurity Risk Management', 'Cryptography Basics'],
            'Network Engineer': ['CCNA Certification Course', 'Network Fundamentals', 'Cloud Networking Solutions', 'Network Security', 'Wireless Networking'],
            'Business Analyst': ['Business Analysis Fundamentals', 'SQL for Business Analysts', 'Data Analysis with Excel', 'Requirements Gathering Techniques', 'Process Modeling with BPMN'],
            'Project Manager': ['PMP Certification Prep', 'Agile Project Management', 'Project Risk Management', 'Leadership Skills for Project Managers', 'Project Budgeting and Cost Control'],
            'Digital Marketer': ['Digital Marketing Specialization', 'SEO Training Course', 'Social Media Marketing', 'Google Analytics Certification', 'Content Marketing Strategy'],
            'Content Creator': ['Content Creation Masterclass', 'Video Production Fundamentals', 'Graphic Design for Content Creators', 'Writing for Digital Platforms', 'Building an Audience Online'],
            'Technical Writer': ['Technical Writing Certification', 'Documentation Best Practices', 'API Documentation', 'Information Architecture', 'Technical Communication Skills']
        }
        
        return render_template(
            'career_results.html',
            recommendations=recommendations,
            top_career=recommendations[0]['career'] if recommendations else None,
            top_probability=recommendations[0]['probability'] if recommendations else None,
            career_descriptions=career_descriptions,
            skill_recommendations=skill_recommendations,
            course_recommendations=course_recommendations
        )

if __name__ == '__main__':
    app.run(debug=True) 