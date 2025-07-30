
@extends('layouts.master')
@section('title','Show StockAdjustmentDetail')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('stockadjustmentdetails.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$stockadjustmentdetail->id}}</td></tr>
		<tr><th>Adjustment Id</th><td>{{$stockadjustmentdetail->adjustment_id}}</td></tr>
		<tr><th>Product Id</th><td>{{$stockadjustmentdetail->product_id}}</td></tr>
		<tr><th>Qty</th><td>{{$stockadjustmentdetail->qty}}</td></tr>
		<tr><th>Price</th><td>{{$stockadjustmentdetail->price}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
