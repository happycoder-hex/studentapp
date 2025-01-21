@extends('layout')

@section('content')

<div class="card">
    <div class="card-header">Add Instructor</div>
    <div class="card-body">
        <!-- Form for creating a new instructor -->
        <form action="{{ url('instructors/') }}" method="post">
            @csrf

            <!-- First Name -->
            <label>First Name</label><br>
            <input type="text" name="first_name" class="form-control" required><br>

            <!-- Last Name -->
            <label>Last Name</label><br>
            <input type="text" name="last_name" class="form-control" required><br>

            <!-- Email -->
            <label>Email</label><br>
            <input type="email" name="email" class="form-control" required><br>

            <!-- Address -->
            <label>Address</label><br>
            <input type="text" name="address" class="form-control" required><br>

            <label>Photo</label></br>
            <input type="file" name="photo" class="form-control"></br>

            <!-- Submit Button -->
            <input type="submit" value="Save" class="btn btn-success"><br>
        </form>
    </div>
</div>

@endsection
