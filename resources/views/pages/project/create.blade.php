
@extends('layouts.master')
@section('title','Create Project')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('projects.index')}}">Manage</a>
<form action="{{route('projects.store')}}" method ="post" enctype="multipart/form-data">
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
	<label for="type_id" class="col-sm-2 col-form-label">Type</label>
	<div class="col-sm-10">
		<select class="form-control" name="type_id" id="type_id">
			@foreach($types as $type)
				<option value="{{$type->id}}">{{$type->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="status_id" class="col-sm-2 col-form-label">Status</label>
	<div class="col-sm-10">
		<select class="form-control" name="status_id" id="status_id">
			@foreach($status as $status)
				<option value="{{$status->id}}">{{$status->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="start_date" class="col-sm-2 col-form-label">Start Date</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="start_date" id="start_date" placeholder="Start Date">
	</div>
</div>
<div class="row mb-3">
	<label for="end_date" class="col-sm-2 col-form-label">End Date</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="end_date" id="end_date" placeholder="End Date">
	</div>
</div>
<div class="row mb-3">
	<label for="contractor_id" class="col-sm-2 col-form-label">Contractor</label>
	<div class="col-sm-10">
		<select class="form-control" name="contractor_id" id="contractor_id">
			@foreach($contractors as $contractor)
				<option value="{{$contractor->id}}">{{$contractor->name}}</option>
			@endforeach
		</select>
	</div>
</div>

<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection
