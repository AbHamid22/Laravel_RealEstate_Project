@extends('layouts.master')
@section('title','Edit Stock')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('stocks.index')}}">Manage</a>
<form action="{{route('stocks.update',$stock)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="product_id" class="col-sm-2 col-form-label">Product</label>
	<div class="col-sm-10">
		<select class="form-control" name="product_id" id="product_id">
			@foreach($products as $product)
				@if($product->id==$stock->product_id)
					<option value="{{$product->id}}" selected>{{$product->name}}</option>
				@else
					<option value="{{$product->id}}">{{$product->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="uom_id" class="col-sm-2 col-form-label">Uom</label>
	<div class="col-sm-10">
		<select class="form-control" name="uom_id" id="uom_id">
			@foreach($uom as $uom)
				@if($uom->id==$stock->uom_id)
					<option value="{{$uom->id}}" selected>{{$uom->name}}</option>
				@else
					<option value="{{$uom->id}}">{{$uom->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="qty" class="col-sm-2 col-form-label">Qty</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="qty" value="{{$stock->qty}}" id="qty" placeholder="Qty">
	</div>
</div>
<div class="row mb-3">
	<label for="transaction_type_id" class="col-sm-2 col-form-label">Transaction_Type</label>
	<div class="col-sm-10">
		<select class="form-control" name="transaction_type_id" id="transaction_type_id">
			@foreach($transaction_types as $transaction_type)
				@if($transaction_type->id==$stock->transaction_type_id)
					<option value="{{$transaction_type->id}}" selected>{{$transaction_type->name}}</option>
				@else
					<option value="{{$transaction_type->id}}">{{$transaction_type->name}}</option>
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
				@if($warehouse->id==$stock->warehouse_id)
					<option value="{{$warehouse->id}}" selected>{{$warehouse->name}}</option>
				@else
					<option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="remark" class="col-sm-2 col-form-label">Remark</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="remark" value="{{$stock->remark}}" id="remark" placeholder="Remark">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
