@extends('layouts.master')
@section('title','Edit Person')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('persons.index')}}">Manage</a>
<form action="{{route('persons.update',$person)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" value="{{$person->name}}" id="name" placeholder="Name">
	</div>
</div>
<div class="row mb-3">
	<label for="positon" class="col-sm-2 col-form-label">Positon</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="positon" value="{{$person->positon}}" id="positon" placeholder="Positon">
	</div>
</div>
<div class="row mb-3">
	<label for="photo" class="col-sm-2 col-form-label">Photo</label>
	<div class="col-sm-10">
		<input type = "file" class="form-control" name="photo"  id="photo" placeholder="Photo">
	</div>
</div>
<div class="row mb-3">
	<label for="address" class="col-sm-2 col-form-label">Address</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="address" value="{{$person->address}}" id="address" placeholder="Address">
	</div>
</div>
<div class="row mb-3">
	<label for="contact" class="col-sm-2 col-form-label">Contact</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="contact" value="{{$person->contact}}" id="contact" placeholder="Contact">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
