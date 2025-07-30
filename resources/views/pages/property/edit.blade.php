
@extends('layouts.master')
@section('title','Edit Property')
@section('style')


@endsection
@section('page')
<a class='btn btn-success mb-3' href="{{ route('propertys.index') }}">← Back to List</a>
<!-- <a class='btn btn-success' href="{{route('propertys.index')}}">Manage</a> -->
<form action="{{route('propertys.update',$property)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="photo" class="col-sm-2 col-form-label">Photo</label>
	<div class="col-sm-10">
		<input type = "file" class="form-control" name="photo"  id="photo" placeholder="Photo">
	</div>
</div>
<div class="row mb-3">
	<label for="title" class="col-sm-2 col-form-label">Title</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="title" value="{{$property->title}}" id="title" placeholder="Title">
	</div>
</div>
<div class="row mb-3">
	<label for="description" class="col-sm-2 col-form-label">Description</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="description" value="{{$property->description}}" id="description" placeholder="Description">
	</div>
</div>


<div class="row mb-3">
	<label for="sqft" class="col-sm-2 col-form-label">Sqft</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="sqft" value="{{$property->sqft}}" id="sqft" placeholder="Sqft">
	</div>
</div>


<div class="row mb-3">
	<label for="bed_room" class="col-sm-2 col-form-label">Bed Room</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="bed_room" value="{{$property->bed_room}}" id="bed_room" placeholder="bed_room">
	</div>
</div>



<div class="row mb-3">
	<label for="bath_room" class="col-sm-2 col-form-label">Bath Room</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="bath_room" value="{{$property->bath_room}}" id="bath_room" placeholder="bath_room">
	</div>
</div>


<div class="row mb-3">
	<label for="category_id" class="col-sm-2 col-form-label">Category</label>
	<div class="col-sm-10">
		<select class="form-control" name="category_id" id="category_id">
			@foreach($categories as $category)
				@if($category->id==$property->category_id)
					<option value="{{$category->id}}" selected>{{$category->name}}</option>
				@else
					<option value="{{$category->id}}">{{$category->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="project_id" class="col-sm-2 col-form-label">Project</label>
	<div class="col-sm-10">
		<select class="form-control" name="project_id" id="project_id">
			@foreach($projects as $project)
				@if($project->id==$property->project_id)
					<option value="{{$project->id}}" selected>{{$project->name}}</option>
				@else
					<option value="{{$project->id}}">{{$project->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="price" class="col-sm-2 col-form-label">Price</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="price" value="{{$property->price}}" id="price" placeholder="Price">
	</div>
</div>
<div class="row mb-3">
	<label for="status" class="col-sm-2 col-form-label">Status</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="status" value="{{$property->status}}" id="status" placeholder="Status">
	</div>
</div>
<div class="row mb-3">
	<label for="location" class="col-sm-2 col-form-label">Location</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="location" value="{{$property->location}}" id="location" placeholder="Location">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
