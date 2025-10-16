# 🚀 Hướng Dẫn Setup Project - Shop Quần Áo

## 📋 Yêu Cầu Hệ Thống

- **PHP** >= 8.0
- **Composer** (latest)
- **Node.js** >= 14.x và **npm** >= 6.x
- **MySQL** >= 5.7 hoặc **MariaDB** >= 10.3
- **Git** (để clone project)

---

## 🔧 Các Bước Cài Đặt

### 1️⃣ Clone Project

```bash
git clone <repository-url>
cd shop-quan-ao
```

### 2️⃣ Cài Đặt Dependencies

#### Cài đặt PHP dependencies
```bash
composer install
```

#### Cài đặt Node.js dependencies
```bash
npm install
```

### 3️⃣ Cấu Hình Environment

#### Copy file .env
```bash
# Windows PowerShell
copy .env.example .env

# Linux/Mac
cp .env.example .env
```

#### Sinh Application Key
```bash
php artisan key:generate
```

### 4️⃣ Cấu Hình Database

Mở file `.env` và cập nhật thông tin database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shop_quan_ao
DB_USERNAME=root
DB_PASSWORD=
```

**Tạo database:**
```sql
CREATE DATABASE shop_quan_ao CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 5️⃣ Chạy Migration và Seeder

```bash
# Chạy migration để tạo 3 bảng chính (users, categories, products)
php artisan migrate

# Seed data mẫu
php artisan db:seed

# Hoặc reset và seed lại từ đầu
php artisan migrate:fresh --seed

# Hoặc dùng script tự động (Windows)
fresh-database.bat
```

### 6️⃣ Tạo Symbolic Link cho Storage

**⚠️ Quan trọng: Cần chạy terminal với quyền Administrator**

```bash
# Windows (PowerShell as Administrator)
php artisan storage:link

# Hoặc dùng mklink
mklink /D "public\storage" "storage\app\public"
```

**Nếu không có quyền Administrator:**
```bash
# Copy thư mục (cần làm lại sau mỗi lần upload)
xcopy "storage\app\public" "public\storage" /E /I /Y
```

### 7️⃣ Compile Assets

#### Development (với watch mode)
```bash
npm run watch
```

#### Production
```bash
npm run production
```

#### Development (build một lần)
```bash
npm run dev
```

### 8️⃣ Khởi Động Server

```bash
# Khởi động Laravel development server
php artisan serve
```

Server sẽ chạy tại: **http://127.0.0.1:8000**

---

## 👥 Tài Khoản Mẫu

### Admin
- **Email:** admin@example.com
- **Password:** password
- **URL:** http://127.0.0.1:8000/admin/dashboard

### User (Khách hàng)
- **Email:** user@example.com
- **Password:** password
- **URL:** http://127.0.0.1:8000

---

## 📁 Cấu Trúc Thư Mục

```
shop-quan-ao/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/           # Admin controllers
│   │   │   │   ├── AdminController.php
│   │   │   │   ├── ProductController.php
│   │   │   │   └── UserController.php
│   │   │   ├── Auth/            # Auth controllers
│   │   │   └── ProductController.php  # Public product controller
│   │   └── Middleware/
│   │       └── AdminMiddleware.php    # Admin access control
│   └── Models/
│       ├── Category.php
│       ├── Product.php
│       └── User.php
├── database/
│   ├── migrations/              # Database migrations
│   └── seeders/                 # Data seeders
├── resources/
│   ├── css/
│   │   └── app.css             # Tailwind CSS
│   ├── js/
│   │   └── app.js
│   └── views/
│       ├── admin/              # Admin views
│       │   ├── dashboard.blade.php
│       │   ├── products/
│       │   └── users/
│       ├── products/           # Customer views
│       │   ├── index.blade.php
│       │   └── show.blade.php
│       ├── layouts/
│       │   ├── admin.blade.php
│       │   ├── shop.blade.php
│       │   └── guest.blade.php
│       └── home.blade.php
├── routes/
│   └── web.php                 # All web routes
├── public/
│   └── storage/                # Symbolic link to storage (create by artisan storage:link)
└── storage/
    └── app/
        └── public/
            └── products/       # Product images uploaded here
```

---

## 🎨 Features

### Admin Panel (`/admin`)
✅ Dashboard với thống kê
✅ Quản lý sản phẩm (CRUD)
✅ Quản lý danh mục
✅ Quản lý users
✅ Upload hình ảnh sản phẩm
✅ Giao diện Tailwind CSS hiện đại

### Customer Side
✅ Trang chủ với hero section
✅ Danh sách sản phẩm
✅ Filter theo danh mục
✅ Sắp xếp sản phẩm
✅ Chi tiết sản phẩm
✅ Sản phẩm liên quan
✅ Responsive design

---

## 🛠️ Lệnh Hữu Ích

### Tạo Controller
```bash
php artisan make:controller NomController
```

### Tạo Model
```bash
php artisan make:model TenModel -m  # -m để tạo migration cùng lúc
```

