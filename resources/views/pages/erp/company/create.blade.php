
@extends('layouts.master')
@section('title','Create Company')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('companys.index')}}">Manage</a>
<form action="{{route('companys.store')}}" method ="post" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" id="name" placeholder="Name">
	</div>
</div>
<div class="row mb-3">
	<label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="mobile" id="mobile" placeholder="Mobile">
	</div>
</div>
<div class="row mb-3">
	<label for="bin" class="col-sm-2 col-form-label">Bin</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="bin" id="bin" placeholder="Bin">
	</div>
</div>
<div class="row mb-3">
	<label for="email" class="col-sm-2 col-form-label">Email</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="email" id="email" placeholder="Email">
	</div>
</div>
<div class="row mb-3">
	<label for="website" class="col-sm-2 col-form-label">Website</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="website" id="website" placeholder="Website">
	</div>
</div>
<div class="row mb-3">
	<label for="city" class="col-sm-2 col-form-label">City</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="city" id="city" placeholder="City">
	</div>
</div>
<div class="row mb-3">
	<label for="area" class="col-sm-2 col-form-label">Area</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="area" id="area" placeholder="Area">
	</div>
</div>
<div class="row mb-3">
	<label for="street_address" class="col-sm-2 col-form-label">Street Address</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="street_address" id="street_address" placeholder="Street Address">
	</div>
</div>
<div class="row mb-3">
	<label for="post_code" class="col-sm-2 col-form-label">Post Code</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="post_code" id="post_code" placeholder="Post Code">
	</div>
</div>
<div class="row mb-3">
	<label for="logo" class="col-sm-2 col-form-label">Logo</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="logo" id="logo" placeholder="Logo">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection
