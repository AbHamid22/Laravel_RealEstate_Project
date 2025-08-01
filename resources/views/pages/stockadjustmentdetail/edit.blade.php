
@extends('layouts.master')
@section('title','Edit StockAdjustmentDetail')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('stockadjustmentdetails.index')}}">Manage</a>
<form action="{{route('stockadjustmentdetails.update',$stockadjustmentdetail)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="adjustment_id" class="col-sm-2 col-form-label">Adjustment</label>
	<div class="col-sm-10">
		<select class="form-control" name="adjustment_id" id="adjustment_id">
			@foreach($adjustments as $adjustment)
				@if($adjustment->id==$stockadjustmentdetail->adjustment_id)
					<option value="{{$adjustment->id}}" selected>{{$adjustment->name}}</option>
				@else
					<option value="{{$adjustment->id}}">{{$adjustment->name}}</option>
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
				@if($product->id==$stockadjustmentdetail->product_id)
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
		<input type = "text" class="form-control" name="qty" value="{{$stockadjustmentdetail->qty}}" id="qty" placeholder="Qty">
	</div>
</div>
<div class="row mb-3">
	<label for="price" class="col-sm-2 col-form-label">Price</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="price" value="{{$stockadjustmentdetail->price}}" id="price" placeholder="Price">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
