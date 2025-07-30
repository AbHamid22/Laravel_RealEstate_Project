
@extends('layouts.master')
@section('title','Show ProductSection')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('productsections.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$productsection->id}}</td></tr>
		<tr><th>Name</th><td>{{$productsection->name}}</td></tr>
		<tr><th>Unit Id</th><td>{{$productsection->unit_id}}</td></tr>
		<tr><th>Photo</th><td><img src="{{asset('img/'.$productsection->photo)}}" width="100" /></td></tr>
		<tr><th>Icon</th><td>{{$productsection->icon}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
