@extends('layouts.app')

@section('title', 'Xác minh email')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold text-center mb-4">Xác minh email</h2>
    <p class="text-gray-700 mb-4">
        Cảm ơn bạn đã đăng ký. Một email xác minh đã được gửi tới địa chỉ email của bạn. Vui lòng kiểm tra email và nhấp vào liên kết để xác minh.
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            Một liên kết xác minh mới đã được gửi đến email của bạn.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded">
            Gửi lại email xác minh
        </button>
    </form>

    <form method="POST" action="{{ route('logout') }}" class="mt-4">
        @csrf
        <button type="submit" class="w-full bg-red-500 text-white px-4 py-2 rounded">
            Đăng xuất
        </button>
    </form>
</div>
@endsection
