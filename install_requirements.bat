@echo off
echo ===================================================
echo        CAREER PREDICTION SYSTEM SETUP
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

echo Python is installed. Checking version...
python --version
echo.

echo Installing required packages...
pip install -r requirements.txt

if %errorlevel% neq 0 (
    echo.
    echo ERROR: Failed to install required packages.
    echo Please make sure you have internet connection and try again.
    echo.
    pause
    exit /b 1
)

echo.
echo ===================================================
echo Installation completed successfully!
echo.
echo You can now start the Career Prediction server by running:
echo start_career_server.bat
echo ===================================================
echo.

pause 