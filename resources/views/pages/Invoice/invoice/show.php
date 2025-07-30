<!-- @extends('layouts.master')
@section('title','Show Invoice')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('invoices.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$invoice->id}}</td></tr>
		<tr><th>Customer Id</th><td>{{$invoice->customer_id}}</td></tr>
		<tr><th>Total Amount</th><td>{{$invoice->total_amount}}</td></tr>
		<tr><th>Status</th><td>{{$invoice->status}}</td></tr>
		<tr><th>Paid Amount</th><td>{{$invoice->paid_amount}}</td></tr>
		<tr><th>Due Amount</th><td>{{$invoice->due_amount}}</td></tr>
		<tr><th>Issue Date</th><td>{{$invoice->issue_date}}</td></tr>
		<tr><th>Due Date</th><td>{{$invoice->due_date}}</td></tr>
		<tr><th>Created At</th><td>{{$invoice->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$invoice->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection -->
<?php

use App\Models\Invoice;
use App\Models\InvoiceDetail;

$invoices = Invoice::all();
$invoicedetails = InvoiceDetail::all();

?>

@extends('layouts.master')
@section('title','Invoice Full Details')

@section('style')
<!-- Add any custom styles here -->
@endsection

@section('page')
<a class='btn btn-success mb-3' href="{{ route('invoices.index') }}">Manage Invoices</a>

<h4>Invoice Info</h4>
<table class='table table-bordered table-striped text-nowrap'>
    <tbody>
        <tr><th>Id</th><td>{{ $invoice->id }}</td></tr>
        <tr><th>Customer Id</th><td>{{ $invoice->customer_id }}</td></tr>
        <tr><th>Total Amount</th><td>{{ $invoice->total_amount }}</td></tr>
        <tr><th>Status</th><td>{{ $invoice->status }}</td></tr>
        <tr><th>Paid Amount</th><td>{{ $invoice->paid_amount }}</td></tr>
        <tr><th>Due Amount</th><td>{{ $invoice->due_amount }}</td></tr>
        <tr><th>Issue Date</th><td>{{ $invoice->issue_date }}</td></tr>
        <tr><th>Due Date</th><td>{{ $invoice->due_date }}</td></tr>
        <tr><th>Created At</th><td>{{ $invoice->created_at }}</td></tr>
        <tr><th>Updated At</th><td>{{ $invoice->updated_at }}</td></tr>
    </tbody>
</table>

<h4 class="mt-4">Invoice Details</h4>
<table class='table table-bordered table-striped text-nowrap'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Invoice ID</th>
            <th>Property ID</th>
            <th>Total Amount</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($invoicedetails as $detail)
        <tr>
            <td>{{ $detail->id }}</td>
            <td>{{ $detail->invoice_id }}</td>
            <td>{{ $detail->property_id }}</td>
            <td>{{ $detail->total_amount }}</td>
            <td>{{ $detail->created_at }}</td>
            <td>{{ $detail->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('script')
<!-- Add any custom scripts here -->
@endsection

