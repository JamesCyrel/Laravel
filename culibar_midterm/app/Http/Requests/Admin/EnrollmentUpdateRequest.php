<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EnrollmentUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow all users to make this request
    }

    public function rules(): array
    {
        return [
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'course' => 'required|string|max:255', // Added course validation
            'semester' => 'required|string|max:255', // Added semester validation
        ];
    }
} 