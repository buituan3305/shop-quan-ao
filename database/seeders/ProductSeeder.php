<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Tạo dữ liệu sản phẩm mẫu dựa trên hình ảnh giao diện
     */
    public function run(): void
    {
        // Lấy ID của danh mục Áo và Quần
        $categoryAo = Category::where('slug', 'ao')->first();
        $categoryQuan = Category::where('slug', 'quan')->first();

        $products = [
            [
                'name' => 'Áo Polo Den',
                'slug' => 'ao-polo-den',
                'description' => 'Áo polo nam basic đơn giản lịch sự',
                'price' => 200000,
                'image' => 'polo-den.jpg',
                'stock' => 100,
                'category_id' => $categoryAo->id,
            ],
            [
                'name' => 'Áo Thun Basic',
                'slug' => 'ao-thun-basic',
                'description' => 'Áo thun cotton 100% thoáng mát, form rộng thoải mái',
                'price' => 150000,
                'image' => 'thun-basic.jpg',
                'stock' => 50,
                'category_id' => $categoryAo->id,
            ],
            [
                'name' => 'Áo Sơ Mi Trắng',
                'slug' => 'ao-so-mi-trang',
                'description' => 'Áo sơ mi trắng công sở, vải lụa mềm mại',
                'price' => 350000,
                'image' => 'so-mi-trang.jpg',
                'stock' => 30,
                'category_id' => $categoryAo->id,
            ],
            [
                'name' => 'Áo Khoác Jean',
                'slug' => 'ao-khoac-jean',
                'description' => 'Áo khoác jean cao cấp, phong cách năng động',
                'price' => 550000,
                'image' => 'khoac-jean.jpg',
                'stock' => 20,
                'category_id' => $categoryAo->id,
            ],
            [
                'name' => 'Quần Jean Slim Fit',
                'slug' => 'quan-jean-slim-fit',
                'description' => 'Quần jean co giãn nhẹ, ôm body, màu xanh đậm',
                'price' => 450000,
                'image' => 'jean-slim.jpg',
                'stock' => 40,
                'category_id' => $categoryQuan->id,
            ],
            [
                'name' => 'Quần Tây Công Sở',
                'slug' => 'quan-tay-cong-so',
                'description' => 'Quần tây vải tốt, phù hợp đi làm và sự kiện',
                'price' => 380000,
                'image' => 'quan-tay.jpg',
                'stock' => 35,
                'category_id' => $categoryQuan->id,
            ],
            [
                'name' => 'Quần Short Kaki',
                'slug' => 'quan-short-kaki',
                'description' => 'Quần short kaki năng động, thoải mái',
                'price' => 250000,
                'image' => 'short-kaki.jpg',
                'stock' => 60,
                'category_id' => $categoryQuan->id,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
