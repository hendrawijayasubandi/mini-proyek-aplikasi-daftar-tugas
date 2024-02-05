<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        // Simpan data
        $student = new Student([
            'name' => $request->input('name'),
            'class' => $request->input('class'),
            'status' => $request->input('status'),
        ]);

        $student->save();

        // Buat response JSON dengan URL students
        $response = Response::json(['message' => 'Data siswa berhasil disimpan', 'redirect' => URL::to('/students')]);

        return $response;
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|in:9,10,11,12',
        ]);

        $student = Student::findOrFail($id);

        $student->update([
            'name' => $request->input('name'),
            'class' => $request->input('class'),
            'status' => $request->input('status') == 'on' ? 1 : 0,
        ]);

        return redirect()->route('students.index')->with('success', 'Siswa berhasil diperbarui.');
    }
}
