@extends('layouts.master')
@section('title','Show MoneyReceipt')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('moneyreceipts.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
	<tbody>
		<tr>
			<th>Id</th>
			<td>{{$moneyreceipt->id}}</td>
		</tr>
		<tr>
			<th>Customer Name</th>
			<td>{{ $moneyreceipt->customer->name ?? 'N/A' }}</td>
		</tr>
		<tr>
			<th>Remark</th>
			<td>{{$moneyreceipt->remark}}</td>
		</tr>
		<tr>
			<th>Total Amount</th>
			<td>{{$moneyreceipt->total_amount}}</td>
		</tr>
		<tr>
			<th>Discount</th>
			<td>{{$moneyreceipt->discount}}</td>
		</tr>
		<tr>
			<th>Vat</th>
			<td>{{$moneyreceipt->vat}}</td>
		</tr>
		<tr>
			<th>Created At</th>
			<td>{{$moneyreceipt->created_at}}</td>
		</tr>
		<tr>
			<th>Updated At</th>
			<td>{{$moneyreceipt->updated_at}}</td>
		</tr>

	</tbody>
</table>
@endsection
@section('script')


@endsection