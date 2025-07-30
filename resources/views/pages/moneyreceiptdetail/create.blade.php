
@extends('layouts.master')
@section('title','Create MoneyReceiptDetail')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('moneyreceiptdetails.index')}}">Manage</a>
<form action="{{route('moneyreceiptdetails.store')}}" method ="post" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
	<label for="money_receipt_id" class="col-sm-2 col-form-label">Money_Receipt</label>
	<div class="col-sm-10">
		<select class="form-control" name="money_receipt_id" id="money_receipt_id">
			@foreach($money_receipts as $money_receipt)
				<option value="{{$money_receipt->id}}">{{$money_receipt->id}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="property_id" class="col-sm-2 col-form-label">Property</label>
	<div class="col-sm-10">
		<select class="form-control" name="property_id" id="property_id">
			@foreach($propertys as $property)
				<option value="{{$property->id}}">{{$property->title}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="amount" class="col-sm-2 col-form-label">Amount</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="amount" id="amount" placeholder="Amount">
	</div>
</div>
<div class="row mb-3">
	<label for="flat_no" class="col-sm-2 col-form-label">Flat No</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="flat_no" id="flat_no" placeholder="Flat No">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection
