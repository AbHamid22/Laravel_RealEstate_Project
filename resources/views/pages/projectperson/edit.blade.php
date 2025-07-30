@extends('layouts.master')
@section('title','Edit ProjectPerson')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('projectpersons.index')}}">Manage</a>
<form action="{{route('projectpersons.update',$projectperson)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="project_id" class="col-sm-2 col-form-label">Project</label>
	<div class="col-sm-10">
		<select class="form-control" name="project_id" id="project_id">
			@foreach($projects as $project)
				@if($project->id==$projectperson->project_id)
					<option value="{{$project->id}}" selected>{{$project->name}}</option>
				@else
					<option value="{{$project->id}}">{{$project->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="person_id" class="col-sm-2 col-form-label">Person</label>
	<div class="col-sm-10">
		<select class="form-control" name="person_id" id="person_id">
			@foreach($persons as $person)
				@if($person->id==$projectperson->person_id)
					<option value="{{$person->id}}" selected>{{$person->name}}</option>
				@else
					<option value="{{$person->id}}">{{$person->name}}</option>
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
