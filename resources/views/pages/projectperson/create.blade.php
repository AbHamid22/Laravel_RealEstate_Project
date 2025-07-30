@extends('layouts.master')
@section('title','Create ProjectPerson')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('projectpersons.index')}}">Manage</a>
<form action="{{route('projectpersons.store')}}" method="post" enctype="multipart/form-data">
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
		<label for="person_id" class="col-sm-2 col-form-label">Person</label>
		<div class="col-sm-10">
			<select class="form-control" name="person_id" id="person_id">
				@foreach($persons as $person)
				<option value="{{$person->id}}">{{$person->name}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="row mb-3">
		<label for="assign_at" class="col-sm-2 col-form-label">Assign_at</label>
		<div class="col-sm-10">
			<input type="date" class="form-control" name="name" id="assign_at" placeholder="assign_at">
		</div>
	</div>

	<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection