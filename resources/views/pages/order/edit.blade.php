
@extends('layouts.master')
@section('title','Edit Order')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('orders.index')}}">Manage</a>
<form action="{{route('orders.update',$order)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	<div class="row mb-3">
		<label for="customer_id" class="col-sm-2 col-form-label">Customer</label>
		<div class="col-sm-10">
			<select class="form-control" name="customer_id" id="customer_id">
				@foreach($customers as $customer)
				@if($customer->id==$order->customer_id)
				<option value="{{$customer->id}}" selected>{{$customer->name}}</option>
				@else
				<option value="{{$customer->id}}">{{$customer->name}}</option>
				@endif
				@endforeach
			</select>
		</div>
	</div>

	<div class="row mb-3">
		<label for="order_date" class="col-sm-2 col-form-label">Order Date</label>
		<div class="col-sm-10">
			<input type="date" class="form-control" name="order_date" id="order_date" placeholder="order_date">
		</div>
	</div>

	<div class="row mb-3">
		<label for="handover_date" class="col-sm-2 col-form-label">Handover date</label>
		<div class="col-sm-10">
			<input type="date" class="form-control" name="handover_date" id="handover_date" placeholder="handover_date">
		</div>
	</div>


	<div class="row mb-3">
		<label for="total_amount" class="col-sm-2 col-form-label">Total Amount</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="total_amount" value="{{$order->total_amount}}" id="total_amount" placeholder="Total Amount">
		</div>
	</div>
	<div class="row mb-3">
		<label for="paid_amount" class="col-sm-2 col-form-label">Paid Amount</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="paid_amount" value="{{$order->paid_amount}}" id="paid_amount" placeholder="Paid Amount">
		</div>
	</div>
	<div class="row mb-3">
		<label for="discount" class="col-sm-2 col-form-label">Discount</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="discount" value="{{$order->discount}}" id="discount" placeholder="Discount">
		</div>
	</div>

	<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection