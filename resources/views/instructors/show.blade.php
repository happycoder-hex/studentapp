@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">instructors Details</div>
    <div class="card-body">
        <h5 class="card-title">First Name: {{ $instructors->first_name }}</h5>
        <h5 class="card-title">Last Name: {{ $instructors->last_name }}</h5>
        <p class="card-text">Email: {{ $instructors->email }}</p>
        <p class="card-text">Address: {{ $instructors->address }}</p>

        @if ($instructors->photo)
            <p>
                <strong>Photo:</strong><br>
                <img src="{{ asset('images/' . $instructors->photo) }}" alt="Student Photo" width="150">
                <br>
                <a href="{{ asset('images/' . $instructors->photo) }}" download>Download Photo</a>
            </p>
        @endif
    </div>
</div>

@endsection