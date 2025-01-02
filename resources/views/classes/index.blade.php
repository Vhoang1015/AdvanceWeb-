@extends('layouts.app')

@section('title', 'Danh sách lớp học')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-6 text-blue-600">Danh sách lớp học</h1>

    <!-- Hiển thị thông báo -->
    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Danh sách lớp học -->
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-700 text-white">
                <th class="border border-gray-300 px-4 py-2">STT</th>
                <th class="border border-gray-300 px-4 py-2">Tên lớp</th>
                <th class="border border-gray-300 px-4 py-2">Số học sinh</th>
                <th class="border border-gray-300 px-4 py-2">Số nam</th>
                <th class="border border-gray-300 px-4 py-2">Số nữ</th>
                <th class="border border-gray-300 px-4 py-2">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classes as $key => $class)
                @php
                    $maleCount = $class->students->where('gender', 'male')->count();
                    $femaleCount = $class->students->where('gender', 'female')->count();
                @endphp
                <tr class="bg-gray-800 text-gray-200">
                    <td class="border border-gray-300 px-4 py-2">{{ $key + 1 }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $class->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $class->students->count() }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $maleCount }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $femaleCount }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('classes.edit', $class) }}" 
                               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Sửa</a>
                            <form action="{{ route('classes.destroy', $class) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa lớp này?')">Xóa</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Nút thêm lớp học -->
    @if(auth()->user()->role === 'admin')
        <div class="mt-6">
            <a href="{{ route('classes.create') }}" 
               class="bg-green-500 text-white px-6 py-3 rounded hover:bg-green-600">
                Thêm lớp học mới
            </a>
        </div>
    @endif
</div>
@endsection
