@extends('layouts.app')

@section('title', 'Chỉnh sửa lớp học')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-6 text-blue-600">Chỉnh sửa lớp học</h1>

    <form action="{{ route('classes.update', $class) }}" method="POST" class="bg-gray-800 p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <!-- Hiển thị lỗi -->
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Nhập tên lớp -->
        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-400">Tên lớp:</label>
            <input type="text" id="name" name="name" class="w-full p-3 rounded bg-gray-700 border border-gray-600 text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('name', $class->name) }}" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600">
            Cập nhật lớp học
        </button>
    </form>
</div>
@endsection