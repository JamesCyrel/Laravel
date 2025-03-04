<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Http\Requests\Admin\StudentStoreRequest;
use App\Http\Requests\Admin\StudentUpdateRequest;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');
        $students = Student::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('student_id', 'like', "%{$query}%")
                ->orWhere('name', 'like', "%{$query}%")
                ->orWhere('email', 'like', "%{$query}%");
        })->get();

        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        $users = User::where('role', 'student')->get();
        return view('admin.students.create', compact('users'));
    }

    public function store(StudentStoreRequest $request)
    {
        Student::create($request->validated());

        return redirect()->route('admin.students')->with('success', 'Student created successfully.');
    }

    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    public function update(StudentUpdateRequest $request, Student $student)
    {
        $student->update($request->validated());

        return redirect()->route('admin.students')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        // Delete related grades
        $student->grades()->delete();

        // Delete related enrollments
        $student->enrollments()->delete();

        // Delete the student
        $student->delete();

        return redirect()->route('admin.students')->with('success', 'Student deleted successfully.');
    }
}

