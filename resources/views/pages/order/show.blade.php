
@extends('layouts.master')
@section('title','Show Order')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('orders.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
	<tbody>
		<tr>
			<th>Id</th>
			<td>{{$order->id}}</td>
		</tr>
		<tr>
			<th>Customer</th>
			<td>{{ $order->customer->name ?? 'N/A' }}</td>
		</tr>
		<tr>
			<th>Order Date</th>
			<td>{{$order->order_date}}</td>
		</tr>
		<tr>
			<th>Handover Date</th>
			<td>{{$order->handover_date}}</td>
		</tr>
		<tr>
			<th>Total Amount</th>
			<td>{{$order->total_amount}}</td>
		</tr>
		<tr>
			<th>Paid Amount</th>
			<td>{{$order->paid_amount}}</td>
		</tr>
		<tr>
			<th>Discount</th>
			<td>{{$order->discount}}</td>
		</tr>
		<tr>
			<th>Created At</th>
			<td>{{$order->created_at}}</td>
		</tr>
		<tr>
			<th>Updated At</th>
			<td>{{$order->updated_at}}</td>
		</tr>

	</tbody>
</table>
@endsection
