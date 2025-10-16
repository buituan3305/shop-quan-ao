@echo off
REM ========================================
REM Script Clear Cache Laravel
REM ========================================

echo.
echo ========================================
echo   CLEARING LARAVEL CACHE
echo ========================================
echo.

echo [1/6] Clearing application cache...
php artisan cache:clear

echo [2/6] Clearing config cache...
php artisan config:clear

echo [3/6] Clearing route cache...
php artisan route:clear

echo [4/6] Clearing view cache...
php artisan view:clear

echo [5/6] Clearing compiled classes...
php artisan clear-compiled

echo [6/6] Optimizing autoloader...
composer dump-autoload

echo.
echo ========================================
echo   CACHE CLEARED SUCCESSFULLY!
echo ========================================
echo.

pause
