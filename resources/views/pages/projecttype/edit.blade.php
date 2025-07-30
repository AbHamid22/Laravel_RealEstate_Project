@extends('layouts.master')
@section('title','Edit ProjectType')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('projecttypes.index')}}">Manage</a>
<form action="{{route('projecttypes.update',$projecttype)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" value="{{$projecttype->name}}" id="name" placeholder="Name">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
