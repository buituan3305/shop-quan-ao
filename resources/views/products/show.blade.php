@extends('layouts.shop')

@section('content')
<!-- Breadcrumb -->
<div class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <nav class="flex items-center space-x-2 text-sm">
            <a href="{{ route('products.index') }}" class="text-purple-600 hover:text-purple-800">Trang chủ</a>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <a href="{{ route('products.index') }}" class="text-purple-600 hover:text-purple-800">Sản phẩm</a>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <a href="{{ route('products.index', ['category' => $product->category_id]) }}" class="text-purple-600 hover:text-purple-800">{{ $product->category->name }}</a>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="text-gray-600">{{ Str::limit($product->name, 30) }}</span>
        </nav>
    </div>
</div>

<!-- Product Detail -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <!-- Product Image -->
        <div class="space-y-4">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         class="w-full h-[500px] object-cover" 
                         alt="{{ $product->name }}">
                @else
                    <div class="w-full h-[500px] bg-gradient-to-br from-purple-100 to-pink-100 flex items-center justify-center">
                        <svg class="w-32 h-32 text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                @endif
            </div>
        </div>

        <!-- Product Info -->
        <div class="space-y-6">
            <!-- Category Badge -->
            <div>
                <span class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-500 text-white text-sm font-semibold rounded-full">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                    </svg>
                    {{ $product->category->name }}
                </span>
            </div>

            <!-- Product Name -->
            <h1 class="text-4xl font-bold text-gray-900">{{ $product->name }}</h1>
            
            <!-- Price -->
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-6 border-2 border-purple-200">
                <div class="flex items-baseline">
                    <span class="text-4xl font-bold text-purple-600">
                        {{ number_format($product->price, 0, ',', '.') }}đ
                    </span>
                    <span class="ml-2 text-gray-500">/ sản phẩm</span>
                </div>
            </div>

            <!-- Product Info Card -->
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Thông tin chi tiết
                </h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between py-3 border-b">
                        <span class="text-gray-600 font-medium">Tình trạng kho:</span>
                        @if($product->stock > 0)
                            <span class="inline-flex items-center px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-semibold">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Còn {{ $product->stock }} sản phẩm
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm font-semibold">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                </svg>
                                Hết hàng
                            </span>
                        @endif
                    </div>
                    <div class="flex items-center justify-between py-3">
                        <span class="text-gray-600 font-medium">Danh mục:</span>
                        <span class="text-gray-900 font-semibold">{{ $product->category->name }}</span>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="bg-gray-50 rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Mô tả sản phẩm
                </h3>
                <p class="text-gray-700 leading-relaxed">
                    {{ $product->description ?? 'Chưa có mô tả chi tiết cho sản phẩm này.' }}
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-3">
                @if($product->stock > 0)
                    <button disabled class="w-full inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-500 text-white font-semibold rounded-lg shadow-lg hover:from-purple-700 hover:to-pink-600 transition-all duration-200 opacity-50 cursor-not-allowed">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        Thêm vào giỏ hàng (Tính năng đang phát triển)
                    </button>
                @else
                    <button disabled class="w-full inline-flex items-center justify-center px-8 py-4 bg-gray-400 text-white font-semibold rounded-lg cursor-not-allowed">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Sản phẩm tạm hết hàng
                    </button>
                @endif
                <a href="{{ route('products.index') }}" class="w-full inline-flex items-center justify-center px-8 py-4 bg-white border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Quay lại danh sách
                </a>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
        <div class="mt-16">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-gray-900 flex items-center">
                    <svg class="w-8 h-8 mr-3 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    Sản phẩm liên quan
                </h2>
                <a href="{{ route('products.index', ['category' => $product->category_id]) }}" class="text-purple-600 hover:text-purple-800 font-medium flex items-center">
                    Xem tất cả
                    <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $relatedProduct)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="relative">
                            @if($relatedProduct->image)
                                <img src="{{ asset('storage/' . $relatedProduct->image) }}" 
                                     class="w-full h-48 object-cover" 
                                     alt="{{ $relatedProduct->name }}">
                            @else
                                <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            @endif
                            <span class="absolute top-2 left-2 bg-purple-600 text-white text-xs font-semibold px-2 py-1 rounded-full">
                                {{ $relatedProduct->category->name }}
                            </span>
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-semibold text-gray-800 mb-2 line-clamp-2 h-10">
                                {{ $relatedProduct->name }}
                            </h3>
                            <div class="flex items-center justify-between mt-3">
                                <span class="text-lg font-bold text-purple-600">
                                    {{ number_format($relatedProduct->price, 0, ',', '.') }}đ
                                </span>
                                <a href="{{ route('products.show', $relatedProduct->slug) }}" 
                                   class="inline-flex items-center px-3 py-1 bg-gradient-to-r from-purple-600 to-pink-500 text-white text-sm font-medium rounded-lg hover:from-purple-700 hover:to-pink-600 transition-all duration-200">
                                    Xem
                                    <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
