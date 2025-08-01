@extends('layouts.master')
@section('title','Edit Purchase')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('purchases.index')}}">Manage</a>
<form action="{{route('purchases.update',$purchase)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="vendor_id" class="col-sm-2 col-form-label">Vendor</label>
	<div class="col-sm-10">
		<select class="form-control" name="vendor_id" id="vendor_id">
			@foreach($vendors as $vendor)
				@if($vendor->id==$purchase->vendor_id)
					<option value="{{$vendor->id}}" selected>{{$vendor->name}}</option>
				@else
					<option value="{{$vendor->id}}">{{$vendor->name}}</option>
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
				@if($warehouse->id==$purchase->warehouse_id)
					<option value="{{$warehouse->id}}" selected>{{$warehouse->name}}</option>
				@else
					<option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>


<div class="row mb-3">
	<label for="purchase_date" class="col-sm-2 col-form-label">Purchase Date</label>
	<div class="col-sm-10">
		<input type = "date" class="form-control" name="purchase_date" id="purchase_date" placeholder="purchase_date">
	</div>
</div>

<div class="row mb-3">
	<label for="delivery_date" class="col-sm-2 col-form-label">Delivery_date</label>
	<div class="col-sm-10">
		<input type = "date" class="form-control" name="delivery_date" id="delivery_date" placeholder="delivery_date">
	</div>
</div>




<div class="row mb-3">
	<label for="purchase_total" class="col-sm-2 col-form-label">Purchase Total</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="purchase_total" value="{{$purchase->purchase_total}}" id="purchase_total" placeholder="Purchase Total">
	</div>
</div>
<div class="row mb-3">
	<label for="paid_amount" class="col-sm-2 col-form-label">Paid Amount</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="paid_amount" value="{{$purchase->paid_amount}}" id="paid_amount" placeholder="Paid Amount">
	</div>
</div>
<div class="row mb-3">
	<label for="status_id" class="col-sm-2 col-form-label">Status</label>
	<div class="col-sm-10">
		<select class="form-control" name="status_id" id="status_id">
			@foreach($status as $status)
				@if($status->id==$purchase->status_id)
					<option value="{{$status->id}}" selected>{{$status->name}}</option>
				@else
					<option value="{{$status->id}}">{{$status->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="discount" class="col-sm-2 col-form-label">Discount</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="discount" value="{{$purchase->discount}}" id="discount" placeholder="Discount">
	</div>
</div>
<div class="row mb-3">
	<label for="vat" class="col-sm-2 col-form-label">Vat</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="vat" value="{{$purchase->vat}}" id="vat" placeholder="Vat">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
