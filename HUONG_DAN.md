# Hướng dẫn sử dụng hệ thống Shop Quần Áo

## 🚀 Khởi động dự án

### 1. Khởi động Laravel Server
```bash
cd "d:\QuanAo\shop-quan-ao"
php artisan serve
```
Server sẽ chạy tại: http://127.0.0.1:8000

### 2. Khởi động Laravel Mix (để compile CSS/JS)
```bash
cd "d:\QuanAo\shop-quan-ao"
npm run watch
```

## 👤 Thông tin đăng nhập

### Tài khoản Admin:
- **Email**: admin@example.com
- **Password**: password
- **Quyền**: Toàn quyền quản lý hệ thống

### Tài khoản User:
- **Email**: user@example.com
- **Password**: password
- **Quyền**: Chỉ xem sản phẩm

### Tài khoản User 2:
- **Email**: duongqg@gmail.com
- **Password**: password
- **Quyền**: Chỉ xem sản phẩm

## 🌐 Các trang web

### Phần khách hàng:
- **Trang chủ / Danh sách sản phẩm**: http://127.0.0.1:8000/
- **Chi tiết sản phẩm**: http://127.0.0.1:8000/products/{id}

### Phần Admin (Yêu cầu đăng nhập với tài khoản admin):
- **Dashboard**: http://127.0.0.1:8000/admin/dashboard
- **Quản lý sản phẩm**: http://127.0.0.1:8000/admin/products
- **Thêm sản phẩm**: http://127.0.0.1:8000/admin/products/create
- **Quản lý người dùng**: http://127.0.0.1:8000/admin/users

## ✨ Tính năng

### Phần khách hàng:
- ✅ Xem danh sách sản phẩm với ảnh đẹp
- ✅ Lọc sản phẩm theo danh mục
- ✅ Sắp xếp theo giá, tên
- ✅ Xem chi tiết sản phẩm
- ✅ Header gradient đẹp (xanh-tím-hồng)
- ✅ Responsive design

### Phần Admin:
- ✅ Dashboard với 4 thẻ thống kê màu gradient:
  - Tổng người dùng (màu tím)
  - Tổng sản phẩm (màu hồng)
  - Danh mục (màu xanh)
  - Số tiền hàng (màu cam)
- ✅ Bảng sản phẩm mới nhất
- ✅ Quản lý sản phẩm (CRUD):
  - Thêm sản phẩm mới
  - Sửa sản phẩm
  - Xóa sản phẩm
  - Upload ảnh sản phẩm
- ✅ Quản lý người dùng:
  - Xem danh sách người dùng
  - Phân quyền Admin/User
  - Xóa người dùng
- ✅ Sidebar navigation đẹp (màu tím đậm)
- ✅ Header gradient giống phần khách hàng

## 🎨 Màu sắc chủ đạo

- **Primary**: Gradient tím-xanh (#667eea → #764ba2)
- **Secondary**: Gradient hồng (#f093fb → #f5576c)
- **Accent**: Gradient xanh dương (#4facfe → #00f2fe)
- **Warning**: Gradient cam-vàng (#fa709a → #fee140)

## 📁 Cấu trúc thư mục chính

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/
│   │   │   ├── AdminController.php    # Dashboard admin
│   │   │   ├── ProductController.php  # Quản lý sản phẩm
│   │   │   └── UserController.php     # Quản lý người dùng
│   │   └── ProductController.php      # Sản phẩm phần khách hàng
│   └── Middleware/
│       ├── AdminMiddleware.php        # Middleware kiểm tra admin
│       └── IsAdmin.php                # Middleware phân quyền

resources/
├── views/
│   ├── layouts/
│   │   ├── admin.blade.php           # Layout admin
│   │   ├── shop.blade.php            # Layout khách hàng
│   │   └── guest.blade.php           # Layout login/register
│   ├── admin/
│   │   ├── dashboard.blade.php       # Dashboard admin
│   │   ├── products/
│   │   │   ├── index.blade.php       # Danh sách sản phẩm admin
│   │   │   ├── create.blade.php      # Thêm sản phẩm
│   │   │   └── edit.blade.php        # Sửa sản phẩm
│   │   └── users/
│   │       └── index.blade.php       # Quản lý người dùng
│   └── products/
│       ├── index.blade.php           # Danh sách sản phẩm khách hàng
│       └── show.blade.php            # Chi tiết sản phẩm

routes/
└── web.php                           # Routes định nghĩa
```

## 🔐 Bảo mật

- ✅ CSRF Protection
- ✅ Middleware phân quyền Admin
- ✅ Validation dữ liệu
- ✅ Hash password
- ✅ XSS Prevention

## 📝 Lưu ý

1. Đảm bảo đã chạy migration và seed data:
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

2. Đảm bảo folder storage/app/public có quyền ghi
3. Đảm bảo đã tạo symbolic link cho storage:
   ```bash
   php artisan storage:link
   ```

4. Nếu thay đổi CSS/JS, chạy lại:
   ```bash
   npm run dev
   # hoặc
   npm run watch
   ```

## 🎯 Demo

1. Truy cập http://127.0.0.1:8000
2. Đăng nhập bằng tài khoản admin@example.com / password
3. Khám phá tính năng quản lý
4. Đăng xuất và xem giao diện khách hàng

---

**Chúc bạn sử dụng vui vẻ! 🎉**
