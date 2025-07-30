@extends('layouts.master')
@section('title','Show MoneyReceiptDetail')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('moneyreceiptdetails.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
	<tbody>
		<tr>
			<th>Id</th>
			<td>{{$moneyreceiptdetail->id}}</td>
		</tr>
		<tr>
			<th>Money Receipt Id</th>
			<td>{{$moneyreceiptdetail->moneyReceipt->id ?? 'N/A'}}</td>
		</tr>
		<tr>
			<th>Property</th>

			<td>{{$moneyreceiptdetail->property->title ?? 'N/A'}}</td>
		</tr>
		<tr>
			<th>Amount</th>
			<td>{{$moneyreceiptdetail->amount}}</td>
		</tr>
		<tr>
			<th>ProjectID</th>
			<td>{{$moneyreceiptdetail->project_id}}</td>
		</tr>

	</tbody>
</table>
@endsection
@section('script')


@endsection