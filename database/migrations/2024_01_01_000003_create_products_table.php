<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Tạo bảng products để lưu thông tin sản phẩm quần áo
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên sản phẩm
            $table->string('slug')->unique(); // Slug cho URL
            $table->text('description')->nullable(); // Mô tả chi tiết
            $table->decimal('price', 10, 2); // Giá bán (VNĐ)
            $table->string('image')->nullable(); // Đường dẫn ảnh sản phẩm
            $table->integer('stock')->default(0); // Số lượng tồn kho
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Khóa ngoại đến categories
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
