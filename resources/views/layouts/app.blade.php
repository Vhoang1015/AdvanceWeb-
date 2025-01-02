<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Quản lý sinh viên')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-gray-200">
    <!-- Header: Chỉ hiển thị khi không phải trang login hoặc register -->
    @if(!request()->routeIs('login') && !request()->routeIs('register'))
        <header class="bg-blue-600 text-white p-4 shadow-md">
            <div class="container mx-auto flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <nav class="space-x-4">
                        <a href="{{ route('students.index') }}" 
                           class="px-4 py-2 rounded {{ request()->routeIs('students.index') ? 'bg-blue-800' : 'hover:bg-blue-500' }}">
                            Quản lý sinh viên
                        </a>
                        <a href="{{ route('students.index') }}" 
                           class="px-4 py-2 rounded {{ request()->routeIs('students.index') ? 'bg-blue-800' : 'hover:bg-blue-500' }}">
                            Quản lý môn học
                        </a>
                        <a href="{{ route('classes.index') }}" 
                           class="px-4 py-2 rounded {{ request()->routeIs('classes.index') ? 'bg-blue-800' : 'hover:bg-blue-500' }}">
                            Quản lý lớp học
                        </a>
                    </nav>
                </div>
    
                <!-- Logout Button -->
                <div class="flex items-center space-x-4">
                    @auth
                        <!-- Hiển thị thông tin user -->
                        <div class="text-sm">
                            <p>Chào, <span class="font-bold">{{ Auth::user()->name }}</span></p>
                            <p class="text-gray-300 text-xs">{{ Auth::user()->email }}</p>
                        </div>
    
                        <!-- Logout Button -->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded shadow">
                                Đăng xuất
                            </button>
                        </form>
                    @else
                        <!-- Nếu chưa đăng nhập -->
                        <a href="{{ route('login') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded shadow">
                            Đăng nhập
                        </a>
                    @endauth
                </div>
            </div>
        </header>
    @endif
    
    <!-- Main Content -->
    <main class="container mx-auto p-6">
        @auth
        @else
            <div class="mb-6">
                <a href="{{ url('/') }}" class="text-blue-400 hover:underline">Trở về trang chủ</a>
            </div>
        @endauth

        <!-- Dynamic Content -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-md">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-400 text-center p-4">
        <p>&copy; 2024 Quản lý sinh viên. All rights reserved.</p>
    </footer>
</body>
</html>
