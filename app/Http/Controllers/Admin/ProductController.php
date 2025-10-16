<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the products (Admin)
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product
     * 
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created product in database
     * Áp dụng CSRF protection và validation thông qua StoreProductRequest
     * 
     * @param StoreProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {
        // Dữ liệu đã được validate qua StoreProductRequest
        $data = $request->validated();
        
        // Tạo slug từ tên sản phẩm (tránh XSS)
        $data['slug'] = Str::slug($data['name']);
        
        // Xử lý upload ảnh nếu có
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }
        
        // Tạo sản phẩm mới (sử dụng Eloquent ORM - tránh SQL Injection)
        Product::create($data);
        
        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Sản phẩm đã được thêm thành công!');
    }

    /**
     * Show the form for editing the specified product
     * 
     * @param Product $product
     * @return \Illuminate\View\View
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified product in database
     * Áp dụng CSRF protection và validation thông qua UpdateProductRequest
     * 
     * @param UpdateProductRequest $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // Dữ liệu đã được validate
        $data = $request->validated();
        
        // Cập nhật slug
        $data['slug'] = Str::slug($data['name']);
        
        // Xử lý upload ảnh mới nếu có
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }
        
        // Cập nhật sản phẩm (Eloquent ORM - tránh SQL Injection)
        $product->update($data);
        
        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Sản phẩm đã được cập nhật!');
    }

    /**
     * Remove the specified product from database
     * 
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        // Xóa ảnh nếu có
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        
        // Xóa sản phẩm
        $product->delete();
        
        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Sản phẩm đã được xóa!');
    }
}
