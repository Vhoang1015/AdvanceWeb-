<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class ClassModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = ClassModel::with('students')->get(); // Load cả danh sách học sinh liên quan
        return view('classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    if (Auth::user()->role !== 'admin') {
        return redirect()->route('classes.index')->with('error', 'Bạn không có quyền thêm lớp.');
    }

    return view('classes.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('classes.index')->with('error', 'Bạn không có quyền thêm lớp.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ClassModel::create($validated);

        return redirect()->route('classes.index')->with('success', 'Lớp đã được thêm!');
    }


    /**
     * Display the specified resource.
     */
    public function show(ClassModel $class)
    {
        $class->load('students'); // Load danh sách học sinh trong lớp
        return view('classes.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassModel $class)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('classes.index')->with('error', 'Bạn không có quyền chỉnh sửa lớp.');
        }

        return view('classes.edit', compact('class'));
    }

    public function update(Request $request, ClassModel $class)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('classes.index')->with('error', 'Bạn không có quyền cập nhật lớp.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $class->update($validated);

        return redirect()->route('classes.index')->with('success', 'Lớp đã được cập nhật!');
    }


    public function destroy(ClassModel $class)
    {
    if (Auth::user()->role !== 'admin') {
        return redirect()->route('classes.index')->with('error', 'Bạn không có quyền xóa lớp.');
    }

    $class->delete();

    return redirect()->route('classes.index')->with('success', 'Lớp đã được xóa!');
}

}
