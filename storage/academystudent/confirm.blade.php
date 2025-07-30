
@extends("layouts.master")

@section("page")
<div class="pc-container">
  <div class="pc-content">
    Are You Sure ?

    <br>
<h2>Name :{{$student->name}}</h2>
<h2>Photo:</h2> <img src='{{url("img/$student->photo")}}' />
    <form action="{{url('academystudents/'.$student->id)}}" method="post">
      @csrf
      @method("DELETE")
      <input  class="btn btn-danger"  type="submit" value="Confirm" />
    </form>
  </div>

</div>

@endsection