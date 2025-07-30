@extends('layouts.master')
@section('title','Show StockTransperDetail')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('stocktransperdetails.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
	<tbody>
		<tr>
			<th>Id</th>
			<td>{{$stocktransperdetail->id}}</td>
		</tr>
		<tr>
			<th>Transper Id  </th>
			<td>{{ $stocktransperdetail->transper->id ?? 'N/A' }}</td>



		</tr>
		<tr>
			<th>Product</th>
			<td>{{ $stocktransperdetail->product->name ?? 'N/A' }}</td>
		</tr>
		<tr>
			<th>Uom</th>
			<td>{{ $stocktransperdetail->uom->name ?? 'N/A' }}</td>
		</tr>
		<tr>
			<th>Qty</th>
			<td>{{$stocktransperdetail->qty}}</td>
		</tr>
		<tr>
			<th>Price</th>
			<td>{{$stocktransperdetail->price}}</td>
		</tr>
		<tr>
			<th>Transaction Type</th>
			<td>{{ $stocktransperdetail->transactionType->name ?? 'N/A' }}</td>
		</tr>
		<tr>
			<th>Created At</th>
			<td>{{$stocktransperdetail->created_at}}</td>
		</tr>
		<tr>
			<th>Updated At</th>
			<td>{{$stocktransperdetail->updated_at}}</td>
		</tr>

	</tbody>
</table>
@endsection
@section('script')


@endsection