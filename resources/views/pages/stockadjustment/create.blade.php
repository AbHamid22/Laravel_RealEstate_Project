
@extends('layouts.master')
@section('title','Create StockAdjustment')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('stockadjustments.index')}}">Manage</a>
<form action="{{route('stockadjustments.store')}}" method ="post" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
	<label for="user_id" class="col-sm-2 col-form-label">User</label>
	<div class="col-sm-10">
		<select class="form-control" name="user_id" id="user_id">
			@foreach($users as $user)
				<option value="{{$user->id}}">{{$user->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="remark" class="col-sm-2 col-form-label">Remark</label>
	<div class="col-sm-10">
		<textarea class="form-control" name="remark" id="remark" placeholder="Remark"></textarea>
	</div>
</div>
<div class="row mb-3">
	<label for="adjustment_type_id" class="col-sm-2 col-form-label">Adjustment_Type</label>
	<div class="col-sm-10">
		<select class="form-control" name="adjustment_type_id" id="adjustment_type_id">
			@foreach($adjustment_types as $adjustment_type)
				<option value="{{$adjustment_type->id}}">{{$adjustment_type->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="warehouse_id" class="col-sm-2 col-form-label">Warehouse</label>
	<div class="col-sm-10">
		<select class="form-control" name="warehouse_id" id="warehouse_id">
			@foreach($warehouses as $warehouse)
				<option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
			@endforeach
		</select>
	</div>
</div>

<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection
