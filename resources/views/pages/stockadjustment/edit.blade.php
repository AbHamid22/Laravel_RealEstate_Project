
@extends('layouts.master')
@section('title','Edit StockAdjustment')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('stockadjustments.index')}}">Manage</a>
<form action="{{route('stockadjustments.update',$stockadjustment)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="user_id" class="col-sm-2 col-form-label">User</label>
	<div class="col-sm-10">
		<select class="form-control" name="user_id" id="user_id">
			@foreach($users as $user)
				@if($user->id==$stockadjustment->user_id)
					<option value="{{$user->id}}" selected>{{$user->name}}</option>
				@else
					<option value="{{$user->id}}">{{$user->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="remark" class="col-sm-2 col-form-label">Remark</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="remark" value="{{$stockadjustment->remark}}" id="remark" placeholder="Remark">
	</div>
</div>
<div class="row mb-3">
	<label for="adjustment_type_id" class="col-sm-2 col-form-label">Adjustment_Type</label>
	<div class="col-sm-10">
		<select class="form-control" name="adjustment_type_id" id="adjustment_type_id">
			@foreach($adjustment_types as $adjustment_type)
				@if($adjustment_type->id==$stockadjustment->adjustment_type_id)
					<option value="{{$adjustment_type->id}}" selected>{{$adjustment_type->name}}</option>
				@else
					<option value="{{$adjustment_type->id}}">{{$adjustment_type->name}}</option>
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
				@if($warehouse->id==$stockadjustment->warehouse_id)
					<option value="{{$warehouse->id}}" selected>{{$warehouse->name}}</option>
				@else
					<option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
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
