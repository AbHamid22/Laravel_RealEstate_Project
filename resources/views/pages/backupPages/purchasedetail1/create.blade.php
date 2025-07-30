<?php

?>
@extends('layouts.master')
@section('title','Create PurchaseDetail')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('purchasedetails.index')}}">Manage</a>
<form action="{{route('purchasedetails.store')}}" method ="post" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
	<label for="purchase_id" class="col-sm-2 col-form-label">Purchase</label>
	<div class="col-sm-10">
		<select class="form-control" name="purchase_id" id="purchase_id">
			@foreach($purchases as $purchase)
				<option value="{{$purchase->id}}">{{$purchase->id}}</option>
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
	<label for="qty" class="col-sm-2 col-form-label">Qty</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="qty" id="qty" placeholder="Qty">
	</div>
</div>
<div class="row mb-3">
	<label for="price" class="col-sm-2 col-form-label">Price</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="price" id="price" placeholder="Price">
	</div>
</div>
<div class="row mb-3">
	<label for="vat" class="col-sm-2 col-form-label">Vat</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="vat" id="vat" placeholder="Vat">
	</div>
</div>
<div class="row mb-3">
	<label for="discount" class="col-sm-2 col-form-label">Discount</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="discount" id="discount" placeholder="Discount">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection
