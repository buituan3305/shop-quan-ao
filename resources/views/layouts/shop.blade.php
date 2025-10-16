<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>
    
    <style>
        .gradient-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        }
        .product-card {
            transition: all 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .badge-stock {
            position: absolute;
            top: 12px;
            left: 12px;
            background: #10b981;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .category-badge {
            background: #8b5cf6;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            display: inline-block;
        }
        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            transition: all 0.3s ease;
        }
        .btn-gradient:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Top Navigation -->
    <nav class="gradient-header shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center space-x-3">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/>
                    </svg>
                    <a href="{{ route('products.index') }}" class="text-white text-xl font-bold">Shop Quần Áo</a>
                </div>

                <div class="flex items-center space-x-4">
                    <a href="{{ route('products.index') }}" class="text-white hover:text-gray-200 transition">Sản phẩm</a>
                    
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" 
                               class="px-4 py-2 bg-white bg-opacity-20 hover:bg-opacity-30 rounded-lg text-white transition">
                                Admin Panel
                            </a>
                        @endif
                        
                        <div class="flex items-center space-x-2 text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span>{{ auth()->user()->name }}</span>
                        </div>
                        
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 rounded-lg text-white font-medium transition">
                                Đăng xuất
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-white hover:text-gray-200 transition">Đăng nhập</a>
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-white bg-opacity-20 hover:bg-opacity-30 rounded-lg text-white transition">
                            Đăng ký
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-bold mb-4">Shop Quần Áo</h3>
                    <p class="text-gray-400 text-sm">Khám phá bộ sưu tập quần áo mới nhất 2025</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Liên hệ</h3>
                    <p class="text-gray-400 text-sm">Email: contact@shopquanao.com</p>
                    <p class="text-gray-400 text-sm">Hotline: 1900 xxxx</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Chính sách</h3>
                    <ul class="text-gray-400 text-sm space-y-2">
                        <li>Miễn phí vận chuyển</li>
                        <li>Đổi trả trong 7 ngày</li>
                        <li>Bảo hành chính hãng</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400 text-sm">
                <p>&copy; 2025 Shop Quần Áo. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
