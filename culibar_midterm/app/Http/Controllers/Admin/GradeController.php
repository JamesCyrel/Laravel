<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGradeRequest;
use App\Http\Requests\Admin\UpdateGradeRequest;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Enrollment;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::with(['student', 'subject'])->get();
        return view('admin.grades.index', compact('grades'));
    }

    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('admin.grades.create', compact('students', 'subjects'));
    }

    public function store(StoreGradeRequest $request)
    {
        // Check if the student is enrolled in the selected subject
        $enrollment = Enrollment::where('student_id', $request->student_id)
                                ->where('subject_id', $request->subject_id)
                                ->first();

        if (!$enrollment) {
            return redirect()->back()->withErrors(['subject_id' => 'The student is not enrolled in the selected subject.']);
        }

        // Check if the student already has a grade for the selected subject
        $existingGrade = Grade::where('student_id', $request->student_id)
                              ->where('subject_id', $request->subject_id)
                              ->first();

        if ($existingGrade) {
            return redirect()->back()->withErrors(['subject_id' => 'This student already has a grade for the selected subject.']);
        }

        $data = $request->validated();
        $data['student_name'] = Student::find($data['student_id'])->name;
        $data['subject_name'] = Subject::find($data['subject_id'])->name;
        $data['remark'] = $this->getRemark($data['grade']);
        $data['curriculum_evaluation'] = $data['remark'];

        Grade::create($data);

        return redirect()->route('admin.grades')->with('success', 'Grade created successfully.');
    }

    public function edit(Grade $grade)
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('admin.grades.edit', compact('grade', 'students', 'subjects'));
    }

    public function update(UpdateGradeRequest $request, Grade $grade)
    {
        $data = $request->validated();
        $data['subject_name'] = Subject::find($data['subject_id'])->name;
        $data['remark'] = $this->getRemark($data['grade']);
        $data['curriculum_evaluation'] = $data['remark'];

        $grade->update($data);

        return redirect()->route('admin.grades')->with('success', 'Grade updated successfully.');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('admin.grades')->with('success', 'Grade deleted successfully.');
    }

    public function viewGrades()
    {
        $student = Student::where('email', auth()->user()->email)->first();
        
        if (!$student) {
            return view('student.view-grades', ['grades' => collect([])]);
        }

        $grades = Grade::where('student_id', $student->id)
                       ->with(['subject', 'student'])
                       ->get();

        return view('student.view-grades', compact('grades'));
    }

    private function getRemark($grade)
    {
        if ($grade >= 1.0 && $grade <= 3.0) {
            return 'Passed';
        } else {
            return 'Failed';
        }
    }
}
