
@extends('layouts.master')
@section('title','Show OrderDetail')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('orderdetails.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
	<tbody>
		<tr>
			<th>Id</th>
			<td>{{$orderdetail->id}}</td>
		</tr>
		<tr>
			<th>Order Id</th>
			<td>{{$orderdetail->order_id}}</td>
		</tr>
		<tr>
			<th>Property Name</th>
			<td>{{$orderdetail->property->title ?? 'N/A'}}</td>
		</tr>
		<tr>
			<th>Flat No</th>
			<td>{{$orderdetail->flat_no}}</td>
		</tr>
		<tr>
			<th>Amount</th>
			<td>{{$orderdetail->amount}}</td>
		</tr>
		<tr>
			<th>Created At</th>
			<td>{{$orderdetail->created_at}}</td>
		</tr>
		<tr>
			<th>Updated At</th>
			<td>{{$orderdetail->updated_at}}</td>
		</tr>

	</tbody>
</table>
@endsection
@section('script')


@endsection