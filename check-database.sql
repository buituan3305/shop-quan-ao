-- ========================================
-- Kiểm Tra Database Schema
-- ========================================

-- Hiển thị tất cả các bảng
SHOW TABLES;

-- Kiểm tra cấu trúc bảng users
DESCRIBE users;

-- Kiểm tra cấu trúc bảng categories
DESCRIBE categories;

-- Kiểm tra cấu trúc bảng products
DESCRIBE products;

-- Đếm số lượng records trong mỗi bảng
SELECT 'users' as table_name, COUNT(*) as count FROM users
UNION ALL
SELECT 'categories', COUNT(*) FROM categories
UNION ALL
SELECT 'products', COUNT(*) FROM products;

-- Xem data mẫu
SELECT * FROM users;
SELECT * FROM categories;
SELECT * FROM products;
