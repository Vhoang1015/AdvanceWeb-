@extends('layouts.app')

@section('title', 'Đăng nhập')

@section('content')
<div class="max-w-md mx-auto bg-gray-800 p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold text-center text-white mb-4">Đăng nhập</h2>
    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-gray-300 font-bold">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                class="w-full border border-gray-600 rounded px-4 py-2 text-white bg-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-300 font-bold">Mật khẩu</label>
            <input id="password" type="password" name="password" required
                class="w-full border border-gray-600 rounded px-4 py-2 text-white bg-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between items-center mb-4">
            <label class="flex items-center text-gray-300">
                <input type="checkbox" name="remember" class="mr-2 text-gray-300">
                Nhớ đăng nhập
            </label>
            <a href="#" class="text-blue-500 hover:text-blue-300">Quên mật khẩu?</a>
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            Đăng nhập
        </button>
    </form>
</div>
@endsection
