@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-200">Danh sách sinh viên</h1>
        <a href="{{ route('students.create') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out">
            Thêm sinh viên
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-3 rounded-lg mb-4 shadow-md">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto rounded-lg shadow-lg">
        <table class="table-auto w-full border-collapse border border-gray-600 text-gray-200">
            <thead>
                <tr class="bg-gray-700 text-gray-200">
                    {{-- <th class="border border-gray-600 px-4 py-2">ID</th> --}}
                    <th class="border border-gray-600 px-4 py-2">Tên</th>
                    <th class="border border-gray-600 px-4 py-2">Lớp</th>
                    <th class="border border-gray-600 px-4 py-2">GPA</th>
                    <th class="border border-gray-600 px-4 py-2">Email</th>
                    <th class="border border-gray-600 px-4 py-2">Giới tính</th>
                    <th class="border border-gray-600 px-4 py-2">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                <tr class="hover:bg-gray-800 transition duration-300 ease-in-out">
                    {{-- <td class="border border-gray-600 px-4 py-2">{{ $student->id }}</td> --}}
                    <td class="border border-gray-600 px-4 py-2">{{ $student->name }}</td>
                    <td class="border border-gray-600 px-4 py-2">{{ $student->class->name }}</td>
                    <td class="border border-gray-600 px-4 py-2">{{ $student->gpa }}</td>
                    <td class="border border-gray-600 px-4 py-2">{{ $student->email }}</td>
                    <td class="border border-gray-600 px-4 py-2">{{ $student->gender }}</td>

                    <td class="border border-gray-600 px-4 py-2 flex space-x-4">
                        <a href="{{ route('students.show', $student) }}" class="text-blue-400 hover:text-blue-500 transition duration-300 ease-in-out">
                            Xem
                        </a>
                        <a href="{{ route('students.edit', $student) }}" class="text-green-400 hover:text-green-500 transition duration-300 ease-in-out">
                            Sửa
                        </a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" 
                                onclick="if(confirm('Bạn có chắc chắn muốn xóa sinh viên này?')) this.form.submit();" 
                                class="text-red-400 hover:text-red-500 transition duration-300 ease-in-out">
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-gray-400">Không có sinh viên nào.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
