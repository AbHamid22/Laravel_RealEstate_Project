@extends("layouts.master")

@section("page")
<div class="pc-container">
  <div class="pc-content">

    <form action="{{url('academystudents')}}" method="post">
      @csrf
      Photo<br>
      <input type="file" name="photo" />
      <br>
      Name<br>
      <input type="text" name="name" />
      <br>
      Father`s Name<br>
      <input type="text" name="fname" />
      <br>
      Mother`s Name<br>
      <input type="text" name="mname" />
      <br>
      Address<br>
      <input type="text" name="address" />
      <br>
      Contact_No<br>
      <input type="text" name="cnt" />
      <br>
      <input type="submit" value="Save" />
    </form>
  </div>
</div>

@endsection