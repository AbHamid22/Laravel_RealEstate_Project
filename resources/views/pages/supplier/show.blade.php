
@extends('layouts.master')
@section('title','Show Supplier')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('suppliers.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$supplier->id}}</td></tr>
		<tr><th>Name</th><td>{{$supplier->name}}</td></tr>
		<tr><th>Mobile</th><td>{{$supplier->mobile}}</td></tr>
		<tr><th>Email</th><td>{{$supplier->email}}</td></tr>
		<tr><th>Photo</th><td><img src="{{asset('img/'.$supplier->photo)}}" width="100" /></td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
