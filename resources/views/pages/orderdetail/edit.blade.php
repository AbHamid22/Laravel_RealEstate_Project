
@extends('layouts.master')
@section('title','Edit OrderDetail')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('orderdetails.index')}}">Manage</a>
<form action="{{route('orderdetails.update',$orderdetail)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="order_id" class="col-sm-2 col-form-label">Order</label>
	<div class="col-sm-10">
		<select class="form-control" name="order_id" id="order_id">
			@foreach($orders as $order)
				@if($order->id==$orderdetail->order_id)
					<option value="{{$order->id}}" selected>{{$order->id}}</option>
				@else
					<option value="{{$order->id}}">{{$order->id}}</option>
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
				@if($property->id==$orderdetail->property_id)
					<option value="{{$property->id}}" selected>{{$property->title}}</option>
				@else
					<option value="{{$property->id}}">{{$property->title}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="flat_no" class="col-sm-2 col-form-label">Flat No</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="flat_no" value="{{$orderdetail->flat_no}}" id="flat_no" placeholder="Flat No">
	</div>
</div>
<div class="row mb-3">
	<label for="amount" class="col-sm-2 col-form-label">Amount</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="amount" value="{{$orderdetail->amount}}" id="amount" placeholder="Amount">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
