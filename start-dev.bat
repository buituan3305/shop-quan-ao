@echo off
REM ========================================
REM Script Khởi Động Development Server
REM ========================================

echo.
echo ========================================
echo   STARTING DEVELOPMENT SERVERS
echo ========================================
echo.

echo Starting Laravel server...
echo Server will run at: http://127.0.0.1:8000
echo.
echo Press Ctrl+C to stop the server
echo.
echo ========================================
echo.

REM Mở 2 terminal: 1 cho Laravel server, 1 cho npm watch
start "Laravel Server" cmd /k "php artisan serve"
timeout /t 2 /nobreak >nul
start "NPM Watch" cmd /k "npm run watch"

echo.
echo Servers started!
echo - Laravel: http://127.0.0.1:8000
echo - NPM Watch: Running in separate window
echo.
echo Close the terminal windows to stop servers.
echo.
