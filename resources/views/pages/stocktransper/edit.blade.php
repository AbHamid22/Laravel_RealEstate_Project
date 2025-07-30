@extends('layouts.master')
@section('title','Edit StockTransper')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('stocktranspers.index')}}">Manage</a>
<form action="{{route('stocktranspers.update',$stocktransper)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="project_id" class="col-sm-2 col-form-label">Project</label>
	<div class="col-sm-10">
		<select class="form-control" name="project_id" id="project_id">
			@foreach($projects as $project)
				@if($project->id==$stocktransper->project_id)
					<option value="{{$project->id}}" selected>{{$project->name}}</option>
				@else
					<option value="{{$project->id}}">{{$project->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="warehouse_id" class="col-sm-2 col-form-label">Warehouse</label>
	<div class="col-sm-10">
		<select class="form-control" name="warehouse_id" id="warehouse_id">
			@foreach($warehouses as $warehouse)
				@if($warehouse->id==$stocktransper->warehouse_id)
					<option value="{{$warehouse->id}}" selected>{{$warehouse->name}}</option>
				@else
					<option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="transper_date" class="col-sm-2 col-form-label">Transper Date</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="transper_date" value="{{$stocktransper->transper_date}}" id="transper_date" placeholder="Transper Date">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
