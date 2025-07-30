
@extends('layouts.master')
@section('title','Edit PurchaseDetail')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('purchasedetails.index')}}">Manage</a>
<form action="{{route('purchasedetails.update',$purchasedetail)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="purchase_id" class="col-sm-2 col-form-label">Warehouse</label>
	<div class="col-sm-10">
		<select class="form-control" name="purchase_id" id="purchase_id">
			@foreach($purchases as $purchase)
				@if($purchase->id==$purchasedetail->purchase_id)
					<option value="{{$purchase->id}}" selected>{{$purchase->shipping_address}}</option>
				@else
					<option value="{{$purchase->id}}">{{$purchase->name}}</option>
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
				@if($product->id==$purchasedetail->product_id)
					<option value="{{$product->id}}" selected>{{$product->name}}</option>
				@else
					<option value="{{$product->id}}">{{$product->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="qty" class="col-sm-2 col-form-label">Qty</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="qty" value="{{$purchasedetail->qty}}" id="qty" placeholder="Qty">
	</div>
</div>
<div class="row mb-3">
	<label for="price" class="col-sm-2 col-form-label">Price</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="price" value="{{$purchasedetail->price}}" id="price" placeholder="Price">
	</div>
</div>
<div class="row mb-3">
	<label for="vat" class="col-sm-2 col-form-label">Vat</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="vat" value="{{$purchasedetail->vat}}" id="vat" placeholder="Vat">
	</div>
</div>
<div class="row mb-3">
	<label for="discount" class="col-sm-2 col-form-label">Discount</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="discount" value="{{$purchasedetail->discount}}" id="discount" placeholder="Discount">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
