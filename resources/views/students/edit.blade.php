@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ url('students/' .$students->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$students->id}}" id="id" />
        <!-- <label>First Name</label></br>
        <input type="text" name="fname" id="fname" value="{{$students->fname}}" class="form-control"></br>
        <label>Middle Name</label></br>
        <input type="text" name="mname" id="mname" value="{{$students->mname}}" class="form-control"></br>
        <label>Last Name</label></br>
        <input type="text" name="lname" id="lname" value="{{$students->lname}}" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" value="{{$students->address}}" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" value="{{$students->mobile}}" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" value="{{$students->email}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success">
        <input type="button" value="Cancel" onclick="javascript:history.back()" class="btn btn-success"></br> -->

<div class="row">
                        <div class="col-md-4">
                            <label>First Name</label>
                            <input type="text" name="fname" id="fname" value="{{$students->fname}}" class="form-control">
                        </div>
                      
                        <div class="col-md-4">
                            <label>Last Name</label>
                            <input type="text" name="lname" id="lname" value="{{$students->lname}}" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label>Middle Name</label>
                            <input type="text" name="mname" id="mname" value="{{$students->mname}}" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label>Address</label>
                            <input type="text" name="address" id="address" value="{{$students->address}}" class="form-control">
                        </div>
              
                        <div class="col-md-4">
                            <label>Email</label>
                            <input type="text" name="email" id="email" value="{{$students->email}}" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label>Mobile</label>
                            <input type="text" name="mobile" id="mobile" value="{{$students->mobile}}" class="form-control">
                        </div>


                        <div class="col-md-12">
                            <label>Image</label><br>
                            <!-- <img src="{{ asset('images/' . $students->photo) }}" alt="item Image" width="100"><br><br> -->
                            <!-- <input class="form-control" name="photo" id="photo" value="{{$students->photo}}" type="file"> -->
                            <input class="form-control" name="photo" type="file" id="photo">
                        </div>
                      </div>  
                      <br>      
                      <input type="submit" value="Update" class="btn btn-success">
                      <input type="button" value="Cancel" onclick="javascript:history.back()" class="btn btn-success">
    </form>
   
  </div>
</div>
 
@stop