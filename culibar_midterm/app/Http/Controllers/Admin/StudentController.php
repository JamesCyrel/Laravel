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

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        Student::create($request->validate([
            'name' => 'required',
            'student_id' => 'required|unique:students',
            'dob' => 'required|date',
        ]));
        return redirect()->back();
    }
    public function destroy(Student $student) {
        $student->delete();
        return redirect()->back();
    }
}

