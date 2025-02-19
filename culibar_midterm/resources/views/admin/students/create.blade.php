@extends('layouts.dashboardTemplate')

@section('title', 'Add Student')

@section('content')
    <div class="container">
        <h1 class="my-4">Add Student</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.students.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="student_id">Student ID</label>
                <input type="text" class="form-control" id="student_id" name="student_id" value="{{ old('student_id') }}" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <select class="form-control" id="name" name="name" required>
                    <option value="">Select Student</option>
                    @foreach($users as $user)
                        <option value="{{ $user->name }}" data-email="{{ $user->email }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required readonly>
            </div>
            <div class="form-group">
                <label for="course">Course</label>
                <select class="form-control" id="course" name="course" required>
                    <option value="">Select Course</option>
                    <option value="BSIT">Bachelor of Science in Information Technology</option>
                    <option value="BSCS">Bachelor of Science in Computer Science</option>
                    <option value="BSIS">Bachelor of Science in Information Systems</option>
                    <option value="BSEMC">Bachelor of Science in Entertainment and Multimedia Computing</option>
                </select>
            </div>
            <div class="form-group">
                <label for="year_level">Year Level</label>
                <select class="form-control" id="year_level" name="year_level" required>
                    <option value="">Select Year Level</option>
                    <option value="1st Year">1st Year</option>
                    <option value="2nd Year">2nd Year</option>
                    <option value="3rd Year">3rd Year</option>
                    <option value="4th Year">4th Year</option>
                    <option value="5th Year">5th Year</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Student</button>
        </form>
    </div>

    <script>
        document.getElementById('name').addEventListener('change', function() {
            var email = this.options[this.selectedIndex].getAttribute('data-email');
            document.getElementById('email').value = email;
        });
    </script>
@endsection