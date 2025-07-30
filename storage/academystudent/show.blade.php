@extends("layouts.master")

@section("page")
<div class="pc-container">
    <div class="pc-content">
        <table class="table">
            <tr>
                <td>Id</td>
                <td>{{$student->id}}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{$student->name}}</td>
            </tr>
            <tr>
                <td>Photo</td>
                <td><img src='{{url("img/$student->photo")}}' /></td>
            </tr>
        </table>
    </div>
</div>
@endsection