
@extends('layouts.master')
@section('title','Show Manufacturer')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('manufacturers.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$manufacturer->id}}</td></tr>
		<tr><th>Name</th><td>{{$manufacturer->name}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
