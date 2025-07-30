
@extends('layouts.master')
@section('title','Show Purchase')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('purchases.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$purchase->id}}</td></tr>
		<tr><th>Supplier Id</th><td>{{$purchase->supplier_id}}</td></tr>
		<tr><th>Purchase Date</th><td>{{$purchase->purchase_date}}</td></tr>
		<tr><th>Delivery Date</th><td>{{$purchase->delivery_date}}</td></tr>
		<tr><th>Shipping Address</th><td>{{$purchase->shipping_address}}</td></tr>
		<tr><th>Purchase Total</th><td>{{$purchase->purchase_total}}</td></tr>
		<tr><th>Paid Amount</th><td>{{$purchase->paid_amount}}</td></tr>
		<tr><th>Remark</th><td>{{$purchase->remark}}</td></tr>
		<tr><th>Status Id</th><td>{{$purchase->status_id}}</td></tr>
		<tr><th>Discount</th><td>{{$purchase->discount}}</td></tr>
		<tr><th>Vat</th><td>{{$purchase->vat}}</td></tr>
		<tr><th>Created At</th><td>{{$purchase->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$purchase->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
