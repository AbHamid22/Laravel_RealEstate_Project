
@extends('layouts.master')
@section('title','Show Statuse')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('propertystatuses.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$statuses->id}}</td></tr>
		<tr><th>Name</th><td>{{$statuses->name}}</td></tr>
		<tr><th>Created At</th><td>{{$statuses->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$statuses->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
