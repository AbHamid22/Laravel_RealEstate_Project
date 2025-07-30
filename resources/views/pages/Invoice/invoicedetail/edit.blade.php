@extends('layouts.master')
@section('title','Edit InvoiceDetail')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('invoicedetails.index')}}">Manage</a>
<form action="{{route('invoicedetails.update',$invoicedetail)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="invoice_id" class="col-sm-2 col-form-label">Invoice</label>
	<div class="col-sm-10">
		<select class="form-control" name="invoice_id" id="invoice_id">
			@foreach($invoices as $invoice)
				@if($invoice->id==$invoicedetail->invoice_id)
					<option value="{{$invoice->id}}" selected>{{$invoice->name}}</option>
				@else
					<option value="{{$invoice->id}}">{{$invoice->name}}</option>
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
				@if($property->id==$invoicedetail->property_id)
					<option value="{{$property->id}}" selected>{{$property->name}}</option>
				@else
					<option value="{{$property->id}}">{{$property->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="total_amount" class="col-sm-2 col-form-label">Total Amount</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="total_amount" value="{{$invoicedetail->total_amount}}" id="total_amount" placeholder="Total Amount">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection

