@extends('layouts.shop')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-r from-purple-600 via-pink-500 to-indigo-600 text-white overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-r from-purple-900/50 to-pink-900/50"></div>
        <div class="absolute top-0 left-0 w-96 h-96 bg-pink-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 leading-tight">
                <span class="block">Thời Trang</span>
                <span class="block bg-clip-text text-transparent bg-gradient-to-r from-yellow-200 to-pink-200">Phong Cách Hiện Đại</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-100 mb-8 max-w-3xl mx-auto">
                Khám phá bộ sưu tập quần áo thời thượng nhất 2025. Tự tin tỏa sáng với phong cách riêng của bạn
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('products.index') }}" class="inline-flex items-center px-8 py-4 bg-white text-purple-600 font-bold rounded-full hover:bg-gray-100 transition-all duration-200 shadow-2xl hover:shadow-3xl transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    Mua Sắm Ngay
                </a>
                <a href="{{ route('products.index') }}" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-purple-600 transition-all duration-200">
                    Khám Phá Bộ Sưu Tập
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-8 bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Miễn Phí Vận Chuyển</h3>
                <p class="text-gray-600">Đơn hàng từ 300.000đ trở lên</p>
            </div>
            
            <div class="text-center p-8 bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Đổi Trả 7 Ngày</h3>
                <p class="text-gray-600">Hoàn tiền 100% nếu không hài lòng</p>
            </div>
            
            <div class="text-center p-8 bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-green-500 to-teal-500 rounded-full mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Chất Lượng Đảm Bảo</h3>
                <p class="text-gray-600">Hàng chính hãng 100%</p>
            </div>
        </div>
    </div>
</div>

<!-- Products Section -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-12">
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-2">Sản Phẩm Nổi Bật</h2>
                <p class="text-gray-600">{{ $products->total() }} sản phẩm đang chờ bạn khám phá</p>
            </div>
            <a href="{{ route('products.index') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-500 text-white font-semibold rounded-lg hover:from-purple-700 hover:to-pink-600 transition-all duration-200 shadow-md hover:shadow-lg">
                Xem Tất Cả
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        @if($products->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($products as $product)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="relative">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     class="w-full h-64 object-cover" 
                                     alt="{{ $product->name }}">
                            @else
                                <div class="w-full h-64 bg-gradient-to-br from-purple-100 to-pink-100 flex items-center justify-center">
                                    <svg class="w-20 h-20 text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            @endif
                            
                            <span class="absolute top-3 left-3 bg-gradient-to-r from-purple-600 to-pink-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
                                {{ $product->category->name }}
                            </span>
                            
                            @if($product->stock > 0)
                                <span class="absolute top-3 right-3 bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
                                    Còn {{ $product->stock }}
                                </span>
                            @else
                                <span class="absolute top-3 right-3 bg-red-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
                                    Hết hàng
                                </span>
                            @endif
                        </div>
                        
                        <div class="p-5">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2 h-14">
                                {{ $product->name }}
                            </h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2 h-10">
                                {{ Str::limit($product->description, 80) }}
                            </p>
                            
                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-pink-500">
                                    {{ number_format($product->price, 0, ',', '.') }}đ
                                </span>
                                <a href="{{ route('products.show', $product->slug) }}" 
                                   class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-500 text-white font-medium rounded-lg hover:from-purple-700 hover:to-pink-600 transition-all duration-200 shadow-md hover:shadow-lg">
                                    <span>Xem</span>
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12 bg-gray-50 rounded-lg">
                <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                </svg>
                <p class="text-gray-500 text-lg">Chưa có sản phẩm nào</p>
            </div>
        @endif
    </div>
</div>

<!-- CTA Section -->
<div class="bg-gradient-to-r from-purple-600 via-pink-500 to-indigo-600 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
            Đăng Ký Nhận Ưu Đãi Đặc Biệt
        </h2>
        <p class="text-xl text-gray-100 mb-8">
            Giảm giá 20% cho đơn hàng đầu tiên khi đăng ký thành viên
        </p>
        <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-4 bg-white text-purple-600 font-bold rounded-full hover:bg-gray-100 transition-all duration-200 shadow-2xl hover:shadow-3xl transform hover:scale-105">
            Đăng Ký Ngay
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
            </svg>
        </a>
    </div>
</div>
@endsection
