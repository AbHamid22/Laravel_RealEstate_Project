
@extends('layouts.master')
@section('title','Create Contractor')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('contractors.index')}}">Manage</a>
<form action="{{route('contractors.store')}}" method ="post" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
	<label for="photo" class="col-sm-2 col-form-label">Photo</label>
	<div class="col-sm-10">
		<input type = "file" class="form-control" name="photo" id="photo" placeholder="Photo">
	</div>
</div>
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" id="name" placeholder="Name">
	</div>
</div>
<div class="row mb-3">
	<label for="contact_info" class="col-sm-2 col-form-label">Contact Info</label>
	<div class="col-sm-10">
		<textarea class="form-control" name="contact_info" id="contact_info" placeholder="Contact Info"></textarea>
	</div>
</div>

<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection
