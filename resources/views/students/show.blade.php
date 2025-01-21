@extends('layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        
        <p class="card-title">Name : {{ $students->fname }} {{ $students->mname }} {{ $students->lname }}</p>
        <p class="card-text">Address : {{ $students->email }}</p>
        <p class="card-text">Address : {{ $students->address }}</p>
        <p class="card-text">Mobile : {{ $students->mobile }}</p>
        <p class="card-text">Image : </p>
        <img src="{{ asset('images/' . $students->photo) }}" alt="item Image" width="100"><br><br><br><br>
        <!-- <p class="card-text"><a href="{{ route('students.store') }}"><--</a> </p> -->
        <a href="javascript:history.back()">Go Back</a>
  </div>
       
    </hr>
  
  </div>
</div>
@endsection