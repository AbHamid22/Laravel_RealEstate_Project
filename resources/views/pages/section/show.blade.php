
@extends('layouts.master')
@section('title','Show Section')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('sections.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$section->id}}</td></tr>
		<tr><th>Name</th><td>{{$section->name}}</td></tr>
		<tr><th>Description</th><td>{{$section->description}}</td></tr>
		<tr><th>Created At</th><td>{{$section->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$section->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
