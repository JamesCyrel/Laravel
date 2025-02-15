<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function store(Request $request) {
        Subject::create($request->validate([
            'name' => 'required',
            'units' => 'required|integer',
        ]));
        return redirect()->back();
    }
}
