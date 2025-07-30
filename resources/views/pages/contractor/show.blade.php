
@extends('layouts.master')
@section('title','Show Contractor')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('contractors.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$contractor->id}}</td></tr>
		<tr><th>Photo</th><td><img src="{{asset('img/'.$contractor->photo)}}" width="100" /></td></tr>
		<tr><th>Name</th><td>{{$contractor->name}}</td></tr>
		<tr><th>Contact Info</th><td>{{$contractor->contact_info}}</td></tr>
		<tr><th>Created At</th><td>{{$contractor->created_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
