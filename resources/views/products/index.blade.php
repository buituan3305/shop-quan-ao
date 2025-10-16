@extends('layouts.shop')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-purple-600 via-pink-500 to-indigo-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Khám Phá Bộ Sưu Tập</h1>
            <p class="text-xl text-gray-100">Phong cách thời trang hiện đại cho bạn</p>
        </div>
    </div>
</div>

<!-- Breadcrumb -->
<div class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <nav class="flex items-center space-x-2 text-sm">
            <a href="{{ route('products.index') }}" class="text-purple-600 hover:text-purple-800">Trang chủ</a>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="text-gray-600">Sản phẩm</span>
        </nav>
    </div>
</div>

<!-- Products Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Sidebar Filter -->
        <div class="lg:col-span-1">
            <!-- Category Filter -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                <div class="bg-gradient-to-r from-purple-600 to-indigo-600 px-6 py-4">
                    <h3 class="text-white font-semibold flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        Danh mục
                    </h3>
                </div>
                <div class="divide-y">
                    <a href="{{ route('products.index') }}" 
                       class="block px-6 py-3 hover:bg-purple-50 transition {{ !request('category') ? 'bg-purple-50 text-purple-700 font-medium' : 'text-gray-700' }}">
                        <div class="flex items-center justify-between">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                </svg>
                                Tất cả
                            </span>
                        </div>
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('products.index', ['category' => $category->id]) }}" 
                           class="block px-6 py-3 hover:bg-purple-50 transition {{ request('category') == $category->id ? 'bg-purple-50 text-purple-700 font-medium' : 'text-gray-700' }}">
                            <div class="flex items-center justify-between">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $category->name }}
                                </span>
                                <span class="bg-purple-100 text-purple-700 text-xs font-medium px-2 py-1 rounded-full">
                                    {{ $category->products_count ?? $category->products->count() }}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Sort Options -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-gradient-to-r from-pink-500 to-purple-600 px-6 py-4">
                    <h3 class="text-white font-semibold flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path>
                        </svg>
                        Sắp xếp
                    </h3>
                </div>
                <div class="divide-y">
                    <a href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'latest'])) }}" 
                       class="block px-6 py-3 hover:bg-pink-50 transition {{ request('sort') == 'latest' || !request('sort') ? 'bg-pink-50 text-pink-700 font-medium' : 'text-gray-700' }}">
                        Mới nhất
                    </a>
                    <a href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'price_asc'])) }}" 
                       class="block px-6 py-3 hover:bg-pink-50 transition {{ request('sort') == 'price_asc' ? 'bg-pink-50 text-pink-700 font-medium' : 'text-gray-700' }}">
                        Giá tăng dần
                    </a>
                    <a href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'price_desc'])) }}" 
                       class="block px-6 py-3 hover:bg-pink-50 transition {{ request('sort') == 'price_desc' ? 'bg-pink-50 text-pink-700 font-medium' : 'text-gray-700' }}">
                        Giá giảm dần
                    </a>
                    <a href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'name'])) }}" 
                       class="block px-6 py-3 hover:bg-pink-50 transition {{ request('sort') == 'name' ? 'bg-pink-50 text-pink-700 font-medium' : 'text-gray-700' }}">
                        Tên A-Z
                    </a>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="lg:col-span-3">
            <!-- Results Count -->
            <div class="mb-6 flex items-center justify-between">
                <p class="text-gray-600">
                    Tìm thấy <span class="font-semibold text-purple-600">{{ $products->total() }}</span> sản phẩm
                </p>
            </div>

            @if($products->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    @foreach($products as $product)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                            <!-- Product Image -->
                            <div class="relative">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         class="w-full h-64 object-cover" 
                                         alt="{{ $product->name }}">
                                @else
                                    <div class="w-full h-64 bg-gray-100 flex items-center justify-center">
                                        <svg class="w-20 h-20 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                @endif
                                
                                <!-- Category Badge -->
                                <span class="absolute top-3 left-3 bg-purple-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
                                    {{ $product->category->name }}
                                </span>
                                
                                <!-- Stock Badge -->
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
                            
                            <!-- Product Info -->
                            <div class="p-5">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2 h-14">
                                    {{ $product->name }}
                                </h3>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2 h-10">
                                    {{ Str::limit($product->description, 80) }}
                                </p>
                                
                                <div class="flex items-center justify-between">
                                    <div>
                                        <span class="text-2xl font-bold text-purple-600">
                                            {{ number_format($product->price, 0, ',', '.') }}đ
                                        </span>
                                    </div>
                                    <a href="{{ route('products.show', $product->slug) }}" 
                                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-500 text-white font-medium rounded-lg hover:from-purple-700 hover:to-pink-600 transition-all duration-200 shadow-md hover:shadow-lg">
                                        <span>Chi tiết</span>
                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8 flex justify-center">
                    {{ $products->appends(request()->query())->links() }}
                </div>
            @else
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 text-center">
                    <svg class="w-16 h-16 text-blue-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-blue-700 text-lg font-medium">Không tìm thấy sản phẩm nào phù hợp</p>
                    <a href="{{ route('products.index') }}" class="inline-block mt-4 text-purple-600 hover:text-purple-800 font-medium">
                        Xem tất cả sản phẩm →
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
