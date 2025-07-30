@extends('layouts.master')
@section('title','Create InvoiceDetail')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('invoicedetails.index')}}">Manage</a>
<form action="{{route('invoicedetails.store')}}" method ="post" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
	<label for="invoice_id" class="col-sm-2 col-form-label">Invoice</label>
	<div class="col-sm-10">
		<select class="form-control" name="invoice_id" id="invoice_id">
			@foreach($invoices as $invoice)
				<option value="{{$invoice->id}}">{{$invoice->id}}</option>
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
	<label for="total_amount" class="col-sm-2 col-form-label">Total Amount</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="total_amount" id="total_amount" placeholder="Total Amount">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection
