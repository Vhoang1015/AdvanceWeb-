<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\ClassModel;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
    $classes = ClassModel::all(); // Lấy tất cả lớp học
    return view('students.create', compact('classes'));
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'dob' => 'required|date',
        'class_id' => 'required|exists:class_models,id', // Đảm bảo bạn đang lưu trữ ID của lớp
        'email' => 'required|email|max:255',
        'gpa' => 'nullable|numeric|min:0|max:4',
        'gender' => 'required|in:male,female',  // Thêm điều kiện xác thực cho giới tính

    ]);

    $student = new Student();
    $student->name = $validated['name'];
    $student->dob = $validated['dob'];
    $student->class_id = $validated['class_id']; // Lưu ID lớp thay vì tên lớp
    $student->email = $validated['email'];
    $student->gpa = $validated['gpa'];
    $student->gender = $validated['gender'];
    $student->save();

    return redirect()->route('students.index')->with('success', 'Sinh viên đã được thêm!');
}


    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
    $classes = ClassModel::all(); // Lấy danh sách lớp học
    return view('students.edit', compact('student', 'classes'));
    }

    public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);

    // Validate dữ liệu đầu vào
    $request->validate([
        'name' => 'required|string|max:255',
        'dob' => 'required|date',
        'class_id' => 'required|exists:class_models,id',
        'email' => 'required|email',
        'gpa' => 'nullable|numeric|min:0|max:4.0',
        'gender' => 'required|in:male,female',  // Thêm điều kiện xác thực cho giới tính
    ]);

    // Cập nhật dữ liệu
    $student->update([
        'name' => $request->name,
        'dob' => $request->dob,
        'class_id' => $request->class_id,
        'email' => $request->email,
        'gpa' => $request->gpa,
        'gender' => $request->gender,  // Cập nhật giới tính
    ]);

    // Redirect với thông báo thành công
    return redirect()->route('students.index')->with('success', 'Cập nhật sinh viên thành công!');
}



    public function destroy(Student $student)
    {
        $student->delete();
        
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
    

}

