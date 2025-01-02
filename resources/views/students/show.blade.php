@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Chi tiết sinh viên</h1>

    <div class="bg-gray-800 text-gray-200 p-6 rounded-lg shadow-lg">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
            
                <p class="text-lg mb-3"><strong class="text-blue-400">Tên:</strong> {{ $student->name }}</p>
                <p class="text-lg mb-3"><strong class="text-blue-400">Ngày sinh:</strong> {{ $student->dob }}</p>
                <p class="text-lg mb-3"><strong class="text-blue-400">Lớp:</strong> {{ $student->class->name }}</p>
            </div>
            <div>
                <p class="text-lg mb-3"><strong class="text-blue-400">Email:</strong> {{ $student->email }}</p>
                <p class="text-lg mb-3"><strong class="text-blue-400">GPA:</strong> {{ $student->gpa }}</p>
            </div>
            <div>
                <strong>Giới tính:</strong> {{ $student->gender == 'male' ? 'Nam' : ($student->gender == 'female' ? 'Nữ' : 'Khác') }}
            </div>
            
        </div>
    </div>

    <div class="mt-8">
        <a href="{{ route('students.index') }}" 
           class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
           Quay lại danh sách
        </a>
    </div>
</div>
@endsection
