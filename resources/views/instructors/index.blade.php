@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        <h2>Teachers Page</h2>
    </div>
    <div class="card-body">
        <a href="{{ url('/instructors/create') }}" class="btn btn-success btn-sm" title="Add New">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
        <br/><br/>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Photo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($instructors as $instructor)
                    <tr>
                        <td>{{ $loop->iteration }}</td> 
                        <td>{{ $instructor->first_name }}</td>
                        <td>{{ $instructor->last_name }}</td>
                        <td>{{ $instructor->email }}</td>
                        <td>{{ $instructor->address }}</td>

                        <!-- Display Image -->
                        @foreach($instructors as $instructor)
                            <td>
                                @if($instructor->photo)
                                    <img src="{{ asset('images/' . $instructor->photo) }}" alt="Instructor Image" style="max-width: 100px;">
                                @else
                                    No Image
                                @endif
                            </td>
                        @endforeach
                        
                        <td>
                            <a href="{{ url('/instructors/' . $instructor->id) }}" title="View Instructor">
                                <button class="btn btn-info btn-sm">
                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                </button>
                            </a>
                            <a href="{{ url('/instructors/' . $instructor->id . '/edit') }}" title="Edit Instructor">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </button>
                            </a>

                            <form method="POST" action="{{ url('/instructors/' . $instructor->id) }}" accept-charset="UTF-8" style="display:inline" onsubmit="return confirmDelete()">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Instructor">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this instructor?");
    }
</script>

@endsection
