<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Hiển thị trang dashboard cho admin
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Thống kê tổng quan
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $activeUsers = User::where('role', 'user')->count();
        
        // Sản phẩm mới nhất
        $recentProducts = Product::with('category')->latest()->take(5)->get();
        
        return view('admin.dashboard', compact(
            'totalUsers',
            'totalProducts',
            'totalCategories',
            'activeUsers',
            'recentProducts'
        ));
    }
}
