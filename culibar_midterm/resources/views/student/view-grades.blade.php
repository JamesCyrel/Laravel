@extends('layouts.dashboardTemplate')

@section('title', 'View Grades')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Student Information</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @php
                            $student = App\Models\Student::where('email', auth()->user()->email)->first();
                        @endphp

                        <div class="col-md-3">
                            <div class="info-item">
                                <i class="fas fa-user fa-2x text-primary mb-2"></i>
                                <h6 class="text-muted">Student Name</h6>
                                <h5>{{ auth()->user()->name }}</h5>
                            </div>
                        </div>

                        @if($student)
                            @php
                                $enrollment = App\Models\Enrollment::where('student_id', $student->id)->latest()->first();
                            @endphp
                            <div class="col-md-3">
                                <div class="info-item">
                                    <i class="fas fa-graduation-cap fa-2x text-success mb-2"></i>
                                    <h6 class="text-muted">Course</h6>
                                    <h5>{{ $student->course }}</h5>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-item">
                                    <i class="fas fa-layer-group fa-2x text-info mb-2"></i>
                                    <h6 class="text-muted">Year Level</h6>
                                    <h5>{{ $student->year_level }}</h5>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-item">
                                    <i class="fas fa-calendar fa-2x text-warning mb-2"></i>
                                    <h6 class="text-muted">Semester</h6>
                                    <h5>{{ $enrollment ? $enrollment->semester : '-' }}</h5>
                                </div>
                            </div>
                        @else
                            <div class="col-md-9">
                                <div class="alert alert-warning">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    Student information not found.
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Grade Report</h4>
            <button onclick="window.print()" class="btn btn-light btn-sm">
                <i class="fas fa-print"></i> Print Grades
            </button>
        </div>
        <div class="card-body">
            @if(!$student || $grades->isEmpty())
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i>
                    No grades available.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Subject</th>
                                <th class="text-center">Grade</th>
                                <th class="text-center">Remark</th>
                                <th class="text-center">Curriculum Evaluation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($grades as $grade)
                                <tr>
                                    <td>{{ $grade->subject->name }}</td>
                                    <td class="text-center">
                                        <span class="badge badge-{{ $grade->grade <= 3.0 ? 'success' : 'danger' }} badge-lg">
                                            {{ $grade->grade }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-{{ $grade->remark === 'Passed' ? 'success' : 'danger' }}">
                                            {{ $grade->remark }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-{{ $grade->remark === 'Passed' ? 'success' : 'danger' }}">{{ $grade->curriculum_evaluation }}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .info-item {
        text-align: center;
        padding: 15px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .info-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .badge-lg {
        font-size: 1rem;
        padding: 0.5rem 1rem;
    }

    @media print {
        .sidebar, .navbar, .btn-print {
            display: none !important;
        }
        .card {
            box-shadow: none !important;
        }
    }
</style>
@endsection