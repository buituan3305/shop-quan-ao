@echo off
REM ========================================
REM Script Chạy Migration và Seed Database
REM ========================================

echo.
echo ========================================
echo   DATABASE SETUP - SHOP QUAN AO
echo ========================================
echo.

echo [1/3] Running migrations...
php artisan migrate
if %ERRORLEVEL% NEQ 0 (
    echo [ERROR] Migration failed! Kiem tra ket noi database trong file .env
    pause
    exit /b 1
)
echo Migration completed!
echo.

echo [2/3] Seeding database...
php artisan db:seed
if %ERRORLEVEL% NEQ 0 (
    echo [ERROR] Seeding failed!
    pause
    exit /b 1
)
echo Seeding completed!
echo.

echo [3/3] Creating storage link...
php artisan storage:link
if %ERRORLEVEL% NEQ 0 (
    echo [WARNING] Storage link failed! Vui long chay terminal voi quyen Administrator
    echo Hoac chay lenh: mklink /D "public\storage" "storage\app\public"
)
echo.

echo ========================================
echo   DATABASE SETUP COMPLETED!
echo ========================================
echo.
echo Tai khoan da duoc tao:
echo.
echo ADMIN:
echo   Email: admin@example.com
echo   Password: password
echo.
echo USER:
echo   Email: user@example.com
echo   Password: password
echo.
echo ========================================

pause
