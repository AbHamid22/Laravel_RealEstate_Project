@extends("layouts.master")

@section("page")

@if (session('success'))

<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 2000
    });
</script>


@endif
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<a class="btn btn-primary" href="{{url('academystudents/create')}}">New Student</a>

<div class="card mt-3">
    <div class="card-header">
        <h4 class="mb-0">Student List</h4>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered table-hover text-center">
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Father`s Name</th>
                <th>Mother`s Name</th>
                <th>Address</th>
                <th>Contact_No</th>
                <th>Action</th>
            </tr>
            @forelse ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td><img src='{{url("/img/$student->photo")}}' width="80" class="img-thumbnail rounded" />
                </td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->fathers_name }}</td>
                <td>{{ $student->mothers_name }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->contact_no }}</td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-warning btn-sm me-1" href='{{ url("academystudents/$student->id/edit") }}' title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a class="btn btn-success btn-sm me-1" href='{{ url("academystudents/$student->id") }}' title="View">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href='{{ url("academystudents/$student->id/confirm") }}' title="Delete">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8">No Student</td>
            </tr>
            @endforelse
        </table>

    </div>
</div>







@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>