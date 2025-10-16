@echo off
REM ========================================
REM Script Fresh Database - Chỉ 3 Bảng Chính
REM ========================================

echo.
echo ========================================
echo   FRESH DATABASE SETUP
echo ========================================
echo.
echo CANH BAO: Script nay se XOA TOAN BO du lieu trong database!
echo.
set /p confirm="Ban co chac chan muon tiep tuc? (Y/N): "

if /i not "%confirm%"=="Y" (
    echo Huy bo thao tac.
    pause
    exit /b 0
)

echo.
echo [1/4] Dropping all tables...
php artisan migrate:fresh
if %ERRORLEVEL% NEQ 0 (
    echo [ERROR] Migration fresh failed!
    pause
    exit /b 1
)
echo Tables dropped and recreated!
echo.

echo [2/4] Running migrations (only 3 main tables)...
echo   - users (with role column)
echo   - categories
echo   - products
php artisan migrate
if %ERRORLEVEL% NEQ 0 (
    echo [ERROR] Migration failed!
    pause
    exit /b 1
)
echo Migration completed!
echo.

echo [3/4] Seeding database...
php artisan db:seed
if %ERRORLEVEL% NEQ 0 (
    echo [ERROR] Seeding failed!
    pause
    exit /b 1
)
echo Seeding completed!
echo.

echo [4/4] Creating storage link...
php artisan storage:link
if %ERRORLEVEL% NEQ 0 (
    echo [WARNING] Storage link failed! Can chay voi quyen Administrator
)
echo.

echo ========================================
echo   DATABASE SETUP COMPLETED!
echo ========================================
echo.
echo Database hien tai chi co 3 bang chinh:
echo   1. users (id, name, email, password, role)
echo   2. categories (id, name, slug)
echo   3. products (id, name, slug, description, price, image, stock, category_id)
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
