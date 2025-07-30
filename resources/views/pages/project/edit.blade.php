@extends('layouts.master')
@section('title','Edit Project')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('projects.index')}}">Manage</a>
<form action="{{route('projects.update',$project)}}" method ="post" enctype="multipart/form-data">
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
		<input type = "text" class="form-control" name="name" value="{{$project->name}}" id="name" placeholder="Name">
	</div>
</div>
<div class="row mb-3">
	<label for="type_id" class="col-sm-2 col-form-label">Type</label>
	<div class="col-sm-10">
		<select class="form-control" name="type_id" id="type_id">
			@foreach($types as $type)
				@if($type->id==$project->type_id)
					<option value="{{$type->id}}" selected>{{$type->name}}</option>
				@else
					<option value="{{$type->id}}">{{$type->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="status_id" class="col-sm-2 col-form-label">Status</label>
	<div class="col-sm-10">
		<select class="form-control" name="status_id" id="status_id">
			@foreach($status as $status)
				@if($status->id==$project->status_id)
					<option value="{{$status->id}}" selected>{{$status->name}}</option>
				@else
					<option value="{{$status->id}}">{{$status->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="start_date" class="col-sm-2 col-form-label">Start Date</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="start_date" value="{{$project->start_date}}" id="start_date" placeholder="Start Date">
	</div>
</div>
<div class="row mb-3">
	<label for="end_date" class="col-sm-2 col-form-label">End Date</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="end_date" value="{{$project->end_date}}" id="end_date" placeholder="End Date">
	</div>
</div>
<div class="row mb-3">
	<label for="contractor_id" class="col-sm-2 col-form-label">Contractor</label>
	<div class="col-sm-10">
		<select class="form-control" name="contractor_id" id="contractor_id">
			@foreach($contractors as $contractor)
				@if($contractor->id==$project->contractor_id)
					<option value="{{$contractor->id}}" selected>{{$contractor->name}}</option>
				@else
					<option value="{{$contractor->id}}">{{$contractor->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
