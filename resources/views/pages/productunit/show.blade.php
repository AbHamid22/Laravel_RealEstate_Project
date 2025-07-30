
@extends('layouts.master')
@section('title','Show ProductUnit')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('productunits.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$productunit->id}}</td></tr>
		<tr><th>Name</th><td>{{$productunit->name}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
