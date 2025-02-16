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