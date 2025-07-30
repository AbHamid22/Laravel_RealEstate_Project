@extends('layouts.master')
@section('title','Show Company')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('companys.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$company->id}}</td></tr>
		<tr><th>Name</th><td>{{$company->name}}</td></tr>
		<tr><th>Mobile</th><td>{{$company->mobile}}</td></tr>
		<tr><th>Bin</th><td>{{$company->bin}}</td></tr>
		<tr><th>Email</th><td>{{$company->email}}</td></tr>
		<tr><th>Website</th><td>{{$company->website}}</td></tr>
		<tr><th>City</th><td>{{$company->city}}</td></tr>
		<tr><th>Area</th><td>{{$company->area}}</td></tr>
		<tr><th>Street Address</th><td>{{$company->street_address}}</td></tr>
		<tr><th>Post Code</th><td>{{$company->post_code}}</td></tr>
		<tr><th>Inactive</th><td>{{$company->inactive}}</td></tr>
		<tr><th>Logo</th><td>{{$company->logo}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
