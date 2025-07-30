@extends('layouts.master')
@section('title','Show Person')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('persons.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$person->id}}</td></tr>
		<tr><th>Name</th><td>{{$person->name}}</td></tr>
		<tr><th>Positon</th><td>{{$person->positon}}</td></tr>
		<tr><th>Photo</th><td><img src="{{asset('img/'.$person->photo)}}" width="100" /></td></tr>
		<tr><th>Address</th><td>{{$person->address}}</td></tr>
		<tr><th>Contact</th><td>{{$person->contact}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
