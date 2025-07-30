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
	<label for="purchase_id" class="col-sm-2 col-form-label">Purchase</label>
	<div class="col-sm-10">
		<select class="form-control" name="purchase_id" id="purchase_id">
			@foreach($purchases as $purchase)
				@if($purchase->id==$purchasedetail->purchase_id)
					<option value="{{$purchase->id}}" selected>{{$purchase->id}}</option>
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
	<label for="uom_id" class="col-sm-2 col-form-label">Uom</label>
	<div class="col-sm-10">
		<select class="form-control" name="uom_id" id="uom_id">
			@foreach($uoms as $uom)
				<option value="{{$uom->id}}">{{$uom->name}}</option>
			@endforeach
		</select>
	</div>
</div>


<div class="row mb-3">
	<label for="price" class="col-sm-2 col-form-label">Price</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="price" value="{{$purchasedetail->price}}" id="price" placeholder="Price">
	</div>
</div>
<div class="row mb-3">
	<label for="item_vat" class="col-sm-2 col-form-label">Item Vat</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="item_vat" value="{{$purchasedetail->item_vat}}" id="item_vat" placeholder="Item Vat">
	</div>
</div>
<div class="row mb-3">
	<label for="item_discount" class="col-sm-2 col-form-label">Item Discount</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="item_discount" value="{{$purchasedetail->item_discount}}" id="item_discount" placeholder="Item Discount">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
