
@extends('layouts.master')
@section('title','Show StockAdjustment')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('stockadjustments.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$stockadjustment->id}}</td></tr>
		<tr><th>Adjustment At</th><td>{{$stockadjustment->adjustment_at}}</td></tr>
		<tr><th>User Id</th><td>{{$stockadjustment->user_id}}</td></tr>
		<tr><th>Remark</th><td>{{$stockadjustment->remark}}</td></tr>
		<tr><th>Adjustment Type Id</th><td>{{$stockadjustment->adjustment_type_id}}</td></tr>
		<tr><th>Warehouse Id</th><td>{{$stockadjustment->warehouse_id}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
