@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        <h2>enrollments Page</h2>
    </div>
    <div class="card-body">
        <a href="{{ url('/enrollments/create') }}" class="btn btn-success btn-sm" title="add new">
            <i class="fa fa-plus" aria-hidden="true"></i> Add new
        </a>
        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Enroll no</th>
                        <th>Batch</th>
                        <th>Student</th>
                        <th>Join Date</th>
                        <th>Fee</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($enrollments as $item)
                    <tr>
                        <td>{{ $item->iteration }}</td>
                        <td>{{ $item->enroll_no }}</td>
                        <td>{{ optional($item->batch)->name }}</td>
                        <td>{{ $item->student_id }}</td>
                        <td>{{ $item->join_date }}</td>
                        <td>{{ $item->fee }}</td>

                        <td>
                            <a href="{{ url('/enrollments/' . $item->id) }}" title="View enrollments">
                                <button class="btn btn-info btn-sm">
                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                </button>
                            </a>
                            <a href="{{ url('/enrollments/' . $item->id . '/edit') }}" title="Edit enrollments">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </button>
                            </a>

                            <form method="POST" action="{{ url('/enrollments/' . $item->id) }}" accept-charset="UTF-8" style="display:inline" onsubmit="return confirmDelete()">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete enrollments">
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
        return confirm("Are you sure you want to delete this enroll?");
    }
</script>

@endsection
