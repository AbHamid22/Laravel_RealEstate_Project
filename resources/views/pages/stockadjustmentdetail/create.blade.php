
@extends('layouts.master')
@section('title','Create StockAdjustmentDetail')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('stockadjustmentdetails.index')}}">Manage</a>
<form action="{{route('stockadjustmentdetails.store')}}" method ="post" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
	<label for="adjustment_id" class="col-sm-2 col-form-label">Adjustment</label>
	<div class="col-sm-10">
		<select class="form-control" name="adjustment_id" id="adjustment_id">
			@foreach($adjustments as $adjustment)
				<option value="{{$adjustment->id}}">{{$adjustment->name}}</option>
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

<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection
