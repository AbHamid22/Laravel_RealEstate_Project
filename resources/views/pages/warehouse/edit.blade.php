
@extends('layouts.master')
@section('title','Edit Warehouse')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('warehouses.index')}}">Manage</a>
<form action="{{route('warehouses.update',$warehouse)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" value="{{$warehouse->name}}" id="name" placeholder="Name">
	</div>
</div>
<div class="row mb-3">
	<label for="city" class="col-sm-2 col-form-label">City</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="city" value="{{$warehouse->city}}" id="city" placeholder="City">
	</div>
</div>
<div class="row mb-3">
	<label for="contact" class="col-sm-2 col-form-label">Contact</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="contact" value="{{$warehouse->contact}}" id="contact" placeholder="Contact">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
