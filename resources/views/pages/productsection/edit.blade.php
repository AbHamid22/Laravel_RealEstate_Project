
@extends('layouts.master')
@section('title','Edit ProductSection')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('productsections.index')}}">Manage</a>
<form action="{{route('productsections.update',$productsection)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" value="{{$productsection->name}}" id="name" placeholder="Name">
	</div>
</div>
<div class="row mb-3">
	<label for="unit_id" class="col-sm-2 col-form-label">Unit</label>
	<div class="col-sm-10">
		<select class="form-control" name="unit_id" id="unit_id">
			@foreach($units as $unit)
				@if($unit->id==$productsection->unit_id)
					<option value="{{$unit->id}}" selected>{{$unit->name}}</option>
				@else
					<option value="{{$unit->id}}">{{$unit->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="photo" class="col-sm-2 col-form-label">Photo</label>
	<div class="col-sm-10">
		<input type = "file" class="form-control" name="photo"  id="photo" placeholder="Photo">
	</div>
</div>
<div class="row mb-3">
	<label for="icon" class="col-sm-2 col-form-label">Icon</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="icon" value="{{$productsection->icon}}" id="icon" placeholder="Icon">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
