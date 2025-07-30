
@extends('layouts.master')
@section('title','Manage Purchase')
@section('style')

@endsection
@section('page')
<a href="{{route('purchases.create')}}">New Purchase</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>#</th>
			<th>Supplier</th>
			<th>Purchase Date</th>
			<!-- <th>Delivery Date</th> -->
			<th>Warehouse Address</th>
			<th>Purchase Total</th>
			<th>Paid Amount</th>
			<th>Remark</th>
			<th>Status</th>
			<th>Discount</th>
			<th>Vat</th>
			<!-- <th>Created At</th>
			<th>Updated At</th> -->

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($purchases as $purchase)
		<tr>
			<td>{{$purchase->id}}</td>
			<td>{{ $purchase->supplier->name ?? 'N/A' }}</td>

			<td>{{$purchase->purchase_date}}</td>
			<!-- <td>{{$purchase->delivery_date}}</td> -->
			<td>{{$purchase->shipping_address}}</td>
			<td>{{$purchase->purchase_total}}</td>
			<td>{{$purchase->paid_amount}}</td>
			<td>{{$purchase->remark}}</td>
			<td>{{ $purchase->status->name ?? 'N/A' }}</td>
			<td>{{$purchase->discount}}</td>
			<td>{{$purchase->vat}}</td>
			<!-- <td>{{$purchase->created_at}}</td>
			<td>{{$purchase->updated_at}}</td> -->

			<td>
				<form action="{{route('purchases.destroy',$purchase->id)}}" method="post">
					<a class='btn btn-primary' href="{{route('purchases.show',$purchase->id)}}">View</a>
					<a class='btn btn-success' href="{{route('purchases.edit',$purchase->id)}}"> Edit </a>
					@method('DELETE')
					@csrf
					<input type="submit" class="btn btn-danger" name="delete" value="Delete" />
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
@section('script')


@endsection