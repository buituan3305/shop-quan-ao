<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Tạo các danh mục sản phẩm mẫu
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Áo',
                'slug' => 'ao',
                'description' => 'Các loại áo thời trang nam nữ',
            ],
            [
                'name' => 'Quần',
                'slug' => 'quan',
                'description' => 'Các loại quần thời trang đa dạng',
            ],
            [
                'name' => 'Phụ kiện',
                'slug' => 'phu-kien',
                'description' => 'Phụ kiện thời trang',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
