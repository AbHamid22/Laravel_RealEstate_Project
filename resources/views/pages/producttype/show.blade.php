
@extends('layouts.master')
@section('title','Show ProductType')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('producttypes.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$producttype->id}}</td></tr>
		<tr><th>Name</th><td>{{$producttype->name}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
