@extends('layout')
@section('content')
    <div class="container">
        <h3 align="center" class="mt-5">Students</h3><br>
        <div class="row">
        
            <div class="col-md-12">
            <div class="form-area">
                <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="fname">
                        </div>
                      
                        <div class="col-md-4">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lname">
                        </div>

                        <div class="col-md-4">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" name="mname">
                        </div>

                        <div class="col-md-4">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address">
                        </div>
              
                        <div class="col-md-4">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>

                        <div class="col-md-4">
                            <label>Mobile</label>
                            <input type="text" class="form-control" name="mobile">
                        </div>


                        <div class="col-md-12">
                            <label>Image</label>
                            <input class="form-control" name="photo" type="file" id="photo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Register">
                        </div>
                    </div>
                </form>
            </div>
                <table class="table mt-5">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <!-- <th scope="col">Middle Name</th> -->
                        <th scope="col">Address</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
               
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ( $students as $key => $student )
                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{ $student->fname }}</td>                            
                            <td scope="col">{{ $student->lname }}</td>
                            <!-- <td scope="col">{{ $student->mname }}</td>-->
                            <td scope="col">{{ $student->address }}</td>
                            <td scope="col">{{ $student->email }}</td>                            
                            <td scope="col">{{ $student->mobile }}</td>
                            <td scope="col">
                            @if ($student->photo)
                                    <img src="{{ asset('images/' . $student->photo) }}" alt="Student Image" width="100">
                                @else
                                    <img src="{{ asset('images/default.jpg') }}" alt="Default Image" width="100">
                                @endif
                            </td>
                            <td>
                                            <a href="{{ url('/students/' . $student->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/students/' . $student->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ url('/students' . '/' . $student->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                            </td>

                            
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
            background-color: #FFFF00;
        }
        .bi-trash-fill{
            color:red;
            font-size: 18px;
        }
        .bi-pencil{
            color:green;
            font-size: 18px;
            margin-left: 20px;
        }
    </style>
@endpush