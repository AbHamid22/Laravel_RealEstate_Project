
@extends('layouts.master')
@section('title','Show Warehouse')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('warehouses.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$warehouse->id}}</td></tr>
		<tr><th>Name</th><td>{{$warehouse->name}}</td></tr>
		<tr><th>City</th><td>{{$warehouse->city}}</td></tr>
		<tr><th>Contact</th><td>{{$warehouse->contact}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
