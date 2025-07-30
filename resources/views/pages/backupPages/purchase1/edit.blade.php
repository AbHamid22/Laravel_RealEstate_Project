
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
	<label for="supplier_id" class="col-sm-2 col-form-label">Supplier</label>
	<div class="col-sm-10">
		<select class="form-control" name="supplier_id" id="supplier_id">
			@foreach($suppliers as $supplier)
				@if($supplier->id==$purchase->supplier_id)
					<option value="{{$supplier->id}}" selected>{{$supplier->name}}</option>
				@else
					<option value="{{$supplier->id}}">{{$supplier->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="shipping_address" class="col-sm-2 col-form-label">Shipping Address</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="shipping_address" value="{{$purchase->shipping_address}}" id="shipping_address" placeholder="Shipping Address">
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
	<label for="remark" class="col-sm-2 col-form-label">Remark</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="remark" value="{{$purchase->remark}}" id="remark" placeholder="Remark">
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
