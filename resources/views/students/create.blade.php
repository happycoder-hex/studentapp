@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">
      
      <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label>First Name</label></br>
        <input type="text" fname="fname" id="fname" class="form-control"></br>
        <label>Last Name</label></br>
        <input type="text" name="lname" id="lname" class="form-control"></br>
        <label>Middle Name</label></br>
        <input type="text" name="mname" id="mname" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="email" id="email" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="mobile" id="mobile" class="form-control"></br>
        <label>Image</label></br>
          <input class="form-control" name="photo" type="file" id="photo"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@endsection