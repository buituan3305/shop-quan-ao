# 🚀 Quick Start - Shop Quần Áo

## Cài Đặt Nhanh (5 phút)

### Windows

```bash
# 1. Clone project (nếu từ Git)
git clone <repository-url>
cd shop-quan-ao

# 2. Chạy setup tự động
setup.bat

# 3. Cập nhật file .env với thông tin database của bạn
# DB_DATABASE=shop_quan_ao
# DB_USERNAME=root
# DB_PASSWORD=

# 4. Tạo database
# Mở MySQL và chạy: CREATE DATABASE shop_quan_ao;

# 5. Setup database
setup-database.bat

# 6. Khởi động server
start-dev.bat
```

### Linux/Mac

```bash
# 1. Clone project
git clone <repository-url>
cd shop-quan-ao

# 2. Chạy setup
chmod +x setup.sh
bash setup.sh

# 3. Cập nhật .env với thông tin database

# 4. Tạo database
mysql -u root -p
CREATE DATABASE shop_quan_ao;
exit;

# 5. Setup database
php artisan migrate
php artisan db:seed
php artisan storage:link

# 6. Khởi động
php artisan serve
npm run watch    # Terminal khác
```

---

## 🎯 Truy Cập

**Trang chủ:** http://127.0.0.1:8000

**Admin Panel:** http://127.0.0.1:8000/admin/dashboard
- Email: admin@example.com
- Password: password

**User thường:** 
- Email: user@example.com
- Password: password

---

## 📝 Lưu Ý

1. **Storage Link:** Cần chạy terminal với quyền **Administrator** để tạo symbolic link:
   ```bash
   php artisan storage:link
   ```

2. **Port MySQL:** Kiểm tra port MySQL trong `.env`:
   - XAMPP thường dùng: `3306` hoặc `3307`
   - Laragon thường dùng: `3306`

3. **Node.js Version:** Khuyến nghị dùng Node.js LTS (14.x hoặc 16.x)

---

## ❓ Gặp Lỗi?

### Ảnh không hiển thị
```bash
php artisan storage:link
# Hoặc
sync-storage.bat
```

### CSS không load
```bash
npm install
npm run dev
```

### Database connection failed
- Kiểm tra MySQL đã chạy chưa
- Kiểm tra thông tin trong `.env`
- Kiểm tra database đã tạo chưa

---

## 📚 Hướng Dẫn Chi Tiết

Xem file [SETUP.md](SETUP.md) để biết hướng dẫn đầy đủ.

---

**Happy Coding! 🎉**
