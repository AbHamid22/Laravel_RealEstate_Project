@extends('layouts.master')
@section('title','Edit Vendor')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('vendors.index')}}">Manage</a>
<form action="{{route('vendors.update',$vendor)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="photo" class="col-sm-2 col-form-label">Photo</label>
	<div class="col-sm-10">
		<input type = "file" class="form-control" name="photo"  id="photo" placeholder="Photo">
	</div>
</div>
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" value="{{$vendor->name}}" id="name" placeholder="Name">
	</div>
</div>
<div class="row mb-3">
	<label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="mobile" value="{{$vendor->mobile}}" id="mobile" placeholder="Mobile">
	</div>
</div>
<div class="row mb-3">
	<label for="email" class="col-sm-2 col-form-label">Email</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="email" value="{{$vendor->email}}" id="email" placeholder="Email">
	</div>
</div>
<div class="row mb-3">
	<label for="address" class="col-sm-2 col-form-label">Address</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="address" value="{{$vendor->address}}" id="address" placeholder="Address">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
