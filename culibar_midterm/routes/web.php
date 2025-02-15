<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/addStudent', function () {
    return view('students.addStudent');
})->name('addStudent');

//profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/student/dashboard', function () {
            return view('student.dashboard');
        })->name('student.dashboard');
    
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/student/view-grades', function () {
            return view('student.view-grades');
        })->name('student.view-grades');

        Route::get('/admin/students', function () {
            return view('admin.students');
        })->name('admin.students');

        Route::get('/admin/subjects', function () {
            return view('admin.subjects');
        })->name('admin.subjects');

        Route::get('/admin/enrollments', function () {
            return view('admin.enrollments');
        })->name('admin.enrollments');

        Route::get('/admin/grades', function () {
            return view('admin.grades');
        })->name('admin.grades');
    });
});

require __DIR__.'/auth.php';
