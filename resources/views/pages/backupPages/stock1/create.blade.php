<?php

?>
@extends('layouts.master')
@section('title','Create Stock')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('stocks.index')}}">Manage</a>
<form action="{{route('stocks.store')}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="row mb-3">
		<label for="product_id" class="col-sm-2 col-form-label">Product</label>
		<div class="col-sm-10">
			<select class="form-control" name="product_id" id="product_id">
				@foreach($products as $product)
				<option value="{{$product->id}}">{{$product->name}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="row mb-3">
		<label for="qty" class="col-sm-2 col-form-label">Qty</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="qty" id="qty" placeholder="Qty">
		</div>
	</div>
	<div class="row mb-3">
		<label for="transaction_type_id" class="col-sm-2 col-form-label">Transaction_Type</label>
		<div class="col-sm-10">
			<select class="form-control" name="transaction_type_id" id="transaction_type_id">
				@foreach($transaction_types as $transaction_type)
				<option value="{{$transaction_type->id}}">{{$transaction_type->name}}</option>
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