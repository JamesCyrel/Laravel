@extends('layouts.dashboardTemplate')

@section('title', 'Students')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-1">Student Management</h4>
                        <p class="text-muted mb-0">Manage all student records</p>
                    </div>
                    <a href="{{ route('admin.students.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle mr-2"></i>Add Student
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.students') }}" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by Student ID, Name, or Email" value="{{ request()->input('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Year Level</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($students->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center">No students found.</td>
                            </tr>
                        @else
                            @foreach($students as $index => $student)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <span class="font-weight-bold">{{ $student->student_id }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-primary text-white p-2 mr-2" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                                                {{ strtoupper(substr($student->name, 0, 1)) }}
                                            </div>
                                            {{ $student->name }}
                                        </div>
                                    </td>
                                    <td>{{ $student->email }}</td>
                                    <td>
                                        <span class="badge badge-info">{{ $student->course }}</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">{{ $student->year_level }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.students.edit', $student) }}" 
                                           class="btn btn-warning btn-sm mr-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @if($student->grades->isEmpty())
                                            <form action="{{ route('admin.students.destroy', $student) }}" 
                                                  method="POST" 
                                                  style="display:inline;"
                                                  onsubmit="return confirm('Are you sure you want to delete this student?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @else
                                            <button class="btn btn-danger btn-sm" 
                                                    disabled 
                                                    title="Cannot delete student with existing grades">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .table td {
        vertical-align: middle;
    }

    .badge {
        padding: 8px 12px;
        font-size: 0.85rem;
    }

    .btn-sm {
        padding: 0.4rem 0.6rem;
    }

    .alert {
        border-left: 4px solid #1cc88a;
    }

    .card {
        transition: transform 0.2s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }
</style>
@endsection