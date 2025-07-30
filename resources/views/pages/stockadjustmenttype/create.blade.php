
@extends('layouts.master')
@section('title','Create StockAdjustmentType')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('stockadjustmenttypes.index')}}">Manage</a>
<form action="{{route('stockadjustmenttypes.store')}}" method ="post" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" id="name" placeholder="Name">
	</div>
</div>
<div class="row mb-3">
	<label for="factor" class="col-sm-2 col-form-label">Factor</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="factor" id="factor" placeholder="Factor">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection
