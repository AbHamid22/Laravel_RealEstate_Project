@extends('layouts.master')
@section('title','Edit Invoice')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('invoices.index')}}">Manage</a>
<form action="{{route('invoices.update',$invoice)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	<div class="row mb-3">
		<label for="customer_id" class="col-sm-2 col-form-label">Customer</label>
		<div class="col-sm-10">
			<select class="form-control" name="customer_id" id="customer_id">
				@foreach($customers as $customer)
				@if($customer->id==$invoice->customer_id)
				<option value="{{$customer->id}}" selected>{{$customer->name}}</option>
				@else
				<option value="{{$customer->id}}">{{$customer->name}}</option>
				@endif
				@endforeach
			</select>
		</div>
	</div>
	<div class="row mb-3">
		<label for="total_amount" class="col-sm-2 col-form-label">Total Amount</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="total_amount" value="{{$invoice->total_amount}}" id="total_amount" placeholder="Total Amount">
		</div>
	</div>
	<div class="row mb-3">
		<label for="status" class="col-sm-2 col-form-label">Status</label>
		<div class="col-sm-10">
			<select class="form-control" name="status" id="status">
				<option value="unpaid" {{ $invoice->status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
				<option value="paid" {{ $invoice->status == 'paid' ? 'selected' : '' }}>Paid</option>
				<option value="partial" {{ $invoice->status == 'partial' ? 'selected' : '' }}>Partial</option>
			</select>
		</div>
	</div>

	<div class="row mb-3">
		<label for="issue_date" class="col-sm-2 col-form-label">Issue Date</label>
		<div class="col-sm-10">
			<input type="date" class="form-control" name="issue_date" value="{{$invoice->issue_date}}" id="issue_date" placeholder="Issue Date">
		</div>
	</div>

	<div class="row mb-3">
		<label for="due_date" class="col-sm-2 col-form-label">Due Date</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="due_date" value="{{$invoice->due_date}}" id="due_date" placeholder="Due Date">
		</div>
	</div>

	<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection