@extends('layouts.master')
@section('title','Edit ProjectCosting')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('projectcostings.index')}}">Manage</a>
<form action="{{route('projectcostings.update',$projectcosting)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="project_id" class="col-sm-2 col-form-label">Project</label>
	<div class="col-sm-10">
		<select class="form-control" name="project_id" id="project_id">
			@foreach($projects as $project)
				@if($project->id==$projectcosting->project_id)
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
				@if($module->id==$projectcosting->module_id)
					<option value="{{$module->id}}" selected>{{$module->name}}</option>
				@else
					<option value="{{$module->id}}">{{$module->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="budget" class="col-sm-2 col-form-label">Budget</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="budget" value="{{$projectcosting->budget}}" id="budget" placeholder="Budget">
	</div>
</div>
<div class="row mb-3">
	<label for="actual_cost" class="col-sm-2 col-form-label">Actual Cost</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="actual_cost" value="{{$projectcosting->actual_cost}}" id="actual_cost" placeholder="Actual Cost">
	</div>
</div>
<div class="row mb-3">
	<label for="days" class="col-sm-2 col-form-label">Days</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="days" value="{{$projectcosting->days}}" id="days" placeholder="Days">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
