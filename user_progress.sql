-- Table for user career goals
CREATE TABLE IF NOT EXISTS user_goals (
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    goal_title VARCHAR(100) NOT NULL,
    goal_type ENUM('primary', 'secondary') NOT NULL,
    progress INT DEFAULT 0,
    status ENUM('planned', 'in_progress', 'completed') DEFAULT 'planned',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Table for learning schedule
CREATE TABLE IF NOT EXISTS learning_schedule (
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    task_title VARCHAR(200) NOT NULL,
    task_date DATE NOT NULL,
    status ENUM('pending', 'in_progress', 'completed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Table for achievements
CREATE TABLE IF NOT EXISTS user_achievements (
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    badge_name VARCHAR(100) NOT NULL,
    badge_level INT DEFAULT 1,
    badge_icon VARCHAR(50) NOT NULL,
    earned_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Table for progress tracking
CREATE TABLE IF NOT EXISTS user_progress (
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    overall_progress INT DEFAULT 0,
    skills_progress INT DEFAULT 0,
    course_progress INT DEFAULT 0,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id)
); 