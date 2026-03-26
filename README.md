# Intelligent Career Guidance System

A comprehensive career guidance system that helps users make informed decisions about their career paths using machine learning and data analytics.

## Features

1. **Career Prediction**
   - Personalized career recommendations based on skills and interests
   - Machine learning-powered prediction system
   - Multiple career path suggestions
   - Probability-based recommendations

2. **Aptitude Testing**
   - Comprehensive skill assessment
   - Domain-specific questions
   - Detailed performance analysis

3. **Career Roadmaps**
   - Detailed learning paths for various careers
   - Industry-specific resources
   - Skill development guidelines

4. **Knowledge Network**
   - Educational resources
   - Industry insights
   - Latest career trends

5. **User Dashboard**
   - Personalized recommendations
   - Progress tracking
   - Recent activity history
   - Advanced analytics and visualizations

6. **Career Assistant Chatbot**
   - Interactive career guidance
   - Quick answers to common questions
   - Course recommendations
   - Skill development tips

## Career Categories

The system can recommend from the following career categories:
- Software Developer
- Data Scientist
- UI/UX Designer
- Cybersecurity Specialist
- Network Engineer
- Business Analyst
- Project Manager
- Digital Marketer
- Content Creator
- Technical Writer
- And more...

## Technical Stack

- Frontend: HTML5, CSS3, JavaScript, Bootstrap, Chart.js
- Backend: PHP, Python (Flask)
- Database: MySQL
- Machine Learning: scikit-learn

## Setup Instructions

### Prerequisites
- Python 3.7 or higher
- pip (Python package manager)
- XAMPP (for PHP and MySQL)

### Database Setup
```sql
CREATE DATABASE career_guidance;
USE career_guidance;
source user_progress.sql;
```

### Python Dependencies
```bash
pip install -r requirements.txt
```
Or simply run the `install_requirements.bat` file.

### Starting the System
1. Start XAMPP (Apache and MySQL)
2. Run the Python server:
   - Double-click on `start_career_server.bat` OR
   - Run `python career_prediction.py`
3. Access the application through: `http://localhost/INTELLIGENT-CAREER-GUIDANCE-SYSTEM-main`

## Using the Career Prediction System

1. **Access the Career Prediction Page**:
   - Log in to the system
   - Click on "Career Prediction" in the Services menu
   - Click the "Start Career Assessment" button

2. **Fill out the Assessment Form**:
   - Rate your programming skills
   - Indicate your comfort level with databases
   - Assess your problem-solving abilities
   - Rate your communication skills
   - Select your main interest area
   - Specify your experience level

3. **Get Your Career Recommendations**:
   - After submitting the form, you'll receive personalized career recommendations
   - The system will show your top career match along with other suitable options
   - Each recommendation includes a match percentage

4. **Explore Career Details**:
   - View detailed descriptions of each recommended career
   - See the key skills required for each career path
   - Find recommended courses to develop necessary skills

## Troubleshooting

### Connection Error
If you see "This site can't be reached" or "Connection refused" error:

1. Make sure the Python server is running
   - Check if the command prompt window with the server is still open
   - If not, start the server again using `start_career_server.bat`

2. Check for error messages in the server window
   - If there are errors, make sure all dependencies are installed:
     ```
     pip install -r requirements.txt
     ```

3. Try a different browser or clear your browser cache

### Other Issues
- **Missing Templates**: Make sure the `templates` folder contains `career_home.html` and `career_results.html`
- **Python Errors**: Check that you have all required Python packages installed
- **XAMPP Issues**: Ensure Apache is running in XAMPP

## Project Structure

```
INTELLIGENT-CAREER-GUIDANCE-SYSTEM-main/
├── css/                      # Stylesheets
├── js/                       # JavaScript files
├── img/                      # Images
├── templates/                # Python Flask templates
│   ├── career_home.html      # Career assessment form
│   └── career_results.html   # Career results display
├── career_prediction.php     # Career prediction interface
├── career_prediction.py      # Python server for predictions
├── aptitude_test.php         # Aptitude testing system
├── roadmaps.php              # Career roadmaps
├── dashboard.php             # User dashboard
├── chatbot.php               # Career assistant chatbot
├── career_model.pkl          # Trained ML model
├── career_scaler.pkl         # Data scaler for ML model
├── start_career_server.bat   # Batch file to start server
├── install_requirements.bat  # Batch file to install dependencies
└── requirements.txt          # Python dependencies
```

## Future Enhancements

1. Mobile application development
2. Advanced analytics dashboard
3. Integration with job portals
4. Video tutorials and resources
5. Community features
6. Real-time job market data integration
7. Personalized learning paths based on skill gaps
8. More detailed career roadmaps
9. Integration with online course platforms

## Need Help?

If you continue to experience issues, please contact the system administrator or refer to the documentation.
