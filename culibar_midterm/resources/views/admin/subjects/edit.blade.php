@extends('layouts.dashboardTemplate')

@section('title', 'Edit Subject')

@section('content')
    <div class="container">
        <h1 class="my-4">Edit Subject</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.subjects.update', $subject) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Subject Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $subject->name }}" required>
            </div>
            <div class="form-group">
                <label for="subject_code">Subject Code</label>
                <input type="text" class="form-control" id="subject_code" name="subject_code" value="{{ $subject->subject_code }}" required>
            </div>
            <div class="form-group">
                <label for="units">Units</label>
                <input type="number" class="form-control" id="units" name="units" value="{{ $subject->units }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Subject</button>
        </form>
    </div>
@endsection