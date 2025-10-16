#!/bin/bash

# ========================================
# Script Setup Tự Động - Shop Quần Áo (Linux/Mac)
# ========================================

echo ""
echo "========================================"
echo "  SETUP PROJECT - SHOP QUAN AO"
echo "========================================"
echo ""

# Kiểm tra Composer
if ! command -v composer &> /dev/null; then
    echo "[ERROR] Composer chưa được cài đặt!"
    echo "Vui lòng cài đặt tại: https://getcomposer.org/download/"
    exit 1
fi

# Kiểm tra Node.js
if ! command -v node &> /dev/null; then
    echo "[ERROR] Node.js chưa được cài đặt!"
    echo "Vui lòng cài đặt tại: https://nodejs.org/"
    exit 1
fi

# Kiểm tra PHP
if ! command -v php &> /dev/null; then
    echo "[ERROR] PHP chưa được cài đặt!"
    exit 1
fi

echo "[1/8] Checking requirements... OK"
echo ""

# Bước 1: Copy .env file
echo "[2/8] Creating .env file..."
if [ ! -f .env ]; then
    cp .env.example .env
    echo ".env file created!"
else
    echo ".env file already exists, skipping..."
fi
echo ""

# Bước 2: Install Composer dependencies
echo "[3/8] Installing PHP dependencies (composer install)..."
composer install
if [ $? -ne 0 ]; then
    echo "[ERROR] Composer install failed!"
    exit 1
fi
echo ""

# Bước 3: Generate Application Key
echo "[4/8] Generating application key..."
php artisan key:generate
echo ""

# Bước 4: Install NPM dependencies
echo "[5/8] Installing Node.js dependencies (npm install)..."
npm install
if [ $? -ne 0 ]; then
    echo "[ERROR] NPM install failed!"
    exit 1
fi
echo ""

# Bước 5: Compile assets
echo "[6/8] Compiling assets (npm run dev)..."
npm run dev
echo ""

# Bước 6: Tạo thư mục storage
echo "[7/8] Creating storage directories..."
mkdir -p storage/app/public/products
mkdir -p storage/logs
mkdir -p bootstrap/cache
echo "Storage directories created!"
echo ""

# Bước 7: Set permissions
echo "[8/8] Setting permissions..."
chmod -R 775 storage bootstrap/cache
echo "Permissions set!"
echo ""

echo "========================================"
echo "  SETUP COMPLETED!"
echo "========================================"
echo ""
echo "Các bước tiếp theo:"
echo ""
echo "1. Cập nhật thông tin database trong file .env"
echo "   - DB_DATABASE=shop_quan_ao"
echo "   - DB_USERNAME=root"
echo "   - DB_PASSWORD="
echo ""
echo "2. Tạo database trong MySQL:"
echo "   CREATE DATABASE shop_quan_ao;"
echo ""
echo "3. Chạy migration và seeder:"
echo "   php artisan migrate"
echo "   php artisan db:seed"
echo ""
echo "4. Tạo symbolic link:"
echo "   php artisan storage:link"
echo ""
echo "5. Khởi động server:"
echo "   php artisan serve"
echo ""
echo "6. Mở trình duyệt và truy cập:"
echo "   http://127.0.0.1:8000"
echo ""
echo "========================================"
echo "Tài khoản Admin:"
echo "Email: admin@example.com"
echo "Password: password"
echo "========================================"
echo ""
