<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
