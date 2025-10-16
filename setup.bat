@echo off
REM ========================================
REM Script Setup Tự Động - Shop Quần Áo
REM ========================================

echo.
echo ========================================
echo   SETUP PROJECT - SHOP QUAN AO
echo ========================================
echo.

REM Kiểm tra Composer
where composer >nul 2>nul
if %ERRORLEVEL% NEQ 0 (
    echo [ERROR] Composer chua duoc cai dat!
    echo Vui long tai tai: https://getcomposer.org/download/
    pause
    exit /b 1
)

REM Kiểm tra Node.js
where node >nul 2>nul
if %ERRORLEVEL% NEQ 0 (
    echo [ERROR] Node.js chua duoc cai dat!
    echo Vui long tai tai: https://nodejs.org/
    pause
    exit /b 1
)

REM Kiểm tra PHP
where php >nul 2>nul
if %ERRORLEVEL% NEQ 0 (
    echo [ERROR] PHP chua duoc cai dat!
    pause
    exit /b 1
)

echo [1/8] Checking requirements... OK
echo.

REM Bước 1: Copy .env file
echo [2/8] Creating .env file...
if not exist .env (
    copy .env.example .env
    echo .env file created!
) else (
    echo .env file already exists, skipping...
)
echo.

REM Bước 2: Install Composer dependencies
echo [3/8] Installing PHP dependencies (composer install)...
call composer install
if %ERRORLEVEL% NEQ 0 (
    echo [ERROR] Composer install failed!
    pause
    exit /b 1
)
echo.

REM Bước 3: Generate Application Key
echo [4/8] Generating application key...
php artisan key:generate
echo.

REM Bước 4: Install NPM dependencies
echo [5/8] Installing Node.js dependencies (npm install)...
call npm install
if %ERRORLEVEL% NEQ 0 (
    echo [ERROR] NPM install failed!
    pause
    exit /b 1
)
echo.

REM Bước 5: Compile assets
echo [6/8] Compiling assets (npm run dev)...
call npm run dev
echo.

REM Bước 6: Tạo thư mục storage nếu chưa có
echo [7/8] Creating storage directories...
if not exist storage\app\public\products mkdir storage\app\public\products
if not exist storage\logs mkdir storage\logs
if not exist bootstrap\cache mkdir bootstrap\cache
echo Storage directories created!
echo.

REM Bước 7: Hiển thị hướng dẫn tiếp theo
echo [8/8] Setup completed!
echo.
echo ========================================
echo   CAC BUOC TIEP THEO
echo ========================================
echo.
echo 1. Cap nhat thong tin database trong file .env
echo    - DB_DATABASE=shop_quan_ao
echo    - DB_USERNAME=root
echo    - DB_PASSWORD=
echo.
echo 2. Tao database trong MySQL:
echo    CREATE DATABASE shop_quan_ao;
echo.
echo 3. Chay migration va seeder:
echo    php artisan migrate
echo    php artisan db:seed
echo.
echo 4. Tao symbolic link (Can Run as Administrator):
echo    php artisan storage:link
echo.
echo 5. Khoi dong server:
echo    php artisan serve
echo.
echo 6. Mo trinh duyet va truy cap:
echo    http://127.0.0.1:8000
echo.
echo ========================================
echo Tai khoan Admin:
echo Email: admin@example.com
echo Password: password
echo ========================================
echo.

pause
