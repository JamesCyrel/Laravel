<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Grade;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $student = Auth::user();
        
        // Get enrolled courses through enrollments
        $enrolledCourses = Enrollment::where('student_id', $student->id)
                            ->with('subject')
                            ->get()
                            ->map(function($enrollment) {
                                return (object)[
                                    'id' => $enrollment->subject->id,
                                    'name' => $enrollment->subject->name
                                ];
                            });

        // Get upcoming assignments (placeholder for now)
        $upcomingAssignments = collect([]);

        return view('student.dashboard', compact('enrolledCourses', 'upcomingAssignments'));
    }
} 