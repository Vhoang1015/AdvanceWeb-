@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-6 text-blue-600">Thêm sinh viên</h1>

    <form action="{{ route('students.store') }}" method="POST" class="space-y-6 bg-white p-8 rounded-lg shadow-md border border-gray-300">
        @csrf
       
        <div>
            <label class="block text-sm font-medium text-gray-700">Tên:</label>
            <input type="text" name="name" class="w-full border-gray-400 text-gray-900 rounded p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('name') }}" required>
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Ngày sinh:</label>
            <input type="date" name="dob" class="w-full border-gray-400 text-gray-900 rounded p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('dob') }}" required>
            @error('dob')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Lớp:</label>
            <select name="class_id" class="w-full border-gray-400 text-gray-900 rounded p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                <option value="">Chọn lớp</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                @endforeach
            </select>
            @error('class_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Email:</label>
            <input type="email" name="email" class="w-full border-gray-400 text-gray-900 rounded p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('email') }}" required>
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">GPA:</label>
            <input type="number" step="0.01" name="gpa" class="w-full border-gray-400 text-gray-900 rounded p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('gpa') }}">
            @error('gpa')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <!-- Giới tính -->
        <div>
            <label class="block text-sm font-medium text-gray-200">Giới tính:</label>
            <select name="gender" class="w-full border-gray-600 bg-gray-900 text-gray-200 rounded p-2" required>
                <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Nam</option>
                <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Nữ</option>
            </select>
            @error('gender')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>


        <div>
            <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-300">Thêm</button>
        </div>
    </form>
</div>
@endsection
