@extends('layouts.master')
@section('title','Show Vendor')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('vendors.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$vendor->id}}</td></tr>
		<tr><th>Photo</th><td><img src="{{asset('img/'.$vendor->photo)}}" width="100" /></td></tr>
		<tr><th>Name</th><td>{{$vendor->name}}</td></tr>
		<tr><th>Mobile</th><td>{{$vendor->mobile}}</td></tr>
		<tr><th>Email</th><td>{{$vendor->email}}</td></tr>
		<tr><th>Address</th><td>{{$vendor->address}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
