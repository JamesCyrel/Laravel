<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('grades', function (Blueprint $table) {
            if (!Schema::hasColumn('grades', 'student_id')) {
                $table->foreignId('student_id')->constrained()->after('id');
            }
            if (!Schema::hasColumn('grades', 'subject_id')) {
                $table->foreignId('subject_id')->constrained()->after('student_id');
            }
            if (!Schema::hasColumn('grades', 'subject_name')) {
                $table->string('subject_name')->after('subject_id');
            }
            if (!Schema::hasColumn('grades', 'grade')) {
                $table->decimal('grade', 3, 2)->after('subject_name');
            }
            if (!Schema::hasColumn('grades', 'remark')) {
                $table->string('remark')->after('grade');
            }
            if (!Schema::hasColumn('grades', 'curriculum_evaluation')) {
                $table->string('curriculum_evaluation')->after('remark');
            }
            $table->unique(['student_id', 'subject_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('grades', function (Blueprint $table) {
            if (Schema::hasColumn('grades', 'student_id')) {
                $table->dropForeign(['student_id']);
                $table->dropColumn('student_id');
            }
            if (Schema::hasColumn('grades', 'subject_id')) {
                $table->dropForeign(['subject_id']);
                $table->dropColumn('subject_id');
            }
            if (Schema::hasColumn('grades', 'subject_name')) {
                $table->dropColumn('subject_name');
            }
            if (Schema::hasColumn('grades', 'grade')) {
                $table->dropColumn('grade');
            }
            if (Schema::hasColumn('grades', 'remark')) {
                $table->dropColumn('remark');
            }
            if (Schema::hasColumn('grades', 'curriculum_evaluation')) {
                $table->dropColumn('curriculum_evaluation');
            }
            $table->dropUnique(['student_id', 'subject_id']);
        });
    }
};