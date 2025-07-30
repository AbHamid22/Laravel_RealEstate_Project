@extends('layouts.master')
@section('title','Show PurchaseDetail')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('purchasedetails.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$purchasedetail->id}}</td></tr>
		<tr><th>Purchase Id</th><td>{{$purchasedetail->purchase_id}}</td></tr>
		<tr><th>Product Id</th><td>{{$purchasedetail->product_id}}</td></tr>
		<tr><th>Qty</th><td>{{$purchasedetail->qty}}</td></tr>
		<tr><th>Uom Id</th><td>{{$purchasedetail->uom_id}}</td></tr>
		<tr><th>Price</th><td>{{$purchasedetail->price}}</td></tr>
		<tr><th>Item Vat</th><td>{{$purchasedetail->item_vat}}</td></tr>
		<tr><th>Item Discount</th><td>{{$purchasedetail->item_discount}}</td></tr>
		<tr><th>Created At</th><td>{{$purchasedetail->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$purchasedetail->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
