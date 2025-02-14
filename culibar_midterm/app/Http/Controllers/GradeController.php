<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function computeGWA($studentId) {
        $grades = Grade::where('student_id', $studentId)->get();
        $gwa = $grades->avg('grade');
        return response()->json(['GWA' => $gwa]);
    }
}
