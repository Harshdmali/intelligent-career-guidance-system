@echo off
echo ===================================================
echo        CAREER PREDICTION SERVER LAUNCHER
echo ===================================================
echo.

REM Check if Python is installed
python --version >nul 2>&1
if %errorlevel% neq 0 (
    echo ERROR: Python is not installed or not in PATH.
    echo Please install Python 3.7 or higher and try again.
    echo.
    pause
    exit /b 1
)

echo Checking required packages...
pip show flask scikit-learn numpy >nul 2>&1
if %errorlevel% neq 0 (
    echo Installing required packages...
    pip install -r requirements.txt
    if %errorlevel% neq 0 (
        echo ERROR: Failed to install required packages.
        echo Please run 'pip install -r requirements.txt' manually.
        echo.
        pause
        exit /b 1
    )
)

echo.
echo Starting Career Prediction Server...
echo.
echo Server Information:
echo - URL: http://127.0.0.1:5000/
echo - Press Ctrl+C to stop the server when you're done
echo.
echo ===================================================
echo.

python career_prediction.py

echo.
echo Server has stopped.
pause 