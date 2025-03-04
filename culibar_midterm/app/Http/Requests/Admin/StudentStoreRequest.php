<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class StudentStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'student_id' => 'required|unique:students',
            'name' => [
                'required',
                function ($attribute, $value, $fail) {
                    $user = User::where('name', $value)
                                ->where('email', $this->email)
                                ->where('role', 'student')
                                ->first();
                    if (!$user) {
                        $fail('The name and email must match a registered student user.');
                    }
                },
            ],
            'email' => 'required|email|unique:students',
            'course' => 'required|string',
            'year_level' => 'required|string',
        ];
    }
}
