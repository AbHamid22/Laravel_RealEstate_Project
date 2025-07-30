@extends('layouts.master')
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


@endsection