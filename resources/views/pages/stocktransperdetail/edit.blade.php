@extends('layouts.master')
@section('title','Edit StockTransperDetail')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('stocktransperdetails.index')}}">Manage</a>
<form action="{{route('stocktransperdetails.update',$stocktransperdetail)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="transper_id" class="col-sm-2 col-form-label">Transper</label>
	<div class="col-sm-10">
		<select class="form-control" name="transper_id" id="transper_id">
			@foreach($transpers as $transper)
				@if($transper->id==$stocktransperdetail->transper_id)
					<option value="{{$transper->id}}" selected>{{$transper->name}}</option>
				@else
					<option value="{{$transper->id}}">{{$transper->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="product_id" class="col-sm-2 col-form-label">Product</label>
	<div class="col-sm-10">
		<select class="form-control" name="product_id" id="product_id">
			@foreach($products as $product)
				@if($product->id==$stocktransperdetail->product_id)
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
				@if($uom->id==$stocktransperdetail->uom_id)
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
		<input type = "text" class="form-control" name="qty" value="{{$stocktransperdetail->qty}}" id="qty" placeholder="Qty">
	</div>
</div>
<div class="row mb-3">
	<label for="price" class="col-sm-2 col-form-label">Price</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="price" value="{{$stocktransperdetail->price}}" id="price" placeholder="Price">
	</div>
</div>
<div class="row mb-3">
	<label for="transaction_type_id" class="col-sm-2 col-form-label">Transaction_Type</label>
	<div class="col-sm-10">
		<select class="form-control" name="transaction_type_id" id="transaction_type_id">
			@foreach($transaction_types as $transaction_type)
				@if($transaction_type->id==$stocktransperdetail->transaction_type_id)
					<option value="{{$transaction_type->id}}" selected>{{$transaction_type->name}}</option>
				@else
					<option value="{{$transaction_type->id}}">{{$transaction_type->name}}</option>
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
