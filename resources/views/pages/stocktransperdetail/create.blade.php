@extends('layouts.master')
@section('title','Create StockTransperDetail')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('stocktransperdetails.index')}}">Manage</a>
<form action="{{route('stocktransperdetails.store')}}" method ="post" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
	<label for="transper_id" class="col-sm-2 col-form-label">Transper</label>
	<div class="col-sm-10">
		<select class="form-control" name="transper_id" id="transper_id">
			@foreach($transpers as $transper)
				<option value="{{$transper->id}}">{{$transper->id}}</option>
			@endforeach
		</select>
	</div>
</div>
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
	<label for="uom_id" class="col-sm-2 col-form-label">Uom</label>
	<div class="col-sm-10">
		<select class="form-control" name="uom_id" id="uom_id">
			@foreach($uom as $uom)
				<option value="{{$uom->id}}">{{$uom->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="qty" class="col-sm-2 col-form-label">Qty</label>
	<div class="col-sm-10">
		<textarea class="form-control" name="qty" id="qty" placeholder="Qty"></textarea>
	</div>
</div>
<div class="row mb-3">
	<label for="price" class="col-sm-2 col-form-label">Price</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="price" id="price" placeholder="Price">
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

<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection
