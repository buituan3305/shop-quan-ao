<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Hiển thị trang chủ với danh sách sản phẩm
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Lấy tất cả sản phẩm với thông tin category
        $products = Product::with('category')->latest()->paginate(12);
        $categories = Category::all();
        
        return view('home', compact('products', 'categories'));
    }
}
