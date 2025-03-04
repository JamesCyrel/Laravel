<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Subject;
use App\Http\Requests\Admin\StoreEnrollmentRequest;
use App\Http\Requests\Admin\EnrollmentUpdateRequest;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with(['student', 'subject'])->get();
        return view('admin.enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();
        $enrollments = Enrollment::all();

        return view('admin.enrollments.create', compact('students', 'subjects', 'enrollments'));
    }

    public function store(StoreEnrollmentRequest $request)
    {
        // Check if the student is already enrolled in the selected subject
        $existingEnrollment = Enrollment::where('student_id', $request->student_id)
                                        ->where('subject_id', $request->subject_id)
                                        ->first();

        if ($existingEnrollment) {
            return redirect()->back()->withErrors(['subject_id' => 'This student is already enrolled in the selected subject.']);
        }

        Enrollment::create($request->validated());

        return redirect()->route('admin.enrollments')->with('success', 'Enrollment created successfully.');
    }

    public function edit(Enrollment $enrollment)
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('admin.enrollments.edit', compact('enrollment', 'students', 'subjects'));
    }

    public function update(EnrollmentUpdateRequest $request, Enrollment $enrollment)
    {
        $enrollment->update($request->validated());

        return redirect()->route('admin.enrollments')->with('success', 'Enrollment updated successfully.');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('admin.enrollments')->with('success', 'Enrollment deleted successfully.');
    }
}
