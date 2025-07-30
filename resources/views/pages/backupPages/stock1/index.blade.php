<?php

?>
@extends('layouts.master')
@section('title','Manage Stock')
@section('style')


@endsection
@section('page')
<a href="{{route('stocks.create')}}">New Stock</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Product</th>
			<th>Qty</th>
			<th>Transaction Type</th>
			<th>Remark</th>
			<th>Created At</th>
			<th>Warehouse</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($stocks as $stock)
		<tr>
			<td>{{$stock->id}}</td>
			<td>{{ $stock->product->name ?? 'N/A' }}</td>
			<td>{{$stock->qty}}</td>
			<td>{{ $stock->transactionType->name ?? 'N/A' }}</td>
			<td>{{$stock->remark}}</td>
			<td>{{$stock->created_at}}</td>
			<td>{{ $stock->warehouse->name ?? 'N/A' }}</td>


			


			<td>
				<form action="{{route('stocks.destroy',$stock->id)}}" method="post">
					<a class='btn btn-primary' href="{{route('stocks.show',$stock->id)}}">View</a>
					<a class='btn btn-success' href="{{route('stocks.edit',$stock->id)}}"> Edit </a>
					@method('DELETE')
					@csrf
					<input type="submit" class="btn btn-danger" name="delete" value="Delete" />
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<div class="d-flex justify-content-center mt-1">
	{{ $stocks->links('vendor.pagination.bootstrap-5') }}
</div>

@endsection
@section('script')


@endsection