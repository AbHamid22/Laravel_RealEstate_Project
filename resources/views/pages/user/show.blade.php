
@extends('layouts.master')
@section('title','Show User')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('users.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$user->id}}</td></tr>
		<tr><th>Name</th><td>{{$user->name}}</td></tr>
		<tr><th>Email</th><td>{{$user->email}}</td></tr>
		<tr><th>Email Verified At</th><td>{{$user->email_verified_at}}</td></tr>
		<tr><th>Password</th><td>{{$user->password}}</td></tr>
		<tr><th>Remember Token</th><td>{{$user->remember_token}}</td></tr>
		<tr><th>Created At</th><td>{{$user->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$user->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
