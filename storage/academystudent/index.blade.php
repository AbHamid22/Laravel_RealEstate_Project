<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"> -->
@extends("layouts.master")

@section("page")
<div class="pc-container">
    <div class="pc-content">
        <?php
        //echo  File::info();
        ?>
        <a class="btn btn-primary" href="{{url('academystudents/create')}}">New Student</a>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Father`s Name</th>
                <th>Mother`s Name</th>
                <th>Address</th>
                <th>Contact_No</th>
                <th>Action</th>
            <tr>
                @forelse ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td><img src='{{url("/img/$student->photo")}}' width="100" /> </td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->fathers_name }}</td>
                <td>{{ $student->mothers_name }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->contact_no }}</td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-warning" href='{{url("academystudents/$student->id/edit")}}'>Edit</a>
                        <a class="btn btn-success" href='{{url("academystudents/$student->id")}}'>Show</a>
                        <a class="btn btn-danger" href='{{url("academystudents/$student->id/confirm")}}'>Delete</a>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td>No Student</td>
            </tr>
            @endforelse
        </table>
    </div>
</div>

@endsection



<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script> -->