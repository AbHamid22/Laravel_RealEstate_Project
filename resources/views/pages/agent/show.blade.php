
@extends('layouts.master')
@section('title','Show Agent')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('agents.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$agent->id}}</td></tr>
		<tr><th>Photo</th><td><img src="{{asset('img/'.$agent->photo)}}" width="100" /></td></tr>
		<tr><th>Name</th><td>{{$agent->name}}</td></tr>
		<tr><th>Email</th><td>{{$agent->email}}</td></tr>
		<tr><th>Phone</th><td>{{$agent->phone}}</td></tr>
		<tr><th>Created At</th><td>{{$agent->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$agent->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
