

@extends("layouts.master")

@section("page")


    <form action='{{url("academystudents/$student->id")}}' method="post">
      @csrf
      @method("PUT")
      Photo<br>
      <input type="file" name="photo" />
      <br>
      Name<br>
      <input type="text" name="name"  value="{{$student->name}}" />
      <br>
      Father`s Name<br>
      <input type="text" name="fname"   value="{{$student->fathers_name}}"/>
      <br>
      Mother`s Name<br>
      <input type="text" name="mname"  value="{{$student->mothers_name}}"/>
      <br>
      Address<br>
      <input type="text" name="address" value="{{$student->address}}"/>
      <br>
      Contact_No<br>
      <input type="text" name="cnt"  value="{{$student->contact_no}}"/>
      <br>
      <input type="submit" value="Update" />
    </form>


@endsection