
@extends('layouts.master')
@section('title','Show Category')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('categorys.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$category->id}}</td></tr>
		<tr><th>Name</th><td>{{$category->name}}</td></tr>
		<tr><th>Created At</th><td>{{$category->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$category->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
