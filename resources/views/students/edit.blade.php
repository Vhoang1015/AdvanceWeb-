@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold text-gray-200 mb-6">Chỉnh sửa sinh viên</h1>

    <form action="{{ route('students.update', $student) }}" method="POST" class="bg-gray-800 p-6 rounded-lg shadow-lg space-y-6">
        @csrf
        @method('PUT')

        <!-- Tên -->
        <div>
            <label class="block text-sm font-medium text-gray-200">Tên:</label>
            <input type="text" name="name" class="w-full border-gray-600 bg-gray-900 text-gray-200 rounded p-2" 
                   value="{{ old('name', $student->name) }}" required>
            @error('name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Ngày sinh -->
        <div>
            <label class="block text-sm font-medium text-gray-200">Ngày sinh:</label>
            <input type="date" name="dob" class="w-full border-gray-600 bg-gray-900 text-gray-200 rounded p-2" 
                   value="{{ old('dob', $student->dob) }}" required>
            @error('dob')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Lớp -->
        <div>
            <label class="block text-sm font-medium text-gray-200">Lớp:</label>
            <select name="class_id" class="w-full border-gray-600 bg-gray-900 text-gray-200 rounded p-2" required>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ $class->id == old('class_id', $student->class_id) ? 'selected' : '' }}>
                        {{ $class->name }}
                    </option>
                @endforeach
            </select>
            @error('class_id')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label class="block text-sm font-medium text-gray-200">Email:</label>
            <input type="email" name="email" class="w-full border-gray-600 bg-gray-900 text-gray-200 rounded p-2" 
                   value="{{ old('email', $student->email) }}" required>
            @error('email')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- GPA -->
        <div>
            <label class="block text-sm font-medium text-gray-200">GPA:</label>
            <input type="number" step="0.01" name="gpa" class="w-full border-gray-600 bg-gray-900 text-gray-200 rounded p-2" 
                   value="{{ old('gpa', $student->gpa) }}">
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


        <!-- Nút Hành động -->
        <div class="flex justify-end space-x-4">
            <!-- Nút Quay lại -->
            <a href="{{ route('students.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded shadow">
                Quay lại
            </a>
            <!-- Nút Lưu thay đổi -->
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded shadow">
                Lưu thay đổi
            </button>
        </div>
    </form>
</div>
@endsection
