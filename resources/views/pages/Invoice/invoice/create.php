@extends('layouts.master')
@section('title','Create Invoice')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('invoices.index')}}">Manage</a>
<form action="{{route('invoices.store')}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="row mb-3">
		<label for="customer_id" class="col-sm-2 col-form-label">Customer</label>
		<div class="col-sm-10">
			<select class="form-control" name="customer_id" id="customer_id">
				@foreach($customers as $customer)
				<option value="{{$customer->id}}">{{$customer->name}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="row mb-3">
		<label for="total_amount" class="col-sm-2 col-form-label">Total Amount</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="total_amount" id="total_amount" placeholder="Total Amount">
		</div>
	</div>
	<div class="row mb-3">
		<label for="status" class="col-sm-2 col-form-label">Status</label>
		<div class="col-sm-10">
			<select class="form-control" name="status" id="status">
				<option value="paid">paid</option>
				<option value="unpaid">unpaid</option>
				<option value="partial">partial</option>
			</select>
		</div>
	</div>

	<div class="row mb-3">
		<label for="paid_amount" class="col-sm-2 col-form-label">Paid Amount</label>
		<div class="col-sm-10">
			<input type="number" class="form-control" name="paid_amount" id="paid_amount" placeholder="Paid Amount">
		</div>
	</div>
	<div class="row mb-3">
		<label for="due_amount" class="col-sm-2 col-form-label">Due Amount</label>
		<div class="col-sm-10">
			<input type="number" class="form-control" name="due_amount" id="due_amount" placeholder="Due Amount">
		</div>
	</div>
	<div class="row mb-3">
		<label for="issue_date" class="col-sm-2 col-form-label">Issue Date</label>
		<div class="col-sm-10">
			<input type="date" class="form-control" name="issue_date" id="issue_date" placeholder="Issue Date">
		</div>
	</div>
	<div class="row mb-3">
		<label for="due_date" class="col-sm-2 col-form-label">Due Date</label>
		<div class="col-sm-10">
			<input type="date" class="form-control" name="due_date" id="due_date" placeholder="Due Date">
		</div>
	</div>

	<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection