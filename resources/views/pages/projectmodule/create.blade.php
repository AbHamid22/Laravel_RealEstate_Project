@extends('layouts.master')
@section('title','Create ProjectModule')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('projectmodules.index')}}">Manage</a>
<form action="{{route('projectmodules.store')}}" method ="post" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
	<label for="project_id" class="col-sm-2 col-form-label">Project</label>
	<div class="col-sm-10">
		<select class="form-control" name="project_id" id="project_id">
			@foreach($projects as $project)
				<option value="{{$project->id}}">{{$project->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="module_id" class="col-sm-2 col-form-label">Module</label>
	<div class="col-sm-10">
		<select class="form-control" name="module_id" id="module_id">
			@foreach($modules as $module)
				<option value="{{$module->id}}">{{$module->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="duration" class="col-sm-2 col-form-label">Duration</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="duration" id="duration" placeholder="Duration">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection
