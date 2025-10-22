# Shop Quần Áo 
Ứng dụng web bán quần áo với Laravel 9, có đầy đủ chức năng quản lý sản phẩm, người dùng và phân quyền admin
## 📋 Mục lục

- [Giới thiệu]

- [Tính năng]

- [Tài khoản mẫu](#tài-khoản-mẫu)- [Simple, fast routing engine](https://laravel.com/docs/routing).


## 🎯 Giới thiệu

**Mục tiêu:**-

- Xây dựng ứng dụng web hoàn chỉnh với Laravel

- Áp dụng mô hình MVCLaravel is accessible, powerful, and provides tools required for large, robust applications.

- Thực hành CRUD với Eloquent ORM

- Phân quyền người dùng (Admin/User)## Learning Laravel

- Áp dụng các kỹ thuật bảo mật web
## ✨ Tính năng
### 👥 Chức năng người dùng (Client)

- ✅ Đăng ký / Đăng nhập (Laravel Breeze)## Laravel Sponsors

- ✅ Xem danh sách sản phẩm với phân trang

- ✅ Lọc sản phẩm theo danh mục

- ✅ Sắp xếp sản phẩm (giá, tên, mới nhất)

- ✅ Xem chi tiết sản phẩm### Premium Partners

- ✅ Xem sản phẩm liên quan

### 🛡️ Chức năng quản trị (Admin)

- ✅ Dashboard với thống kê tổng quan-

- ✅ **CRUD đầy đủ cho Product:

  - Create: Thêm sản phẩm mới- 

  - Read: Xem danh sách sản phẩm-

  - Update: Chỉnh sửa sản phẩm-

  - Delete: Xóa sản phẩm- 

- ✅ Quản lý người dùng (xem, xóa, phân quyền)- 

- ✅ Upload và quản lý ảnh sản phẩm- 

- ✅ Middleware phân quyền (chỉ admin truy cập)

### Backend

- **Laravel 9** - PHP Framework

- **MySQL** - DatabaseThank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

- **Laravel Breeze** - Authentication

- **Eloquent ORM** - Database operations## Code of Conduct



### Frontend
- **Blade Template** - Template engine

- **Bootstrap 5** - CSS Framework## Security Vulnerabilities

- **Bootstrap Icons** - Icon library


### 4. Authentication & Authorization
- Laravel Breeze cho authentication (login/register)
- Middleware `auth` bảo vệ route cần đăng nhập
- Middleware `admin` chỉ cho admin truy cập `/admin/*`

### 5. Validation
- StoreProductRequest và UpdateProductRequest
- Validation rules đầy đủ cho mọi input
- Custom error messages tiếng Việt

### 6. Session & Cookie Security
- Session sử dụng Laravel default config (secure)
- Cookie được bảo vệ với httpOnly và secure flags
- HTTPS recommended cho production

### 7. File Upload Security
- Validate file type (chỉ chấp nhận image)
- Giới hạn kích thước file (max 2MB)
- Store trong `storage/app/public` (không accessible trực tiếp)

## 👤 Tài khoản mẫu

### 🔴 Admin (Toàn quyền)
- **Email:** admin@example.com
- **Password:** password
- **Quyền:** Administrator - Truy cập tất cả chức năng

### 🔵 User thường
- **Email:** user@example.com
- **Password:** password
- **Quyền:** Chỉ xem sản phẩm

### 🟢 User đăng ký (từ form)
- **Email:** duongqg@gmail.com
- **Password:** password
- **Quyền:** User thường

## 📚 Tài liệu tham khảo

- [Laravel 9 Documentation](https://laravel.com/docs/9.x)
- [Laravel Breeze](https://laravel.com/docs/9.x/starter-kits#laravel-breeze)
- [Bootstrap 5](https://getbootstrap.com/docs/5.3)
- [Eloquent ORM](https://laravel.com/docs/9.x/eloquent)


### Điểm nổi bật của project:

1. ✅ **MVC đầy đủ:** Model, View, Controller tách biệt rõ ràng
2. ✅ **CRUD hoàn chỉnh:** Create, Read, Update, Delete cho Product
3. ✅ **Eloquent Relationships:** belongsTo, hasMany
4. ✅ **Authentication:** Laravel Breeze tích hợp sẵn
5. ✅ **Authorization:** Middleware phân quyền admin
6. ✅ **Validation:** FormRequest với rules đầy đủ
7. ✅ **Security:** CSRF, XSS, SQL Injection prevention
8. ✅ **UI/UX:** Bootstrap 5, responsive, modern design
9. ✅ **Database:** Migration, Seeder, Foreign key
10. ✅ **File Upload:** Xử lý upload ảnh an toàn

### Các tính năng đã implement:

- ✅ Đăng ký / Đăng nhập (Breeze)
- ✅ Trang chủ với danh sách sản phẩm
- ✅ Lọc và sắp xếp sản phẩm
- ✅ Chi tiết sản phẩm + sản phẩm liên quan
- ✅ Admin Dashboard với thống kê
- ✅ Quản lý sản phẩm (CRUD đầy đủ)
- ✅ Upload ảnh sản phẩm
- ✅ Quản lý người dùng
- ✅ Phân quyền admin/user
- ✅ Validation và error handling
- ✅ Session và authentication
- ✅ Responsive design
