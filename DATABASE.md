# 🗄️ Database Structure - Shop Quần Áo

## Tổng Quan

Database được tối ưu hóa chỉ giữ lại **3 bảng chính**:
- ✅ **users** - Quản lý người dùng
- ✅ **categories** - Danh mục sản phẩm
- ✅ **products** - Sản phẩm

---

## 📋 Chi Tiết Bảng

### 1️⃣ Users Table

**Mô tả:** Lưu thông tin người dùng (Admin và Customer)

| Column | Type | Nullable | Default | Description |
|--------|------|----------|---------|-------------|
| id | BIGINT | NO | AUTO | Primary Key |
| name | VARCHAR(255) | NO | - | Tên người dùng |
| email | VARCHAR(255) | NO | - | Email (unique) |
| email_verified_at | TIMESTAMP | YES | NULL | Thời gian verify email |
| password | VARCHAR(255) | NO | - | Password đã hash |
| role | VARCHAR(255) | NO | 'user' | Role: 'admin' hoặc 'user' |
| remember_token | VARCHAR(100) | YES | NULL | Token remember me |
| created_at | TIMESTAMP | YES | NULL | Ngày tạo |
| updated_at | TIMESTAMP | YES | NULL | Ngày cập nhật |

**Indexes:**
- PRIMARY KEY: `id`
- UNIQUE KEY: `email`

**Sample Data:**
```sql
-- Admin
id: 1
name: Admin User
email: admin@example.com
role: admin

-- User
id: 2
name: Regular User
email: user@example.com
role: user
```

---

### 2️⃣ Categories Table

**Mô tả:** Danh mục sản phẩm (Áo, Quần, Váy, v.v.)

| Column | Type | Nullable | Default | Description |
|--------|------|----------|---------|-------------|
| id | BIGINT | NO | AUTO | Primary Key |
| name | VARCHAR(255) | NO | - | Tên danh mục |
| slug | VARCHAR(255) | NO | - | URL-friendly name (unique) |
| created_at | TIMESTAMP | YES | NULL | Ngày tạo |
| updated_at | TIMESTAMP | YES | NULL | Ngày cập nhật |

**Indexes:**
- PRIMARY KEY: `id`
- UNIQUE KEY: `slug`

**Sample Data:**
```sql
id: 1, name: Áo Thun, slug: ao-thun
id: 2, name: Áo Sơ Mi, slug: ao-so-mi
id: 3, name: Quần Jean, slug: quan-jean
id: 4, name: Váy, slug: vay
id: 5, name: Áo Khoác, slug: ao-khoac
```

---

### 3️⃣ Products Table

**Mô tả:** Sản phẩm quần áo

| Column | Type | Nullable | Default | Description |
|--------|------|----------|---------|-------------|
| id | BIGINT | NO | AUTO | Primary Key |
| name | VARCHAR(255) | NO | - | Tên sản phẩm |
| slug | VARCHAR(255) | NO | - | URL-friendly name (unique) |
| description | TEXT | YES | NULL | Mô tả chi tiết |
| price | DECIMAL(10,2) | NO | - | Giá bán |
| image | VARCHAR(255) | YES | NULL | Đường dẫn file ảnh |
| stock | INTEGER | NO | 0 | Số lượng tồn kho |
| category_id | BIGINT | NO | - | Foreign Key -> categories.id |
| created_at | TIMESTAMP | YES | NULL | Ngày tạo |
| updated_at | TIMESTAMP | YES | NULL | Ngày cập nhật |

**Indexes:**
- PRIMARY KEY: `id`
- UNIQUE KEY: `slug`
- FOREIGN KEY: `category_id` REFERENCES `categories(id)`

**Sample Data:**
```sql
id: 1
name: Áo Thun Trắng Basic
slug: ao-thun-trang-basic
description: Áo thun cotton 100% thoáng mát
price: 150000.00
image: products/abc123.jpg
stock: 100
category_id: 1
```

---

## 🔗 Quan Hệ (Relationships)

```
categories (1) ----< (N) products
```

- Một **category** có nhiều **products**
- Một **product** thuộc về một **category**

---

## 📝 Migrations Files

Các file migration trong `database/migrations/`:

1. `2014_10_12_000000_create_users_table.php` - Tạo bảng users
2. `2024_01_01_000001_add_role_to_users_table.php` - Thêm cột role
3. `2024_01_01_000002_create_categories_table.php` - Tạo bảng categories
4. `2024_01_01_000003_create_products_table.php` - Tạo bảng products
5. `2024_01_01_000004_drop_unnecessary_tables.php` - Xóa bảng không cần thiết

---

## 🌱 Seeders

Các file seeder trong `database/seeders/`:

1. `UserSeeder.php` - Tạo 2 users (admin + user thường)
2. `CategorySeeder.php` - Tạo 5 categories mẫu
3. `ProductSeeder.php` - Tạo 10 products mẫu

---

## 🚀 Cài Đặt Database

### Lần Đầu
```bash
# 1. Tạo database
CREATE DATABASE shop_quan_ao CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

# 2. Cập nhật .env
DB_DATABASE=shop_quan_ao
DB_USERNAME=root
DB_PASSWORD=

# 3. Chạy migration và seeder
php artisan migrate
php artisan db:seed
```

### Reset Database (Xóa Data Cũ)
```bash
php artisan migrate:fresh --seed
```

### Hoặc Dùng Script
```bash
# Windows
fresh-database.bat

# Check database
mysql -u root -p shop_quan_ao < check-database.sql
```

---

## 📊 Truy Vấn Hữu Ích

### Lấy tất cả sản phẩm kèm category
```sql
SELECT p.*, c.name as category_name 
FROM products p 
INNER JOIN categories c ON p.category_id = c.id;
```

### Đếm sản phẩm theo category
```sql
SELECT c.name, COUNT(p.id) as product_count
FROM categories c
LEFT JOIN products p ON c.id = p.category_id
GROUP BY c.id, c.name;
```

### Sản phẩm còn hàng
```sql
SELECT * FROM products WHERE stock > 0 ORDER BY created_at DESC;
```

### Sản phẩm theo giá
```sql
SELECT * FROM products 
WHERE stock > 0 
ORDER BY price ASC 
LIMIT 10;
```

---

## 🔒 Security Notes

- ✅ Passwords được hash bằng bcrypt
- ✅ Foreign key constraints đảm bảo referential integrity
- ✅ Email field có unique constraint
- ✅ Slug fields có unique constraint để tránh trùng lặp

---

## 📈 Tối Ưu Hóa

Các index đã được tạo:
- ✅ Primary keys trên tất cả các bảng
- ✅ Unique indexes trên `email` và `slug` fields
- ✅ Foreign key index trên `category_id`

---

## 🛠️ Backup & Restore

### Backup
```bash
mysqldump -u root -p shop_quan_ao > backup_$(date +%Y%m%d).sql
```

### Restore
```bash
mysql -u root -p shop_quan_ao < backup_20231015.sql
```

---

**Cấu trúc database đơn giản, hiệu quả và dễ bảo trì! ✨**
