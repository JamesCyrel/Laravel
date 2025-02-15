<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function enroll(Request $request) {
        Enrollment::create($request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
        ]));
        return redirect()->back();
    }
}
