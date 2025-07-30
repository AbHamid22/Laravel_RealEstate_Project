@extends('layouts.master')
@section('title','Edit ProjectModule')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('projectmodules.index')}}">Manage</a>
<form action="{{route('projectmodules.update',$projectmodule)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="project_id" class="col-sm-2 col-form-label">Project</label>
	<div class="col-sm-10">
		<select class="form-control" name="project_id" id="project_id">
			@foreach($projects as $project)
				@if($project->id==$projectmodule->project_id)
					<option value="{{$project->id}}" selected>{{$project->name}}</option>
				@else
					<option value="{{$project->id}}">{{$project->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="module_id" class="col-sm-2 col-form-label">Module</label>
	<div class="col-sm-10">
		<select class="form-control" name="module_id" id="module_id">
			@foreach($modules as $module)
				@if($module->id==$projectmodule->module_id)
					<option value="{{$module->id}}" selected>{{$module->name}}</option>
				@else
					<option value="{{$module->id}}">{{$module->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="duration" class="col-sm-2 col-form-label">Duration</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="duration" value="{{$projectmodule->duration}}" id="duration" placeholder="Duration">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
