@extends('layout')

@section('content')

<div class="card">
    <div class="card-header">Edit Instructor</div>
    <div class="card-body">
        <!-- Form to update the instructor -->
        <form action="{{ url('instructors/' . $instructors->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <!-- First Name -->
            <label>First Name</label><br>
            <input type="text" name="first_name" value="{{ $instructors->first_name }}" class="form-control" required><br>

            <!-- Last Name -->
            <label>Last Name</label><br>
            <input type="text" name="last_name" value="{{ $instructors->last_name }}" class="form-control" required><br>

            <!-- Email -->
            <label>Email</label><br>
            <input type="email" name="email" value="{{ $instructors->email }}" class="form-control" required><br>

            <!-- Address -->
            <label>Address</label><br>
            <input type="text" name="address" value="{{ $instructors->address }}" class="form-control" required><br>

            <label>Photo</label></br>
            <input type="file" name="photo" class="form-control"></br>

            <!-- Update Button -->
            <input type="submit" value="Update" class="btn btn-success"><br>
        </form>
    </div>
</div>

@endsection