### Tạo Migration
```bash
php artisan make:migration create_table_name_table
```

### Tạo Seeder
```bash
php artisan make:seeder TenSeeder
```

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Clear all
php artisan optimize:clear
```

### Compile Assets
```bash
# Development
npm run dev

# Watch (auto compile on change)
npm run watch

# Production
npm run production
```

---

## 🐛 Xử Lý Lỗi Thường Gặp

### 1. Lỗi "Class not found"
```bash
composer dump-autoload
```

### 2. Lỗi "Storage link not found"
```bash
# Windows (Run as Administrator)
php artisan storage:link

# Hoặc
mklink /D "public\storage" "storage\app\public"
```

### 3. Lỗi Permission (Linux/Mac)
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### 4. Lỗi "Mix manifest not found"
```bash
npm install
npm run dev
```

### 5. Ảnh không hiển thị
- Kiểm tra symbolic link: `public/storage` → `storage/app/public`
- Kiểm tra file tồn tại trong `storage/app/public/products/`
- URL ảnh đúng format: `/storage/products/filename.jpg`

### 6. Lỗi Database Connection
- Kiểm tra MySQL/MariaDB đã chạy
- Kiểm tra thông tin trong `.env` (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD)
- Kiểm tra database đã được tạo

### 7. CSS/JS không load
```bash
npm install
npm run dev
php artisan cache:clear
```

---

## 📊 Database Schema

**Database chỉ có 3 bảng chính + 1 bảng migrations:**

### 1. Users Table
```sql
- id (bigint, primary key, auto_increment)
- name (varchar)
- email (varchar, unique)
- email_verified_at (timestamp, nullable)
- password (varchar)
- role (varchar, default: 'user') -- 'admin' hoặc 'user'
- remember_token (varchar, nullable)
- created_at (timestamp)
- updated_at (timestamp)
```

### 2. Categories Table
```sql
- id (bigint, primary key, auto_increment)
- name (varchar)
- slug (varchar, unique)
- created_at (timestamp)
- updated_at (timestamp)
```

### 3. Products Table
```sql
- id (bigint, primary key, auto_increment)
- name (varchar)
- slug (varchar, unique)
- description (text, nullable)
- price (decimal 10,2)
- image (varchar, nullable)
- stock (integer, default: 0)
- category_id (bigint, foreign key references categories.id)
- created_at (timestamp)
- updated_at (timestamp)
```

### 4. Migrations Table (System)
```sql
- id (int, primary key, auto_increment)
- migration (varchar)
- batch (int)
```

**Lưu ý:** 
- Đã xóa các bảng không cần thiết: `password_resets`, `failed_jobs`, `personal_access_tokens`
- Database được tối ưu hóa chỉ giữ lại những gì cần thiết

---

## 🌐 URLs

| Trang | URL | Yêu Cầu |
|-------|-----|---------|
| Trang chủ | http://127.0.0.1:8000 | Public |
| Danh sách sản phẩm | http://127.0.0.1:8000/products | Public |
| Chi tiết sản phẩm | http://127.0.0.1:8000/products/{slug} | Public |
| Đăng nhập | http://127.0.0.1:8000/login | Guest |
| Đăng ký | http://127.0.0.1:8000/register | Guest |
| Admin Dashboard | http://127.0.0.1:8000/admin/dashboard | Admin only |
| Quản lý sản phẩm | http://127.0.0.1:8000/admin/products | Admin only |
| Quản lý users | http://127.0.0.1:8000/admin/users | Admin only |

---

## 🎯 Tech Stack

- **Backend:** Laravel 9.x
- **Frontend:** Tailwind CSS 3.x, Alpine.js 3.x
- **Database:** MySQL/MariaDB
- **Build Tools:** Laravel Mix / Vite
- **Authentication:** Laravel Breeze

---

## 📝 Notes

1. **Symbolic Link:** Cần quyền Administrator để tạo symlink trên Windows
2. **Port MySQL:** Nếu dùng XAMPP/WAMP, port mặc định có thể là 3306 hoặc 3307
3. **Node Version:** Khuyến nghị dùng Node.js LTS (14.x hoặc 16.x)
4. **PHP Extensions Required:**
   - OpenSSL
   - PDO
   - Mbstring
   - Tokenizer
   - XML
   - Ctype
   - JSON
   - BCMath
   - Fileinfo

---

## 🔒 Security

⚠️ **Trước khi deploy production:**

1. Đổi `APP_KEY` mới
2. Đổi password mặc định của admin
3. Set `APP_DEBUG=false` trong `.env`
4. Set `APP_ENV=production`
5. Xóa hoặc bảo mật route `/register` nếu không cần
6. Cấu hình HTTPS
7. Cấu hình CORS nếu cần
8. Backup database thường xuyên

---

## 📞 Support

Nếu gặp vấn đề, hãy kiểm tra:
1. Laravel logs: `storage/logs/laravel.log`
2. Browser console (F12)
3. Network tab trong DevTools

---

## 📄 License

This project is open-source and available under the MIT License.

---

**Happy Coding! 🎉**
