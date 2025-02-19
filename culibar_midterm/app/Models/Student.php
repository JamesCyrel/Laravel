<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'name',
        'year_level',
        'email',
        'course',
        
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($student) {
            $student->enrollments()->delete();
            $student->grades()->delete();
        });
    }
}