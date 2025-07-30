
@extends('layouts.master')
@section('title','Show StockAdjustmentType')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('stockadjustmenttypes.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$stockadjustmenttype->id}}</td></tr>
		<tr><th>Name</th><td>{{$stockadjustmenttype->name}}</td></tr>
		<tr><th>Factor</th><td>{{$stockadjustmenttype->factor}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
