@extends('layouts.master')
@section('title','Show StockTransper')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('stocktranspers.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
	<tbody>
		<tr>
			<th>Id</th>
			<td>{{$stocktransper->id}}</td>
		</tr>
		<tr>
			<th>Project </th>
			<td>{{ $stocktransper->project->name ?? 'N/A' }}</td>

		</tr>
		<tr>
			<th>Warehouse </th>
			<td>{{ $stocktransper->warehouse->name ?? 'N/A' }}</td>
		</tr>
		<tr>
			<th>Transper Date</th>
			<td>{{$stocktransper->transper_date}}</td>
		</tr>
		<tr>
			<th>Created At</th>
			<td>{{$stocktransper->created_at}}</td>
		</tr>
		<tr>
			<th>Updated At</th>
			<td>{{$stocktransper->updated_at}}</td>
		</tr>

	</tbody>
</table>
@endsection
@section('script')


@endsection