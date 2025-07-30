
@extends('layouts.master')
@section('title','Edit MoneyReceiptDetail')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('moneyreceiptdetails.index')}}">Manage</a>
<form action="{{route('moneyreceiptdetails.update',$moneyreceiptdetail)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="money_receipt_id" class="col-sm-2 col-form-label">Money_Receipt</label>
	<div class="col-sm-10">
		<select class="form-control" name="money_receipt_id" id="money_receipt_id">
			@foreach($money_receipts as $money_receipt)
				@if($money_receipt->id==$moneyreceiptdetail->money_receipt_id)
					<option value="{{$money_receipt->id}}" selected>{{$money_receipt->id}}</option>
				@else
					<option value="{{$money_receipt->id}}">{{$money_receipt->id}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="property_id" class="col-sm-2 col-form-label">Property</label>
	<div class="col-sm-10">
		<select class="form-control" name="property_id" id="property_id">
			@foreach($propertys as $property)
				@if($property->id==$moneyreceiptdetail->property_id)
					<option value="{{$property->id}}" selected>{{$property->title}}</option>
				@else
					<option value="{{$property->id}}">{{$property->title}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="amount" class="col-sm-2 col-form-label">Amount</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="amount" value="{{$moneyreceiptdetail->amount}}" id="amount" placeholder="Amount">
	</div>
</div>
<div class="row mb-3">
	<label for="flat_no" class="col-sm-2 col-form-label">Flat No</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="flat_no" value="{{$moneyreceiptdetail->flat_no}}" id="flat_no" placeholder="Flat No">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
