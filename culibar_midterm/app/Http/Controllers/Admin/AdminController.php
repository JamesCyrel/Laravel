<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Enrollment;
use App\Models\Grade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $studentCount = Student::count();
        $subjectCount = Subject::count();
        $enrollmentCount = Enrollment::count();
        $gradeCount = Grade::count();

        return view('admin.dashboard', compact('studentCount', 'subjectCount', 'enrollmentCount', 'gradeCount'));
    }
}