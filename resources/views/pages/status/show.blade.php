
@extends('layouts.master')
@section('title','Show Statu')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('status.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$statu->id}}</td></tr>
		<tr><th>Name</th><td>{{$statu->name}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
