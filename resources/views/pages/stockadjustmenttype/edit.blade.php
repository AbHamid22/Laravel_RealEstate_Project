
@extends('layouts.master')
@section('title','Edit StockAdjustmentType')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('stockadjustmenttypes.index')}}">Manage</a>
<form action="{{route('stockadjustmenttypes.update',$stockadjustmenttype)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" value="{{$stockadjustmenttype->name}}" id="name" placeholder="Name">
	</div>
</div>
<div class="row mb-3">
	<label for="factor" class="col-sm-2 col-form-label">Factor</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="factor" value="{{$stockadjustmenttype->factor}}" id="factor" placeholder="Factor">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
