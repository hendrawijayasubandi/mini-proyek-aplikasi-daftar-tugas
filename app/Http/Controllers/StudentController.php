<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function store(Request $request)
    {
        $student = new Student;
        $student->name = $request->name;
        $student->class = $request->class;
        $student->status = $request->status;
        $student->save();

        return response()->json(['message' => 'Student added successfully']);
    }

    public function updateStatus(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->status = $request->status;
        $student->save();

        return response()->json(['message' => 'Student status updated successfully']);
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Siswa berhasil dihapus.');
    }

    public function create()
    {
        return view('students.create');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.view', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        return view('students.delete', compact('student'));
    }
}
