@extends('layouts.master')
@section('title','Show InvoiceDetail')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('invoicedetails.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$invoicedetail->id}}</td></tr>
		<tr><th>Invoice Id</th><td>{{$invoicedetail->invoice_id}}</td></tr>
		<tr><th>Property Id</th><td>{{$invoicedetail->property_id}}</td></tr>
		<tr><th>Total Amount</th><td>{{$invoicedetail->total_amount}}</td></tr>
		<tr><th>Createt At</th><td>{{$invoicedetail->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$invoicedetail->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
