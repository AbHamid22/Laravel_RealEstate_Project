
@extends('layouts.master')
@section('title','Edit MoneyReceipt')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('moneyreceipts.index')}}">Manage</a>
<form action="{{route('moneyreceipts.update',$moneyreceipt)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="customer_id" class="col-sm-2 col-form-label">Customer</label>
	<div class="col-sm-10">
		<select class="form-control" name="customer_id" id="customer_id">
			@foreach($customers as $customer)
				@if($customer->id==$moneyreceipt->customer_id)
					<option value="{{$customer->id}}" selected>{{$customer->name}}</option>
				@else
					<option value="{{$customer->id}}">{{$customer->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="remark" class="col-sm-2 col-form-label">Remark</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="remark" value="{{$moneyreceipt->remark}}" id="remark" placeholder="Remark">
	</div>
</div>
<div class="row mb-3">
	<label for="receipt_total" class="col-sm-2 col-form-label">Receipt Total</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="receipt_total" value="{{$moneyreceipt->receipt_total}}" id="receipt_total" placeholder="Receipt Total">
	</div>
</div>
<div class="row mb-3">
	<label for="discount" class="col-sm-2 col-form-label">Discount</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="discount" value="{{$moneyreceipt->discount}}" id="discount" placeholder="Discount">
	</div>
</div>
<div class="row mb-3">
	<label for="vat" class="col-sm-2 col-form-label">Vat</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="vat" value="{{$moneyreceipt->vat}}" id="vat" placeholder="Vat">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
